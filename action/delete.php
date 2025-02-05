<?php 
// Database connection
include("../includ/db.php");

// Check if 'id' is set in the GET request
if (isset($_GET['id'])) {
    // Sanitize the 'id' parameter
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare and execute the DELETE query
    $query = "DELETE FROM tasks WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        // Redirect to the index page after deletion
        header("Location: ../pages/index.php");
        exit(); // Stop further script execution
    } else {
        // Handle query execution error
        echo "ERROR: " . mysqli_error($conn);
    }
} else {
    // Handle the case where 'id' is not set
    echo "Invalid request. No task ID provided.";
}
?>
