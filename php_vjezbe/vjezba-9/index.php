<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="store">
    <meta name="keywords" content="store, time, date, weekday">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<?php

    date_default_timezone_set("Europe/Zagreb");
    $currentYear = strval(date('o'));
#    za provjeru blagdana:
#    $currentMonth = '12'; 
    $currentMonth = strval(date('m'));
#    za provjeru blagdana:
#    $currentDay = '25';
    $currentDay = strval(date('d'));
#    za provjeru dana u tjednu:
#    $currentWeekday = 'Sunday';
    $currentWeekday = strval(date('l'));
#    za provjeru koliko je sati:
#    $currentTime = 18; 
    $currentTime = strval(date('G')); 
    $currentDate = date('m.d.');
    $openTime = 8;
    $closeTime = 20;
    $openTimeSaturday = 9;
    $closeTimeSaturday = 14;
  
    $holidays = array ('01.01.', #"Nova godina"
                      '06.01.', #"Sveta tri kralja"
                      '01.05.', #"Praznik rada"
                      '30.05.', #"Dan državnosti"
                      '22.06.', #"Dan antifašističke borbe"
                      '05.08.', #"Dan pobjede i domovinske zahvalnosti"
                      '15.08.', #"Velika gospa"
                      '01.11.', #"Dan svih svetih"
                      '18.11.', #"Dan sjećanja na žrtve Domovinskog rata"
                      '25.12.', #"Božić"
                      '26.12.' #"Sveti Stjepan"
                    );
        
    function check_time($currentTime, $openTime, $closeTime) { 
      if ($currentTime >= $openTime && $currentTime < $closeTime) {
        return 1;
      }
      else {
        return 0;
      }
    }

    function check_saturday($currentWeekday, $currentTime, $openTimeSaturday, $closeTimeSaturday) {
      if ($currentWeekday == 'Saturday') {
        if ($currentTime >= $openTimeSaturday && $currentTime < $closeTimeSaturday) {
          return 1;
          }
        else {
           return 0;
          }
      }
      else {
        return 1;
      }
    }

    function check_sunday($currentWeekday) {
      if ($currentWeekday == 'Sunday') {
        return 0;
      }
      else {
        return 1;
      }
    }

    function check_holidays($currentDay, $currentMonth, $holidays) {
      if (in_array($currentDate, $holidays)) {
        return 0;
      }
    }

    echo "<h1>Store</h1>
    <p>The store is open from " . $openTime . "h to " . $closeTime . "h from Monday to Friday.</p>
    <p>The store is open from " . $openTimeSaturday . "h to " . $closeTimeSaturday . "h on Saturdays.</p>
    <p>The store is closed on Sundays.</p>
    <p>The store is closed on holidays.</p>
    <br>
    <p>Currently it is " . $currentTime . "h.</p>
    <p>Current weekday is " . $currentWeekday . ".</p>
    <p>Current date is " . $currentDay . "." . $currentMonth . "." . $currentYear . ".</p>
    <p>The store is currently " . ((check_time($currentTime, $openTime, $closeTime) 
                                    && check_saturday($currentWeekday, $currentTime, $openTimeSaturday, $closeTimeSaturday)
                                    && check_sunday($currentWeekday)
                                    && check_holidays($currentDay, $currentMonth, $holidays)) ? "open" : "closed") . ".</p><br>";

    echo '<p><h2>Holidays in Croatia:</h2></p>';
    foreach ($holidays as $holidayDate) {
        print "<p>$holidayDate</p>";
    }
        
?>
</body>
<html>


<!-- vjezba-9 -->
