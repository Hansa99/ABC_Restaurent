<?php
require_once "../includes/connection.php";

$sql_pizza = "SELECT * FROM items WHERE CATEGORY='pizza'";
$sql_rice = "SELECT * FROM items WHERE CATEGORY='rice'";
$sql_burger = "SELECT * FROM items WHERE CATEGORY='burger'";
$sql_dessert = "SELECT * FROM items WHERE CATEGORY='dessert'";
$sql_beverage = "SELECT * FROM items WHERE CATEGORY='beverage'";

$all_pizza_items = $conn->query($sql_pizza);
$all_rice_items = $conn->query($sql_rice);
$all_burgers_items = $conn->query($sql_burger);
$all_dessert_items = $conn->query($sql_dessert);
$all_beverage_items = $conn->query($sql_beverage);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/menu.css">
    <title>Menu</title>
</head>

<body>
    <?php include('../includes/header.php') ?>
    <main>
        <p class="menu-main-title">Menu</p>
        <div class="menu-container">
            <p class="categories-title">Categories</p>
            <div class="menu-categories">
                <a href="#catagory-pizza">Pizzas</a>
                <a href="#catagory-rice">Rice Dishes</a>
                <a href="#category-burger">Burgers</a>
                <a href="#category-desserts">Desserts</a>
                <a href="#category-beverages">Beverages</a>
            </div>
            <div class="category-set">
                <div id="catagory-pizza">
                    <p class="category-title">Pizzas</p>
                    <div class="item-list">
                        <?php
                        while ($row = mysqli_fetch_assoc($all_pizza_items)) {
                        ?>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../assets/images/upload/item/<?php echo $row["IMAGE"] ?>" alt="">
                                </div>
                                <form class="item-details" action="cart-process.php" method="POST">
                                    <p class="item-name"><?php echo $row["NAME"] ?></p>

                                    <input type="hidden" name=item_name value="<?php echo $row["NAME"] ?>">
                                    <input type="hidden" name=item_price value="<?php echo $row["PRICE"] ?>">
                                    <input type="hidden" name=item_image value="<?php echo $row["IMAGE"] ?>">
        

                                    <p class="item-description"> <?php echo $row["DESCRIPTION"] ?> </p>
                                    <div class="item-price-and-qt">
                                        <div class="item-price"><?php echo "Rs." . $row["PRICE"] ?></div>
                                        <div class="item-quantity">
                                            <span>QTY </span><input type="number" name="item_quantity" min="1" max="15">
                                        </div>
                                    </div>
                                    <input type="submit"  name="add_to_cart" class="add-to-order-btn" value="Add to Order">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="catagory-rice" class="category-gap">
                    <p class="category-title">Rice Dishes</p>
                    <div class="item-list">
                        <?php
                        while ($row = mysqli_fetch_assoc($all_rice_items)) {
                        ?>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../assets/images/upload/item/<?php echo $row["IMAGE"] ?>" alt="">
                                </div>
                                <form class="item-details" action="cart-process.php" method="POST">
                                    <p class="item-name"><?php echo $row["NAME"] ?></p>

                                    <input type="hidden" name=item_name value="<?php echo $row["NAME"] ?>">
                                    <input type="hidden" name=item_price value="<?php echo $row["PRICE"] ?>">
                                    <input type="hidden" name=item_image value="<?php echo $row["IMAGE"] ?>">

                                    <p class="item-description"> <?php echo $row["DESCRIPTION"] ?> </p>
                                    <div class="item-price-and-qt">
                                        <div class="item-price"><?php echo "Rs." . $row["PRICE"] ?></div>
                                        <div class="item-quantity">
                                            <span>QTY </span><input type="number" name="item_quantity" min="1" max="15">
                                        </div>
                                    </div>
                                    <input type="submit"  name="add_to_cart" class="add-to-order-btn" value="Add to Order">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="category-burger" class="category-gap">
                    <p class="category-title">Burgers</p>
                    <div class="item-list">
                        <?php
                        while ($row = mysqli_fetch_assoc($all_burgers_items)) {
                        ?>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../assets/images/upload/item/<?php echo $row["IMAGE"] ?>" alt="">
                                </div>
                                <form class="item-details" action="cart-process.php" method="POST">
                                    <p class="item-name"><?php echo $row["NAME"] ?></p>

                                    <input type="hidden" name=item_name value="<?php echo $row["NAME"] ?>">
                                    <input type="hidden" name=item_price value="<?php echo $row["PRICE"] ?>">
                                    <input type="hidden" name=item_image value="<?php echo $row["IMAGE"] ?>">

                                    <p class="item-description"> <?php echo $row["DESCRIPTION"] ?> </p>
                                    <div class="item-price-and-qt">
                                        <div class="item-price"><?php echo "Rs." . $row["PRICE"] ?></div>
                                        <div class="item-quantity">
                                            <span>QTY </span><input type="number" name="item_quantity" min="1" max="15">
                                        </div>
                                    </div>
                                    <input type="submit"  name="add_to_cart" class="add-to-order-btn" value="Add to Order">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="category-desserts" class="category-gap">
                    <p class="category-title">Desserts</p>
                    <div class="item-list">
                        <?php
                        while ($row = mysqli_fetch_assoc($all_dessert_items)) {
                        ?>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../assets/images/upload/item/<?php echo $row["IMAGE"] ?>" alt="">
                                </div>
                                <form class="item-details" action="cart-process.php" method="POST">
                                    <p class="item-name"><?php echo $row["NAME"] ?></p>

                                    <input type="hidden" name=item_name value="<?php echo $row["NAME"] ?>">
                                    <input type="hidden" name=item_price value="<?php echo $row["PRICE"] ?>">
                                    <input type="hidden" name=item_image value="<?php echo $row["IMAGE"] ?>">

                                    <p class="item-description"> <?php echo $row["DESCRIPTION"] ?> </p>
                                    <div class="item-price-and-qt">
                                        <div class="item-price"><?php echo "Rs." . $row["PRICE"] ?></div>
                                        <div class="item-quantity">
                                            <span>QTY </span><input type="number" name="item_quantity" min="1" max="15">
                                        </div>
                                    </div>
                                    <input type="submit"  name="add_to_cart" class="add-to-order-btn" value="Add to Order">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="category-beverages" class="category-gap">
                    <p class="category-title">Beverages</p>
                    <div class="item-list">
                        <?php
                        while ($row = mysqli_fetch_assoc($all_beverage_items)) {
                        ?>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../assets/images/upload/item/<?php echo $row["IMAGE"] ?>" alt="">
                                </div>
                                <form class="item-details" action="cart-process.php" method="POST">
                                    <p class="item-name"><?php echo $row["NAME"] ?></p>

                                    <input type="hidden" name=item_name value="<?php echo $row["NAME"] ?>">
                                    <input type="hidden" name=item_price value="<?php echo $row["PRICE"] ?>">
                                    <input type="hidden" name=item_image value="<?php echo $row["IMAGE"] ?>">

                                    <p class="item-description"> <?php echo $row["DESCRIPTION"] ?> </p>
                                    <div class="item-price-and-qt">
                                        <div class="item-price"><?php echo "Rs." . $row["PRICE"] ?></div>
                                        <div class="item-quantity">
                                            <span>QTY </span><input type="number" name="item_quantity" min="1" max="15">
                                        </div>
                                    </div>
                                    <input type="submit"  name="add_to_cart" class="add-to-order-btn" value="Add to Order">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- js file linked -->
    <script src="../assets/js/script.js"></script>
</body>

</html>