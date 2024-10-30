<?php

# Stop Hacking attempt
define('__APP__', TRUE);

# Start session
session_start();
    
# Variables MUST BE INTEGERS
if(isset($_GET['menu'])) { 
	$menu   = (int)$_GET['menu']; 
}
if(isset($_GET['action'])) { 
	$action   = (int)$_GET['action']; 
}
    
# Variables MUST BE STRINGS A-Z
if(!isset($_POST['_action_']))  { 
	$_POST['_action_'] = FALSE;  
}
if (!isset($menu)) { 
	$menu = 1; 
}

print'

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="Blog about everything and anything!">
        <meta name="keywords" content="blog, journal, diary, story">
        <meta name="author" content="Ana Benačić">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
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
			  <li><a href="index.php?menu=5">CONTACT</a></li>
			</ul>
		</nav>
	</header>
	<main' . (isset($_SESSION['news_title_1']) ? ' class="session"' : '') .'>';
	

	# Display content based on menu selection

	# Home
	if (!isset($_GET['menu']) || $_GET['menu'] == 1) { 
		include("home.php"); 
	}
	
	# News
	else if ($_GET['menu'] == 2) { 
		include("news.php"); 
	}
	
	# Gallery
	else if ($_GET['menu'] == 3) { 
		include("gallery.php"); 
	}
	
	# About
	else if ($_GET['menu'] == 4) {
		include("about.php"); 
	}

	# Contact
	else if ($_GET['menu'] == 5) { 
		include("contact.php"); 
	}

	print'
	</main>';

	# Display recently viewed articles if cookies are set
    if (!empty($_SESSION)) {
        print '<div class="last-viewed"><aside><h2>LAST VIEWED:</h2>';
        # Display links to each recently viewed article
        foreach ($_SESSION as $key => $title) {
            // Only display if the key contains "news_title"
            if (strpos($key, 'news_title') === 0) {
                print '<p><a href="index.php?menu=2&action=' . substr($key, -1) . '">' . htmlspecialchars($title) . '</a></p>';
            }
        };
		print '</aside></div>';
    } else {
		print '<div class="last-viewed"><aside>No news items viewed recently.</aside></div>';
    }

	print'
	<footer>
		<p>Copyright &copy; 2024. Ana Benačić <a href="https://github.com/AnaBenacic/NTPWS" target="_blank"><img src="img/GitHub.png" title="Github" alt="Github"></a></p>
	</footer>
</body>
</html>';

?>