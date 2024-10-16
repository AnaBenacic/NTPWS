<?php
$title = 'Da Vincijev kod';
$link  = 'https://hr.wikipedia.org/wiki/Da_Vincijev_kod';
print '
<!DOCTYPE HTML>
<html lang="hr">
    <head>
        <title>Da Vincijev kod</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="description" content="O Da Vincijevom kodu">
        <meta name="keywords" content="Da Vincijev kod, roman, triler, Dan Brown">
        <meta name="author" content="Ana Benačić">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>';
        print $title;
        print '
        </h1>
        <p>Da Vincijev kod je kriminalistički triler američkog pisca Dana Browna.</p>
        <p><a href="';
        print $link;
        print '" target="_blank">';
        print "Poveznica";
        print '</a>
        </p>
    </body>
</html>';
?>

<!-- Ime dokumenta: vjezba-2 -->