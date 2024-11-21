<!DOCTYPE html>
<html lang="hr">
<head>
<title>Registration Form</title>
<meta http-equiv="content-type" content="text-html; charset=UTF-8">
<meta name="description" content="registration form">
<meta name="keywords" content="mysql, database, select, search">
<meta name="author" content="Ana Benačić">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
	<h1>Update users in database</h1>

	<?php 
    $host = "";
    $dbname = "";
    $username = "";
    $password = "";
    $MySQL = mysqli_connect($servername, $username, $password, $dbname) or die('Error connecting to MySQL server.');
    
    print '<h2>' . ((isset($_GET['edit']) && $_SERVER['REQUEST_METHOD'] != 'POST') ? ' Editing user' : "") . '</h2>';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $query  = "UPDATE users SET user_firstname='" . $_POST['user_firstname'] ."', user_lastname='" . $_POST['user_lastname'] ."', country_code='" . $_POST['country_code'] ."' WHERE id=" . (int)$_GET['edit']; 
            $result = @mysqli_query($MySQL, $query);
            print '<p class="alert alert-warning">Data has been updated successfully!</p>';

        }

        if (isset($_GET['edit']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
            $query  = "SELECT user_firstname, user_lastname, country_code FROM users WHERE id=" . (int)$_GET['edit'];
            $result = @mysqli_query($MySQL, $query);
            $row = @mysqli_fetch_array($result);

            print '<a href="index.php">Click here to go back!</a>
            <form method="POST" id="MyForm">
                <div class="form-group">
                    <label for="user_firstname">First name: *</label><br>
                    <input type="text" id="user_firstname" class="form-control" value="' . $row['user_firstname'] . '" name="user_firstname" required placeholder="Ime">
                </div>
                <div class="form-group">
                    <label for="user_lastname">Last name: *</label><br>
                    <input type="text" id="user_lastname" class="form-control" value="' . $row['user_lastname'] . '" name="user_lastname" required placeholder="Prezime">
                </div>
                <div class="form-group">
                    <label for="countries">Country: *</label><br>
                    <select id="countries" name="country_code" class="form-select form-select-lg">
                        <option>Please choose from the dropdown menu:</option>';
                        $query2  = "SELECT country_code, country_name FROM countries";
                        $result2 = @mysqli_query($MySQL, $query2);
                        while($row2 = @mysqli_fetch_array($result2)) {
                            print '<option '. ($row2['country_code'] == $row['country_code'] ? 'selected' : '') .' value="' . $row2['country_code'] . '">' . $row2['country_name'] . '</option>';
                        }
                    print '
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>';
        }
        else {
            $query  = "SELECT * FROM users";
            $query .= " LEFT JOIN countries ON countries.country_code = users.country_code";
            $result = @mysqli_query($MySQL, $query);
            while($row = @mysqli_fetch_array($result)) {
                print "<p><a href=index.php?edit=". $row['id'] ."><i class='bi bi-pencil'></i></a> " . $row['user_firstname'] . " <span style='color:#32a1bd'>" . $row['user_lastname'] . "</span>" . ($row['country_name'] != '' ? " (" . $row['country_name'] . ")" : "" ) . "</p>";
            }
        }
	   
	 ?>
</div>
</body>
</html>