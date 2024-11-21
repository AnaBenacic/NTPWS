<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Registration form</title>
    <meta http-equiv="content-type" content="text-html; charset=UTF-8">
    <meta name="description" content="registration form">
    <meta name="keywords" content="mysql, database, select, search">
    <meta name="author" content="Ana Benačić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <h1>Registration Form</h1>
    <form action="registration.php" method="POST">
        <label for="firstName">First name: *</label>
        <input type="text" id="firstName" name="firstName" placeholder="Your name..." required>
        <br>

        <label for="lastName">Last name: *</label>
        <input type="text" id="lastName" name="lastName" placeholder="Your last name..." required>
        <br>

        <label for="email">E-mail: *</label>
        <input type="email" id="email" name="email" placeholder="Your e-mail..." required>
        <br>

        <label for="username">Username: * <small>(Username must have minimum 5 and maximum 10 characters.)</small></label>
        <input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Username..." required>
        <br>

        <label for="password">Password: * <small>(Password must have minimum 4 characters.)</small></label>
        <input type="password" id="password" name="password" pattern=".{4,}" placeholder="Password..." required>
        <br>

        <label for="country">Country:</label>
        <select name="country" id="country" required>
            <option value="">Please choose from the dropdown menu</option>
            <?php include 'countries.php'; ?>
        </select>
        <br>

        <input type="submit" value="Submit" name="submit">
    </form>
</main>
</body>
</html>