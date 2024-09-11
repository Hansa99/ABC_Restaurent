<?php 
include('../includes/connection.php');

if(isset($_POST['search_add'])){

    $search_item = mysqli_real_escape_string($conn, $_POST['search']);

    // Assuming "item_name" is the column in your "items" table where the menu items are stored
    $sql = 'SELECT * FROM items WHERE NAME = "'.$search_item.'"';

    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $msg = "Item Found Pleas visit Menu Page";
            header("location:../index.php?result=$msg");
        } else {
            echo "Sorry, the item '$search_item' is not available in our menu.";
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }

    $conn->close();
}
