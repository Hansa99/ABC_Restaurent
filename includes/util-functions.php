<?php  

function updateCart(){
    include('connection.php');
    $customer_id = $_SESSION['customer_id'];
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE customer_id = '$customer_id'") or die('query failed');
    if (($row = mysqli_num_rows($cart_query)) > 0){
        $item_count = $row;
        return $item_count;
    }
    else{
        return 0;
    }
}

?>