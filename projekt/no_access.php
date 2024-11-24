<!DOCTYPE html>
<html lang="hr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Blog about everything and anything!">
    <meta name="keywords" content="blog, journal, diary, story">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Art Blog</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Helvetica', sans-serif;
            background-color: white;
            color: black;
        }
        .container {
            text-align: center;
        }
        .container h1 {
            font-size: 3em;
            margin-bottom: 0.5em;
            color: red;
        }
        .container p {
            font-size: 1.2em;
            margin-bottom: 1.5em;
        }
        .container button {
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #54c2dd;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #32a1bd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Access Denied</h1>
        <p>You do not have permission to access this website.</p>
        <form method="post">
            <button type="submit" name="redirect">Go Back to Home</button>
        </form>
    </div>

    <?php
    // Handle button click
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redirect'])) {
        // Redirect to index.php
        header('Location: index.php');
        exit();
    }
    ?>
</body>
</html>

