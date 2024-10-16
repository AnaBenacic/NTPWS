<?php
    $title = 'Da Vincijev kod';
    $link  = 'https://hr.wikipedia.org/wiki/Da_Vincijev_kod';
    print '
    <!DOCTYPE HTML>
    <html lang="hr">
        <head>
            <title>Programiranje web aplikacija</title>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <meta name="author" content="Alen Šimec">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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