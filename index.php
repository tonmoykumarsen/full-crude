<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
    <!-- Heading -->
     <h2>Task List</h2>

     <!-- start form -->
    <form  action="">
        <div class="form-group">
        <label for="title" > Title</label> <br>
        <input type="text" placeholder="Enter Task Title">
        </div>
        <div class="form-group">
        <label for="description"> Description</label>
        <input type="text" placeholder="Enter Description">

        </div>
        
        <button type="submit" >Submit</button>

    </form>


    <!-- list item -->

    <div class="items">
        <div class="item">
            <h3 class="item-title" >Buy Groceries</h3>
            <p class=".item-text" > Get Milk,bread and egg from the store</p>
            <div class="button">
                <button class="edit" >Edit</button>
                <button class="delete" >Delete</button>
            </div>
        </div>

    </div>
    <div class="items">
        <div class="item">
            <h3 class="item-title" >Buy Groceries</h3>
            <p class=".item-text" > Get Milk,bread and egg from the store</p>
            <div class="button">
            <button class="edit" >Edit</button>
            <button class="delete" >Delete</button>
            </div>
        </div>

    </div>


    </div>
</body>
</html>