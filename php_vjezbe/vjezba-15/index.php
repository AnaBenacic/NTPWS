<?php
$host = "localhost";
$dbname = "vjezba-14";
$username = "vkomes";
$password = "#KuracPalac123!!";

$connection = mysqli_connect($host, $username, $password, $dbname);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$results = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchName = mysqli_real_escape_string($connection, $_POST['search_name']);

    $query = "SELECT * FROM users WHERE LOWER(name) = LOWER('$searchName') OR LOWER(lastname) = LOWER('$searchName')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) > 0) {
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $results = [];
    }

    mysqli_free_result($result);
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <title>SELECT u mysql</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="SELECT u mysql">
    <meta name="keywords" content="mysql, baza podataka, select, pretraživanje">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

    <h2>Pretraživanje imena/prezimena u bazi</h2>
    <form action="" method="post">
        <label for="search_name">Upiši ime ili prezime za pretraživanje:</label>
        <input type="text" id="search_name" name="search_name" required>
        <button type="submit">Pretraži</button>
    </form>

    <?php if (isset($results)): ?>
        <h2>Rezultati pretraživanja:</h2>
        <?php if (count($results) > 0): ?>
            <ul>
                <?php foreach ($results as $user): ?>
                    <li><?= htmlspecialchars($user['name']) . " " . htmlspecialchars($user['lastname']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nije pronađena niti jedna osoba s imenom/prezimenom: <b><?= htmlspecialchars($searchName); ?></b></p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>
