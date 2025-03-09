<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Get player ID from URL parameter
    $id = $_GET['id'];
    
    // Delete player from the database
    $deleteQuery = "DELETE FROM players WHERE id = $id";
    
    if (mysqli_query($conn, $deleteQuery)) {
        // Redirect back to the index.php after successful deletion
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
