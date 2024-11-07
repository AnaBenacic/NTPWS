<!DOCTYPE html>
<html lang="hr">
<head>
<title>Kamen škare papir</title>
<meta http-equiv="content-type" content="text-html; charset=UTF-8">
<meta name="description" content="kamen škare papir">
<meta name="keywords" content="kamen, škare, papir">
<meta name="author" content="Ana Benačić">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<p>Odaberi:</p>
<form action="" method="post">
<input type="radio" name="izborKorisnika" id="kamen" value="0">
<label for="kamen"><img src="img/kamen.png" alt="" width="200" height="200"></label>
<input type="radio" name="izborKorisnika" id="skare" value="1">
<label for="skare"><img src="img/skare.png" alt="" width="200" height="200"></label>
<input type="radio" name="izborKorisnika" id="papir" value="2">
<label for="papir"><img src="img/papir.png" alt="" width="200" height="200"></label>
<br>
<input type="submit" value="Igraj">
</form>
  
<?php
$izbori = array("kamen", "skare", "papir");
$izborRacunala = rand(0,2);
if (isset($_POST['izborKorisnika'])){
    $izborKorisnika = $_POST['izborKorisnika'];
    echo "Ti si odabrao/la <img src=\"img/$izbori[$izborKorisnika].png\" width=\"200\" height=\"200\"><br>";
    echo "Računalo je odabralo <img src=\"img/$izbori[$izborRacunala].png\" width=\"200\" height=\"200\"><br>";
    if ($izborRacunala == $izborKorisnika) {
        echo '<p>Nitko nije pobijedio!</p>';
    }
    else if ($izborRacunala == 0) {
        if ($izborKorisnika == 2) {
            echo '<p>Ti si pobijedio/la!</p>';
        }
        else {
            echo '<p>Računalo je pobijedilo!</p>';
        }
    }
    else if ($izborRacunala == 1) {
        if ($izborKorisnika == 0) {
            echo '<p>Ti si pobijedio/la!</p>';
        }
        else {
            echo '<p>Računalo je pobijedilo!</p>';
        }
    }
    else if ($izborRacunala == 2) {
        if ($izborKorisnika == 1) { 
            echo '<p>Ti si pobijedio/la!</p>';
        }
        else {
            echo '<p>Računalo je pobijedilo!</p>';
        }
    }
}
?>

</body>
</html>