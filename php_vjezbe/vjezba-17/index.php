<!DOCTYPE html>
<html lang="hr">
<head>
<title>Registration form</title>
<meta http-equiv="content-type" content="text-html; charset=UTF-8">
<meta name="description" content="registration form">
<meta name="keywords" content="mysql, database, select, search">
<meta name="author" content="Ana Benačić">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<style>

	
</style>
<body>
<div class="container">
	<?php 
     $host = "";
     $dbname = "";
     $username = "";
     $password = "";

    $MySQL = mysqli_connect($servername, $username, $password, $dbname) or die('Error connecting to MySQL server.');

    print '<h2>Users database with countries</h2>';
        $query  = "SELECT * FROM users";
        $query .= " LEFT JOIN countries ON countries.country_code = users.country_code";
        $result = @mysqli_query($MySQL, $query);
        while($row = @mysqli_fetch_array($result)) {
            print "<p><i class=\"bi-person\"></i> ". $row['user_firstname'] . " <span style='color: #32a1bd'>" . $row['user_lastname'] . "</span> " . ($row['country_name'] != '' ? "(" . $row['country_name'] . ")" : "" ) . "</p>";
        }
	   
	 ?>
</div>
</body>
</html>


