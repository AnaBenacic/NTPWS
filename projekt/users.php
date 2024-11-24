<?php

require_once "config.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to no_access.php if not logged in
    header("Location: no_access.php");
    exit(); // Ensure no further code is executed
}

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect to no_access.php if the user is not an admin
    header("Location: no_access.php");
    exit();
}

print '<h1>Users - editing as admin</h1>';

// Handle delete request
if (isset($_GET['delete'])) {
    $user_id = (int)$_GET['delete'];
    
    // Delete user query
    $query = "DELETE FROM users WHERE user_id = $user_id";
    $result = @mysqli_query($link, $query);

    if ($result) {
        print '<p style="color:green;" class="alert alert-success">User has been deleted successfully!</p>';
    } else {
        print '<p class="alert alert-danger">Error deleting user: ' . mysqli_error($link) . '</p>';
    }
}

// Handle role change
if (isset($_POST['role_change']) && isset($_POST['user_id']) && isset($_POST['role'])) {
    $user_id = (int)$_POST['user_id'];
    $new_role = mysqli_real_escape_string($link, $_POST['role']);
    
    // Update the user's role
    $query = "UPDATE users SET role = '$new_role' WHERE user_id = $user_id";
    $result = @mysqli_query($link, $query);

    if ($result) {
        print '<p style="color:green;" class="alert alert-success">User role updated successfully!</p>';
    } else {
        print '<p class="alert alert-danger">Error updating role: ' . mysqli_error($link) . '</p>';
    }
}

// Check if 'edit' is set and the request is not POST to display "Currently editing user" with the user's name
if (isset($_GET['edit']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    $query = "SELECT first_name, last_name FROM users WHERE user_id=" . (int)$_GET['edit'];
    $result = @mysqli_query($link, $query);
    $row = @mysqli_fetch_array($result);

    if ($row) {
        // Display "Currently editing user: Firstname Lastname"
        print '<h2>Currently editing user: ' . htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']) . '</h2>';
    } else {
        // If user is not found, display a default message
        print '<h2>Currently editing user</h2>';
    }
}

// Handle form submission (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['edit'])) {
    $query = "UPDATE users 
              SET first_name='" . $_POST['first_name'] . "', 
                  last_name='" . $_POST['last_name'] . "', 
                  country='" . $_POST['country'] . "' 
              WHERE user_id=" . (int)$_GET['edit'];
    $result = @mysqli_query($link, $query);

    if ($result) {
        print '<p style="color:green;" class="alert alert-success">Data has been updated successfully!</p>';
    } else {
        print '<p class="alert alert-danger">Error updating user: ' . mysqli_error($link) . '</p>';
    }
}

// If 'edit' is set and request is not POST, display the edit form
if (isset($_GET['edit']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    $query = "SELECT first_name, last_name, country, role 
              FROM users 
              WHERE user_id=" . (int)$_GET['edit'];
    $result = @mysqli_query($link, $query);
    $row = @mysqli_fetch_array($result);

    print '<div id="users"> 
            <form method="POST" id="MyForm">

            <label for="first_name">First name: *</label><br>
            <input type="text" id="first_name" class="form-control" value="' . htmlspecialchars($row['first_name']) . '" name="first_name" required placeholder="First Name">

            <label for="last_name">Last name: *</label><br>
            <input type="text" id="last_name" class="form-control" value="' . htmlspecialchars($row['last_name']) . '" name="last_name" required placeholder="Last Name">

            <label for="countries">Country: *</label><br>
            <select id="countries" name="country" class="form-select form-select-lg">
            <option>Please choose from the dropdown menu:</option>';
    
    // Populate the country dropdown
    $query2 = "SELECT country_code, country_name FROM countries";
    $result2 = @mysqli_query($link, $query2);
    while ($row2 = @mysqli_fetch_array($result2)) {
        print '<option ' . ($row2['country_code'] == $row['country'] ? 'selected' : '') . ' value="' . $row2['country_code'] . '">' . htmlspecialchars($row2['country_name']) . '</option>';
    }
    print '
            </select>
 
            <input type="submit" value="Update" class="btn btn-primary">

    </form>
    <br>
    <a href="index.php?menu=10">Click here to go back!</a></div>';
} else {
    // Display all users with edit, delete, and role change links
    $query = "SELECT users.*, countries.country_name 
              FROM users 
              LEFT JOIN countries ON users.country = countries.country_code";
    $result = @mysqli_query($link, $query);

    while ($row = @mysqli_fetch_array($result)) {
        print "<div id='users'>
                <a href=index.php?menu=10&edit=" . $row['user_id'] . "><i class='bi bi-pencil'></i></a> 
                <a href=index.php?menu=10&delete=" . $row['user_id'] . " onclick=\"return confirm('Are you sure you want to delete this user?');\"><i class='bi bi-trash'></i></a>
                " . htmlspecialchars($row['first_name']) . " 
                <span style='color:#32a1bd'>" . htmlspecialchars($row['last_name']) . "</span>" . 
                ($row['country_name'] != '' ? " (" . htmlspecialchars($row['country_name']) . ")" : "") . 
              "<form method='POST' action=''>
                  <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                  <label for='role'>Role: </label>
                  <select name='role' class='form-select' style='width:10%' required>
                      <option value='admin' " . ($row['role'] == 'admin' ? 'selected' : '') . ">Admin</option>
                      <option value='editor' " . ($row['role'] == 'editor' ? 'selected' : '') . ">Editor</option>
                      <option value='user' " . ($row['role'] == 'user' ? 'selected' : '') . ">User</option>
                  </select>
                  <button type='submit' name='role_change' class='btn btn-role'>Change Role</button>
              </form>
              </div>
              <hr>";
    }
}

// Close the database connection
mysqli_close($link);

?>
