<?php
include('../includes/connection.php');

// getting data get method
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    // fetching data from db
    $edit_query = mysqli_query($conn, "SELECT * FROM `items` WHERE ITEM_ID=$edit_id") or die('Unable to connect to execute thequery');
    $row = mysqli_fetch_assoc($edit_query);
}



//update product logic
if (isset($_POST['update_product'])) {
    $updated_id = $_POST['update_item_id'];
    $updated_name = $_POST['update_item_name'];
    $updated_price = $_POST['update_item_price'];
    $updated_description = $_POST['update_item_description'];
    $updated_category = $_POST['update_item_category'];


    $updated_image = $row['IMAGE'];
    $updated_image_tmpName;
    $updated_image_folder;

    if (isset($_FILES['update_item_image']) && $_FILES['update_item_image']['error'] == 0) {
        $updated_image = $_FILES['update_item_image']['name'];
        $updated_image_tmpName = $_FILES['update_item_image']['tmp_name'];
        $updated_image_folder = '../assets/images/upload/item/' . $updated_image;

        // Move the uploaded image to the folder
        move_uploaded_file($updated_image_tmpName, $updated_image_folder);
        echo "item updated!";
    }





    // update query
    $update_items = mysqli_query($conn, "UPDATE `items` SET NAME='$updated_name', DESCRIPTION='$updated_description', 
    IMAGE='$updated_image', PRICE='$updated_price', CATEGORY='$updated_category' WHERE ITEM_ID=$updated_id");

    if ($update_items) {
        echo "Item updated!";
        header('location:view-items.php');
    } else {
        echo "update error";
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
    <link rel="stylesheet" href="../assets/css/update-item.css">
    <title>Update Item</title>
</head>

<body>
    <?php include('../includes/admin-header.php') ?>
    <main>
        <!-- main-container -->
        <div class="container">
            <p class="update-title">Update Item Details</p>

            <?php
            if (mysqli_num_rows($edit_query) > 0) {
            ?>
                <!-- form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="preview-item-image">
                        <img src="../assets/images/upload/item/<?php echo $row['IMAGE'] ?>" alt="">
                    </div>
                    <div class="form-items">
                        <input type="hidden" name="update_item_id" value="<?php echo $row['ITEM_ID'] ?>">
                        <input type="text" placeholder="Item Name" value="<?php echo $row['NAME'] ?>" name="update_item_name" required>
                        <input type="text" placeholder="Item Price" value="<?php echo $row['PRICE'] ?>" name="update_item_price" required>
                        <textarea id="" cols="30" rows="5" placeholder="Description" required name="update_item_description"><?php echo $row['DESCRIPTION'] ?></textarea>
                        <select id="" name="update_item_category" required>
                            <option value="pizza">Pizza</option>
                            <option value="rice">Rice Dish</option>
                            <option value="burger">Burger</option>
                            <option value="dessert">Dessert</option>
                            <option value="beverage">Beverage</option>
                        </select>
                        <input name="update_item_image" type="file" accept="image/png, image/jpg, image/jpeg">
                        <div class="form-btns">
                            <input class="update-details-btn" name="update_product" type="submit" value="Update Item">
                            <input type="reset" class="cancel-details-btn" value="Cancel">
                        </div>
                    </div>
                </form>

            <?php
            }
            ?>
        </div>
    </main>
</body>
</html>