<?php 
// database connect
include("../includ/db.php");
?>

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
    </div>
</body>
</html>
