<?php 
    include('../includes/connection.php');

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = mysqli_query($conn, "DELETE FROM `items` WHERE ITEM_ID=$delete_id") or die('Qery failed!');

        if($delete_query){
            header('location:view-items.php');
        }
        else{
            echo "Item delete failed";
            header('location:view-items.php');
        }
    }
?>