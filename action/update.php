<?php
// Database connection
include("../includ/db.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Escape and sanitize user inputs
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Ensure ID is not empty (prevents updating all records by mistake)
    if (!empty($id)) {
        // Update query
        $query = "UPDATE tasks SET title='$title', description='$description' WHERE id='$id'";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            // Redirect to index page on success
            header("Location: ../pages/index.php");
            exit();
        } else {
            // Print an error message on failure
            echo "ERROR: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid Task ID!";
    }
}
?>
