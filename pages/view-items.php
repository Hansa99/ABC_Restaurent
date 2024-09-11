<?php
include('../includes/connection.php');

// selecting all product data from db
$all_items = mysqli_query($conn, "Select * from `items`");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/view-items.css">
    <title>View Items</title>
</head>

<body>
    <!-- header section -->
    <?php include('../includes/admin-header.php') ?>
    <div class="view-item-container">
        <p class="item-list-title">Item - List</p>
        <div class="outer-wrapper">
            <table class="inner-wrapper">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Item Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Delete / Edit </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($all_items) > 0) {
                        // fetch data from database
                        while ($row = mysqli_fetch_assoc($all_items)) {
                    ?>

                            <tr>
                                <td class="table-data"><?php echo $row['ITEM_ID'] ?></td>
                                <td class="table-data"><?php echo $row['NAME'] ?></td>
                                <td class="table-data"><?php echo $row['DESCRIPTION'] ?></td>
                                <td class="table-data"><img class="data-image" src="../assets/images/upload/item/<?php echo $row["IMAGE"] ?>" alt=""></td>
                                <td class="table-data"><?php echo $row['PRICE'] ?></td>
                                <td class="table-data"><?php echo $row['CATEGORY'] ?></td>
                                <td class="table-data">
                                    <a data-item-id="<?php echo $row['ITEM_ID'] ?>" class="js-item-delete-btn"  href="#"><span class="material-symbols-outlined delete-icon "> delete </span></a>
                                    <a href="update-item.php?edit=<?php echo $row['ITEM_ID'] ?>"><span class="material-symbols-outlined edit-icon "> edit </span></a>
                                </td>
                            </tr>

                    <?php
                        }
                    } else {
                        echo "mukuth na hutto!";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="delete-pop-up display-off js-delete-pop-up">
            <p class="js-pop-up-message">Are you want to delete this item ?</p>
            <div class="btn-section">
                <button class="btn delete-yes-btn js-yes-btn">Yes</button>
                <button class="btn delete-no-btn js-no-btn ">No</button>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include('../includes/footer.php'); ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>