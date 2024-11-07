<!DOCTYPE html>
<html lang="hr">
<head>
<title>Auti array</title>
<meta http-equiv="content-type" content="text-html; charset=UTF-8">
<meta name="description" content="auti">
<meta name="keywords" content="auti, array">
<meta name="author" content="Ana Benačić">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<p>Marke auta:</p>

<?php
$auti = array("Toyota", "Honda", "Kia", "Mazda", "Lexus", "Subaru", "BMW", "Hyundai", "Ford");
print "<ol>
<li>" . $auti[0] . "</li>
<li>" . $auti[1] . "</li>
<li>" . $auti[2] . "</li>
<li>" . $auti[3] . "</li>
<li>" . $auti[4] . "</li>
<li>" . $auti[5] . "</li>
<li>" . $auti[6] . "</li>
<li>" . $auti[7] . "</li>
<li>" . $auti[8] . "</li>
</ol>";
?>

</body>
</html>