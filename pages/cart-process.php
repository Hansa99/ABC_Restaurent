<?php
include('../includes/connection.php');
session_start();
$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION["customer_fname"];

if (isset($customer_id)) {


    // add item to cart
    if (isset($_POST['add_to_cart'])) {

        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_image = $_POST['item_image'];
        $item_quantity = $_POST['item_quantity'];


        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name= '$item_name'
        AND customer_id = '$customer_id'") or die('query failed!');

        if (mysqli_num_rows($select_cart) > 0) {

            $msg = "Item already added to cart";
            header('location:menu.php');
        } else {
            mysqli_query($conn, "INSERT INTO `cart` (customer_id, name, price, image, quantity) 
            VALUES ('$customer_id', '$item_name', '$item_price', '$item_image', '$item_quantity') ") or die('insert query failed!');

            $msg = "Item added to cart";
            header('location:menu.php');
        }
    }


    //update cart item
    if (isset($_POST['update_cart'])) {
        $update_quantity = $_POST['cart_quantity'];
        $update_id = $_POST['cart_id'];
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE cart_id = '$update_id'") or die('query failed');

        $msg = "Cart Item Updated";
        header('location:menu.php');
    }



    //delete cart item
    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$remove_id'") or die('query failed');
        header('location:menu.php');
    }



    //delete all items from cart
    if (isset($_GET['delete_all'])) {
        mysqli_query($conn, "DELETE FROM `cart` WHERE customer_id = '$customer_id'") or die('query failed');
        $_SESSION['cart_items'] = 0;
        header('location:checkout.php');
    }




    //placing order functionality
    if (isset($_POST['place_order'])) {

        $payment_type = $_POST['payment_type'];
        $grand_total = $_POST['grand_total'];

        // Fetch items from the cart
        $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id'");
        $ordered_items = [];


        while ($fetchCart = mysqli_fetch_assoc($cart_query)) {
            $ordered_items[] = [
                'item_name' => $fetchCart['name'],
                'quantity' => $fetchCart['quantity'],
            ];
        }


        // Serialize the ordered items
        $serialized_items = serialize($ordered_items);


        // Insert the order details into the orders table
        $insert_order_query = "INSERT INTO orders (customer_id, customer_name, payment_type, grand_total, other_details) VALUES 
        ('$customer_id', '$customer_name', '$payment_type', '$grand_total', '$serialized_items')";

        $result = mysqli_query($conn, $insert_order_query);

        if ($result) {
            // Clear the cart or perform other actions if needed
            mysqli_query($conn, "DELETE FROM `cart` WHERE customer_id = '$customer_id'");

            header("location:menu.php"); // Redirect to a success page
            exit();

        }
        else {
            // Handle the case where the order insertion fails
            echo "Error inserting order: " . mysqli_error($conn);
        }

    }


} else {
    header('location:login.php');
}
