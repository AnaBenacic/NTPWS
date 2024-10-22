<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Igra pogađanja broja</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="zamišljeni broj">
    <meta name="keywords" content="zamišljeni broj, pogađanje">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .button1 {
    background-color: #50C878;
    color: white;
    padding: 10px 15px;
    text-align: center;
    border: none;
    border-radius: 4px;}
    .button2 {
    background-color: #FF0000;
    color: white;
    padding: 10px 15px;
    text-align: center;
    border: none;
    border-radius: 4px;}
    </style>
</head>
<body>
  <p><b>Igra pogađanja broja</b></p>
  <form action="" method="POST" id="calculator">
    <label for="number">Upiši jedan broj od 1 do 9*</label>
    <input type="number" name="number" id="number" required autofocus>
  </form>
  <?php
    $randomNumber = rand(1, 9);
    if (isset($_POST["number"])) {
      if ($_POST["number"] == $randomNumber ) {
        print '<button class="button1">Pogodak, probaj ponovno!</button>';
      }
      else {
        print '<button class="button2">Krivo, probaj ponovno!</button>';
      }
      print '<p>Zamišljeni broj je '.$randomNumber.'</p>';
    }
  ?>
</body>
</html>

<!-- vjezba-5 -->