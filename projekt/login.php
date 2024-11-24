<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect them to the database page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php?menu=8");  // Redirect to the page if logged in
    exit;
}
 
// Include config file (assuming the database connection file is called 'config.php')
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement to find the user in the database
        $sql = "SELECT user_id, username, password, role FROM users WHERE username = ?";
        
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {                    
                    // Bind result variables to retrieve the user data
                    mysqli_stmt_bind_result($stmt, $user_id, $username, $hashed_password, $role);
                    if (mysqli_stmt_fetch($stmt)) {
                        // Check if the password matches the hashed password from the database
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            
                            // Store session data
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["username"] = $username;
                            $_SESSION["role"] = $role;  // Store user role in session
                            
                            // Redirect user to the homepage or database page (menu 1)
                            header("location: index.php?menu=8");
                            exit;
                        } else {
                            // Password is not valid, set error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, set error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                // Query execution failed
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            // Query preparation failed
            echo "Failed to prepare the query.";
        }
    }

    // Close connection to MySQL
    mysqli_close($link);
}

?>

<!-- HTML login form -->
<h1>Login Form</h1>
<div id="login">
    <form action="index.php?menu=7" method="POST"> <!-- Action points to the current page -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" pattern=".{5,10}" value="<?php echo htmlspecialchars($username); ?>" placeholder="Username..." required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern=".{4,}" value="<?php echo htmlspecialchars($password); ?>" placeholder="Password..." required>
        <br>

        <input type="submit" value="Login" name="login">
    </form>
</div>

<!-- Display login error message if exists -->
<?php
if (!empty($login_err)) {
    echo '<p style="color: red;">' . $login_err . '</p>';
}
?>
