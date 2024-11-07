<!DOCTYPE html>
<html lang="hr">
<head>
<title>Gradovi</title>
<meta http-equiv="content-type" content="text-html; charset=UTF-8">
<meta name="description" content="gradovi">
<meta name="keywords" content="gradovi, poštanski broj">
<meta name="author" content="Ana Benačić">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<p>Lista gradova:</p>
<ul>

<?php
$gradovi = array ("Vinkovci" => 32100, "Koprivnica" => 48000, "Požega" => 34000, "Varaždin" => 42000, "Krapina" => 49000);
foreach ($gradovi as $naziv => $postanskibroj) {
  print "<li>$postanskibroj $naziv</li>";
}
?>

</ul>
</body>
</html>