<?php 

// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php?menu=7");
exit;

print '<p>You have successfully logged out!</p>';
?>