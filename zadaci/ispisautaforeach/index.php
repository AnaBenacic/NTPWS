<!DOCTYPE html>
<html lang="hr">
<head>
<title>Auti foreach</title>
<meta http-equiv="content-type" content="text-html; charset=UTF-8">
<meta name="description" content="auti">
<meta name="keywords" content="auti, foreach">
<meta name="author" content="Ana Benačić">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<p>Marke auta:</p>
<ol>

<?php 
$auti = array("Toyota", "Honda", "Kia", "Mazda", "Lexus", "Subaru", "BMW", "Hyundai", "Ford");
foreach ($auti as $auto) {
  print "<li>$auto</li>";
}
?>

</ol>
</body>
</html>
