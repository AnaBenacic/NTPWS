<!DOCTYPE html>
<html lang="hr">
<head>
<title>Zbrajanje</title>
<meta http-equiv="content-type" content="text-html; charset=UTF-8">
<meta name="description" content="zbrajanje">
<meta name="keywords" content="zbrajanje">
<meta name="author" content="Ana Benačić">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

<form action="" method="POST" id="kalkulator">
<label for="broj1">Upiši prvi broj</label>
<input type="number" name="broj1" id="number" required autofocus>
<br><br>
<label for="broj2">Upiši drugi broj</label>
<input type="number" name="broj2" id="number" required>
<br><br>
<input type="submit" class="submit" value="Zbroji">
</form>

<?php
$broj1 = $_POST["broj1"];
$broj2 = $_POST["broj2"];
function add ($broj1, $broj2) {
  $total = $broj1 + $broj2;
  return "$total";
}
print "<br> Zbrojeni brojevi daju rezultat: ";
print add($broj1, $broj2);
?>

</body>
</html>


