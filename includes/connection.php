<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "abc_restaurent";

// connection to database
$conn = new mysqli($servername, $username, $password, $db_name);

if (!$conn) {
    die('Could not connect' . mysqli_errno($conn));
}




