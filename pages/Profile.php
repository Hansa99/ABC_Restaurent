<?php 
include('../includes/connection.php');

session_start();




if (isset($_SESSION['user_email'])) {
    
    $user_email = $_SESSION["customer_email"];
    $query = "SELECT * FROM customers WHERE email = '$user_email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        echo "User Profile:<br>";
        echo "Name: " . $row['first_name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";

    } else {
        echo "User not found!";
    }
} else {
    
    header("Location: login.php");
    exit();
}


$conn->close();
