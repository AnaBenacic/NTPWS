<?php
require_once "config.php";
session_start();

// Ensure the user is an admin or editor
if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'editor') {
    header('Location: no_access.php'); // Redirect to a dedicated no access page
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['artwork_id'])) {
    $artwork_id = (int)$_POST['artwork_id'];

    // Delete the artwork from the database
    $sql = "DELETE FROM artworks WHERE artwork_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $artwork_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "Artwork deleted successfully.";
        } else {
            echo "Error deleting artwork: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($link);
header("Location: index.php?menu=8"); // Redirect back to the artworks page
exit;
?>
