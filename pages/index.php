<?php 
// database connect
include("../includ/db.php");
?>
<?php
session_start();
?>

<!-- Display Success Message -->
<?php if (isset($_SESSION['success'])) : ?>
    <div class="message success">
        <?php echo $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Display Error Message -->
<?php if (isset($_SESSION['error'])) : ?>
    <div class="message error">
        <?php echo $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- Auto-hide messages after 3 seconds -->
<script>
    setTimeout(() => {
        const messages = document.querySelectorAll('.message');
        messages.forEach(msg => msg.style.display = 'none');
    }, 3000);
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <!-- Heading -->
        <h2>Task List</h2>

        <!-- start form -->
        <form action="../action/insert.php" method="post">
            <div class="form-group">
                <label for="title"> Title</label> <br>
                <input type="text" name="title" placeholder="Enter Task Title">
            </div>
            <div class="form-group">
                <label for="description"> Description</label>
                <input type="text" name="description" placeholder="Enter Description">
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>

        <!-- list item -->
        <div class="items">
            <?php 
            $query = "SELECT * FROM tasks ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {  // ✅ Check if there are records before the loop
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="item">
                        <h3 class="item-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="item-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        <div class="button">
                            <a href="../pages/edit.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                            <a href="../action/delete.php?id=<?php echo $row['id']; ?>" class="btn delete">Delete</a>


                        </div>
                    </div>
            <?php 
                }
            } else {  // ✅ Now the else statement is correctly inside the PHP block
                echo "<p> No tasks found.</p>";
            }
            ?>
        </div>

        <form method="GET" action="">
    <input type="text" name="search" placeholder="Search tasks..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button type="submit">Search</button>
</form>

<?php
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM tasks WHERE title LIKE '%$search%' OR description LIKE '%$search%' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM tasks ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) { // ✅ Added missing opening PHP tag
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="item">
            <h3 class="item-title"><?php echo htmlspecialchars($row['title']); ?></h3>
            <p class="item-text"><?php echo htmlspecialchars($row['description']); ?></p>
            <div class="button">
                <a href="../pages/edit.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                <a href="../action/delete.php?id=<?php echo $row['id']; ?>" class="btn delete">Delete</a>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No tasks found matching your search.</p>";
}
?>


    </div>
</body>
</html>
