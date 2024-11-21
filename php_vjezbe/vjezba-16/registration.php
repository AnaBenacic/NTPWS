<?php
if (isset($_POST['submit'])) {
    $host = "";
    $dbname = "";
    $username = "";
    $password = "";

    $connection = mysqli_connect($host, $username, $password, $dbname);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $country = htmlspecialchars($_POST['country']);

    $sql = "INSERT INTO users (first_name, last_name, email, username, password, country) VALUES (?, ?, ?, ?, ?, ?)";

    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssss", $firstName, $lastName, $email, $username, $password, $country);
    
    if ($statement->execute()) {
        echo "Registration successful!";
    } 
    else {
        echo "Error: " . $statement->error;
    }

    $statement->close();
    mysqli_close($connection);
}
?>