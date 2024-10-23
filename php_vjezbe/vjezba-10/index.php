<?php
print '
<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Ispis broja riječi</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="ispis broja riječi">
    <meta name="keywords" content="ispis, riječ, rečenica">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    <h1>Ispis broja riječi</h1>
    <form action="" method="post">
        <div>
            <label for="ulaz">Ulazni niz:</label>
            <br>
            <input type="text" name="ulaz" value="">
        </div>
        <br>
        <div>
            <input type="submit" value="Ispiši broj riječi">
        </div>
    </form>';
    if ($_POST["ulaz"] != '') {
        print '<p>Ulazni niz "' . $_POST["ulaz"] . '" sadrži ' . str_word_count($_POST["ulaz"]) . ' riječi.</p>';
    }
    print '
</body>
</html>';
?>


<!-- vjezba-10 -->

<!-- 

https://www.php.net/manual/en/function.str-word-count.php

 -->