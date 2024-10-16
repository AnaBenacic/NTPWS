<!DOCTYPE html>
<html lang="hr">
  <head>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="O Da Vincijevom kodu">
    <meta name="keywords" content="Da Vincijev kod, roman, triler, Dan Brown">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Izračun</title>
  </head>
  <body>
    <?php
    $a = $_POST['vrijednost-a'];
    $b = $_POST['vrijednost-b'];
    $c = (3*$a-$b) / 2;
    print '
    <p>Predana vrijednost za a: ' . $a . '</p>
    <p>Predana vrijednost za b: ' . $b . '</p>
    <p>Dobiveno rješenje nakon prolaska kroz formulu c = (3a – b) / 2, odnosno c = (3*' . $a . '-' . $b . ') / 2 = ' . $c . '</p>
    '
    ?>
  </body>
</html>

<!-- vjezba-4 -->