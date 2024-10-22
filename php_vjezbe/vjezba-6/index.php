<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Kalkulator</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="kalkulator">
    <meta name="keywords" content="kalkulator, switch naredba">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
  <p><b>Kalkulator</b></p>
  <form action="" method="POST" id="kalkulator">
    <label for="number">Upiši prvi broj</label>
    <input type="number" name="number1" id="number" required autofocus>
    <br><br>
    <label for="number2">Upiši drugi broj</label>
    <input type="number" name="number2" id="number" required>
    <br><br>
    <input type="submit" value="+" name="operator">
    <input type="submit" value="-" name="operator">
    <input type="submit" value="*" name="operator">
    <input type="submit" value="/" name="operator">
  </form>
  <?php
    $prviBroj = $_POST["number1"];
    $drugiBroj = $_POST["number2"];
    $operator = $_POST["operator"];
    $rezultat = '';

    if (isset($_POST["number1"]) && isset($_POST["number2"])) {
      switch ($operator) {
        case "+":
          $rezultat = $prviBroj + $drugiBroj;
          break;
        case "-":
          $rezultat = $prviBroj - $drugiBroj;
          break;
        case "*":
          $rezultat = $prviBroj * $drugiBroj;
          break;
        case "/":
          $rezultat = $prviBroj / $drugiBroj;
          break;
      }
      
      print '<p>Rezultat: '.$rezultat.'</p>';
    }
  ?>
</body>
</html>


<!-- vjezba-6 -->
