<?php
// Database connection
include("../includ/db.php");  // Changed from ./includ to ../includ

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate inputs aren't empty
    if(empty($_POST['title']) || empty($_POST['description'])) {
        echo "Please fill in all fields";
        exit;
    }
    
    // Sanitize inputs
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    // Insert query
    $query = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    
    // Execute query and handle success or failure
    if (mysqli_query($conn, $query)) {
        header("Location: ../pages/index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// If someone tries to access this file directly without POST data
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $_SESSION['success'] = "Task added successfully!";   
    header("Location: ../pages/index.php");
    exit;
}
?>