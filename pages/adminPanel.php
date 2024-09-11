<?php

// database connection file
include('../includes/connection.php');
if (isset($_POST['add_item'])) {

    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_description = $_POST['item_description'];
    $item_category = $_POST['item_category'];
    $item_image = $_FILES['item_image']['name'];
    $item_image_temp_name = $_FILES['item_image']['tmp_name'];
    $item_image_folder = '../assets/images/upload/item/' . $item_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `items` (NAME,DESCRIPTION,IMAGE,PRICE,CATEGORY)
        VALUES('$item_name','$item_description','$item_image',' $item_price','$item_category')
        ") or die("Item inserting failed!");

    if ($insert_query === TRUE) {
        move_uploaded_file($item_image_temp_name, $item_image_folder);
        $display_message = "Item added successfully!";
    } else {
        echo "product entering error";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/adminPanel.css">
    <title>Admin Panel</title>
</head>

<body>
    <?php
    include('../includes/admin-header.php');
    ?>
    <div class="dashboard-container">
        <div class="add-items-panel">
            <p class="panel-main-title cart-head-title">Add Item</p>
            <div class="add-panel">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input name="item_name" type="text" placeholder="Enter Item Name" required>
                    <input name="item_price" type="text" placeholder="Enter Item Price" required>
                    <textarea name="item_description" id="" cols="30" rows="5" placeholder="Item Description" required></textarea>
                    <select name="item_category" id="" required>
                        <option value="pizza">Pizza</option>
                        <option value="rice">Rice Dish</option>
                        <option value="burger">Burger</option>
                        <option value="dessert">Dessert</option>
                        <option value="beverage">Beverage</option>
                    </select>
                    <input name="item_image" type="file" required accept="image/png, image/jpg, image/jpeg">
                    <input name="add_item" type="submit" value="Add item">
                </form>
            </div>
            <div class="display-container">
                <?php
                if (isset($display_message)) {
                    echo " 
                <div class='display-message'>
                <span>$display_message</span>
                <span class='material-symbols-outlined cross' onclick='this.parentElement.style.display=`none`';> close </span>
                </div>
                ";
                }
                ?>
            </div>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>