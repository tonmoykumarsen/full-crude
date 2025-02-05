<?php
// Database connection
include("../includ/db.php");

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch the task details
    $query = "SELECT * FROM tasks WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['description'];
    } else {
        echo "Task not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>

        <!-- Form to Edit the Task -->
        <form action="../action/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Hidden input to store ID -->
            <div class="form-group">
                <label for="title">Title</label><br>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label><br>
                <input type="text" name="description" value="<?php echo htmlspecialchars($description); ?>" required>
            </div>
            <button type="submit">Update Task</button>
        </form>
    </div>
</body>
</html>
