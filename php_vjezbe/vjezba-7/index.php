<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Ocjene kolokvija</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="izračun prosjeka i konačne ocjene predmeta">
    <meta name="keywords" content="ocjene, kolokvij, prosjek, završna ocjena">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1><b>Izračun ocjene iz kolokvija</b></h1>
  <form action="" method="POST" id="izracun_ocjene">
    <label for="ocjena1">Ocjena 1. kolokvija* </label>
    <input type="number" name="ocjena1" id="ocjena1" min="1" max="5" required autofocus>
    <br>  
    <br>
    <label for="ocjena2">Ocjena 2. kolokvija* </label>
    <input type="number" name="ocjena2" id="ocjena2" min="1" max="5" required autofocus>
    <br>
    <br>
    <input type="submit" class="submit" value="Izračunaj">
  </form>
  <br>

  <?php
    $ocjene = array($_POST['ocjena1'], $_POST['ocjena2']);
    $prosjek = ($ocjene[0] + $ocjene[1]) / 2;

    if ($ocjene[0] == 1 || $ocjene[1] == 1 ) {
      print '<div><p>Jedan od kolokvija je <b>negativan</b> i zbog toga je zaključna ocjena 1.</p></div>';
    } 
    else {
      print '
      <div><p><b>Ocjena 1. kolokvija:</b> '.$ocjene[0].'</p>
      <p><b>Ocjena 2. kolokvija:</b> '.$ocjene[1].'</p>
      <p><b>Prosjek iz predmeta:</b> '.$prosjek.'</p>
      <p><b>Konačna ocjena iz predmeta:</b> '.round($prosjek).'</p></div>';
    }
  ?>
</body>
</html>


<!-- NOT DONE -->