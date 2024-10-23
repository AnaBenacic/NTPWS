<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Prosti brojevi</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="prosti brojevi">
    <meta name="keywords" content="prosti brojevi">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

<?php

function ProstiBroj () {
    $number = 2;
    while ($number < 100) {
    $count = 0;
    for ($i = 1; $i <= $number; $i++) {
        if (($number % $i) == 0) {
            $count++;
        }
    }
    if ($count < 3) {
        echo $number." ";
    }
    $number = $number + 1;
    }
}

echo "<p>Prosti brojevi su: </p>";
ProstiBroj();

?>

</body>
<html>


<!-- vjezba-11 -->