<?php
// Include config file
require_once "config.php";

// Initialize variables to store form input values and errors
$first_name = $last_name = $email = $username = $password = $country = $city = $address = $date_of_birth = "";
$errors = [];
$registration_successful = false;  // Add this flag to track successful registration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate input data
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $country = trim($_POST["country"]);
    $city = trim($_POST["city"]);
    $address = trim($_POST["address"]);
    $date_of_birth = trim($_POST["date_of_birth"]);

    // Check if the username already exists in the database
    if (empty($errors)) {
        $sql = "SELECT user_id FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $errors[] = "This username is already taken. Please choose another one.";
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // If there are no errors, insert the new user into the database
    if (empty($errors)) {
        $sql = "INSERT INTO users (first_name, last_name, email, username, password, country, city, address, date_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssssss", $first_name, $last_name, $email, $username, $hashed_password, $country, $city, $address, $date_of_birth);

            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                // Set the flag to true after successful registration
                $registration_successful = true;
                // Redirect to a success page (optional)
                // header("location: index.php?menu=1"); 
                // exit(); // If you want to redirect after registering, comment out this line if you don't want to redirect.
            } else {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Close database connection
    mysqli_close($link);
}

print '
    <h1>Registration Form</h1>
    <div id="register">';

    if ($registration_successful) {
        // Print success message after successful registration
        print '<p style="color:green;">You have successfully registered!</p>';
    }

print '    
    <form action="" method="POST">

    <label for="first_name">First name: <small style="color:red">*</small></label>
    <input type="text" id="first_name" name="first_name" value="' . htmlspecialchars($first_name) . '" placeholder="Your name..." required>
    <br>

    <label for="last_name">Last name: <small style="color:red">*</small></label>
    <input type="text" id="last_name" name="last_name" value="' . htmlspecialchars($last_name) . '" placeholder="Your last name..." required>
    <br>

    <label for="email">E-mail: <small style="color:red">*</small></label>
    <input type="email" id="email" name="email" value="' . htmlspecialchars($email) . '" placeholder="Your e-mail..." required>
    <br>

    <label for="username">Username: <small style="color:red">* (Username must have minimum 5 and maximum 10 characters.)</small></label>
    <input type="text" id="username" name="username" pattern=".{5,10}" value="' . htmlspecialchars($username) . '" placeholder="Username..." required>
    <br>';

    // Display username error if there is one
    if (in_array("Username must be between 5 and 10 characters.", $errors)) {
        print '<p style="color:red;">Username must be between 5 and 10 characters.</p>';
    }

    // Display username taken error if there is one
    if (in_array("This username is already taken. Please choose another one.", $errors)) {
        print '<p style="color:red;">This username is already taken. Please choose another one.</p>';
    }

    print '
    <br>

    <label for="password">Password: <small style="color:red">* (Password must have minimum 4 characters.)</small></label>
    <input type="password" id="password" name="password" pattern=".{4,}" value="' . htmlspecialchars($password) . '" placeholder="Password..." required>
    <br>';

    // Display password error if there is one
    if (in_array("Password must be at least 4 characters.", $errors)) {
        print '<p style="color:red;">Password must be at least 4 characters.</p>';
    }

    print '
    <br>

    <label for="country">Country: <small style="color:red">*</small></label>
    <select name="country" id="country" required>
    <option value="">Please choose from the dropdown menu:</option>';

include 'countries.php';

print '  
    </select>
    <br>

    <label for="city">City: <small style="color:red">*</small></label>
    <input type="text" id="city" name="city" value="' . htmlspecialchars($city) . '" placeholder="City..." required>
    <br>

    <label for="address">Address: <small style="color:red">*</small></label>
    <input type="text" id="address" name="address" value="' . htmlspecialchars($address) . '" placeholder="Address..." required>
    <br>

    <label for="date_of_birth">Date of birth: <small style="color:red">*</small></label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="' . htmlspecialchars($date_of_birth) . '" required>
    <br>

    <input type="submit" value="Register" name="register">
    </form>
    </div>';
?>