<?php
// Include the database connection file
require_once "config.php";

// Start the session and get user role
session_start();
$user_role = $_SESSION['role'];

// Handle add or edit artwork actions
if ((isset($_GET['add']) || isset($_GET['edit'])) && ($user_role == 'admin' || $user_role == 'editor')) {
    $is_edit = isset($_GET['edit']);
    $artwork_id = $is_edit ? (int)$_GET['edit'] : null;

    // Fetch existing artwork details for editing
    if ($is_edit) {
        $sql = "SELECT title, artist_name, description, image_url FROM artworks WHERE artwork_id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $artwork_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $title, $artist_name, $description, $image_url);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        } else {
            echo "<p>Error fetching artwork details: " . mysqli_error($link) . "</p>";
            exit;
        }
    } else {
        $title = $artist_name = $description = $image_url = "";
    }

    // Handle form submission for add or edit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize form inputs
        $new_title = mysqli_real_escape_string($link, $_POST['title']);
        $new_artist_name = mysqli_real_escape_string($link, $_POST['artist_name']);
        $new_description = mysqli_real_escape_string($link, $_POST['description']);
        $new_image_url = $is_edit ? $image_url : ''; // Retain old image for edit

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = "artworks/";
            $image_name = basename($_FILES['image']['name']);
            $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            // Validate file type
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($image_extension, $allowed_extensions)) {
                echo "<p style='color:red;'>Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.</p>";
                exit;
            }

            $new_image_url = $upload_dir . $image_name;

            // Move uploaded file
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $new_image_url)) {
                echo "<p style='color:red;'>Error uploading the image. Please check file path and permissions.</p>";
                exit;
            }

            // Delete old image for edit
            if ($is_edit && !empty($image_url) && file_exists($image_url)) {
                unlink($image_url);
            }
        }

        if ($is_edit) {
            // Update existing artwork
            $sql = "UPDATE artworks SET title = ?, artist_name = ?, description = ?, image_url = ? WHERE artwork_id = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssi", $new_title, $new_artist_name, $new_description, $new_image_url, $artwork_id);
                if (mysqli_stmt_execute($stmt)) {
                    echo "<p style='color:green;'>Artwork updated successfully!</p>";
                } else {
                    echo "<p style='color:red;'>Error updating artwork: " . mysqli_error($link) . "</p>";
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            // Insert new artwork
            $sql = "INSERT INTO artworks (title, artist_name, description, image_url) VALUES (?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $new_title, $new_artist_name, $new_description, $new_image_url);
                if (mysqli_stmt_execute($stmt)) {
                    echo "<p style='color:green;'>New artwork added successfully!</p>";
                } else {
                    echo "<p style='color:red;'>Error adding artwork: " . mysqli_error($link) . "</p>";
                }
                mysqli_stmt_close($stmt);
            }
        }
    }

    // Display the add/edit artwork form
    echo '<h1>' . ($is_edit ? 'Edit' : 'Add new') . ' artwork</h1>';
    echo '<div id="artworks">
        <form method="POST" action="" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" name="title" value="' . htmlspecialchars($title) . '" required /><br><br>
        
        <label for="artist_name">Artist Name:</label><br>
        <input type="text" name="artist_name" value="' . htmlspecialchars($artist_name) . '" required /><br><br>
        
        <label for="description">Description:</label><br>
        <textarea name="description" rows="4" cols="50" required>' . htmlspecialchars($description) . '</textarea><br><br>
        
        <label for="image">Upload Image:</label><br>
        <input type="file" name="image" accept="image/*" /><br><br>';
    if ($is_edit && !empty($image_url)) {
        echo 'Current Image:<br>
        <img src="' . htmlspecialchars($image_url) . '" alt="Current Image" style="width:30%;"><br><br>';
    }
    echo '<input type="submit" value="' . ($is_edit ? 'Save changes' : 'Add artwork') . '" class="btn btn-primary" />
    </form><br>
    <a href="index.php?menu=8">Back to artworks</a></div>';
} else {
    // Display all artworks
    echo '<h1>Artworks</h1>';
    if ($user_role == 'admin' || $user_role == 'editor') {
        echo "<a style='color: white; text-decoration:none;' href='index.php?menu=8&add=true' class='btn btn-add'>Add new artwork</a><hr>";
    }

    $sql = "SELECT artwork_id, title, artist_name, description, image_url FROM artworks";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                    <h2><strong>Title:</strong> " . htmlspecialchars($row['title']) . "</h2>
                      <p><strong>Artist:</strong> " . htmlspecialchars($row['artist_name']) . "</p>
                      <p><strong>Description:</strong> " . nl2br(htmlspecialchars($row['description'])) . "</p>";
                if (!empty($row['image_url'])) {
                    echo "<div id='artworks'>                    
                    <a href='" . htmlspecialchars($row['image_url']) . "' target='_blank'>
                    <img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['title']) . "' style='width:30%;'>
                    </a>
                    </div>";
                }
                if ($user_role == 'admin' || $user_role == 'editor') {
                    echo "
                        <a style='color: white; text-decoration:none;' href='index.php?menu=8&edit=" . $row['artwork_id'] . "' class='btn btn-edit'>Edit</a>
                        <br>
                        <form method='POST' action='delete_artwork.php' style='display:inline-block;'>
                        <input type='hidden' name='artwork_id' value='" . $row['artwork_id'] . "' />
                        <button type='submit' class='btn btn-delete' onclick=\"return confirm('Are you sure?');\">Delete</button>
                        </form>";
                }
                echo "<hr>";
            }
        } else {
            echo "<p>No artworks found.</p>";
        }
    } else {
        echo "<p>Error retrieving artworks: " . mysqli_error($link) . "</p>";
    }
}

// Close the database connection
mysqli_close($link);
?>
