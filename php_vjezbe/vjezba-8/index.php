<!DOCTYPE html>
<html lang="hr">
  <head>
    <title>Vozila</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="vozila">
    <meta name="keywords" content="vozila, Audi, BMW, Renault, Citroen">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>
  <body>
    <form action="" method="post">
      <label for="vozila">Označi vozilo:</label><br>
      <br>
      <input type="radio" name="vozila" value="Audi">Audi<br>
      <input type="radio" name="vozila" value="BMW">BMW<br>
      <input type="radio" name="vozila" value="Renault">Renault<br>
      <input type="radio" name="vozila" value="Citroen">Citroen<br>
      <br>
      <input type="submit" value="Pošalji"><br>
    </form>
    <?php 
      if (isset($_POST['vozila'])) {
        $odabranoVozilo = $_POST['vozila'];
        print '<p>Odabrano je vozilo ' . $odabranoVozilo . '.</p>';
      }
    ?>
  </body>
</html>


<!-- vjezba-8 -->
