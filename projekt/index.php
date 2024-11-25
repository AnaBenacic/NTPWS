<?php
# Stop hacking attempt
define('__APP__', TRUE);

# Variables must be integers
if (isset($_GET['menu'])) { 
    $menu = (int)$_GET['menu']; 
}
if (isset($_GET['action'])) { 
    $action = (int)$_GET['action']; 
}

# Variables must be strings a-z
if (!isset($_POST['_action_'])) { 
    $_POST['_action_'] = FALSE; 
}
if (!isset($menu)) { 
    $menu = 1; 
}

// Start the session
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

print '
<!DOCTYPE html>
<html>
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
</head>
<body>
<header>
    <div class="banner-image"></div>
    <nav>
        <ul>
            <li><a href="index.php?menu=1">HOME</a></li>
            <li><a href="index.php?menu=2">NEWS</a></li>
            <li><a href="index.php?menu=3">GALLERY</a></li>
            <li><a href="index.php?menu=4">ABOUT</a></li>
            <li><a href="index.php?menu=5">CONTACT</a></li>';

// Render the dynamic login/logout menu
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // The user is logged in, check if the user is an admin
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'admin') {
        // If the user is an admin, show the USERS button
        print '<li><a href="index.php?menu=10">USERS</a></li>';
    }
    
    // Show the ARTWORKS page link to all logged-in users (admins, editors, users)
    print '<li><a href="index.php?menu=8">ARTWORKS</a></li>';
    
    // Show the LOGOUT link to the logged-in user
    print '<li><a href="index.php?menu=9">LOGOUT</a></li>';
} else {
    // If the user is not logged in, show REGISTER and LOGIN links
    print '<li><a href="index.php?menu=6">REGISTER</a></li>';
    print '<li><a href="index.php?menu=7">LOGIN</a></li>';
}

print '
        </ul>
    </nav>
</header>
<main>';

// Display content based on menu selection

# Home
if (!isset($_GET['menu']) || $_GET['menu'] == 1) { 
    include("home.php"); 
}

# News
elseif ($_GET['menu'] == 2) { 
    include("news.php"); 
}

# Gallery
elseif ($_GET['menu'] == 3) { 
    include("gallery.php"); 
}

# About
elseif ($_GET['menu'] == 4) {
    include("about.php"); 
}

# Contact
elseif ($_GET['menu'] == 5) { 
    include("contact.php"); 
}

# Register
elseif ($_GET['menu'] == 6) { 
	if (!$isLoggedIn){
		include("register.php");
	}
}

# Login/logout logic
if ($_GET['menu'] == 7 || $_GET['menu'] == 9) {
    if ($isLoggedIn) {
        // User is logged in, so show logout
        include("logout.php");
    } else {
        // User is not logged in, so show Login
        include("login.php");
    }
}

# Artworks database
elseif ($_GET['menu'] == 8) { 
    include("artworks.php"); 
}

# Artworks database
elseif ($_GET['menu'] == 10) { 
    include("users.php"); 
}

print '
</main>';

// Display recently viewed articles if cookies are set
if (!empty($_COOKIE['news_title_1']) || !empty($_COOKIE['news_title_2']) || !empty($_COOKIE['news_title_3'])) {
    print '<div class="last-viewed"><aside><h2>LAST VIEWED:</h2>';
    if (!empty($_COOKIE['news_title_1']) && !empty($_COOKIE['news_url_1'])) {
        print '<p><a href="' . $_COOKIE['news_url_1'] . '">' . $_COOKIE['news_title_1'] . '</a></p>';
    }
    if (!empty($_COOKIE['news_title_2']) && !empty($_COOKIE['news_url_2'])) {
        print '<p><a href="' . $_COOKIE['news_url_2'] . '">' . $_COOKIE['news_title_2'] . '</a></p>';
    }
    if (!empty($_COOKIE['news_title_3']) && !empty($_COOKIE['news_url_3'])) {
        print '<p><a href="' . $_COOKIE['news_url_3'] . '">' . $_COOKIE['news_title_3'] . '</a></p>';
    }
    print '</div></aside>';
}

print '
<footer>
    <p>Copyright &copy; ' . date("Y") . ' Ana Benačić <a href="https://github.com/AnaBenacic/NTPWS" target="_blank"><img src="img/GitHub.png" title="Github" alt="Github"></a></p>
</footer>
</body>
</html>';
?>
