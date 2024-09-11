<?php
include('../includes/connection.php');
include('../includes/validations.php');

if (isset($_POST['admin_login_btn'])) {

    //sanatizing inputs
    $username = mysqli_real_escape_string($conn, $_POST['admin_username']);
    $password = mysqli_real_escape_string($conn, $_POST['admin_password']);


    //validating inputs
    if (!LoginInputValidate($username, $password)) {

        $query = "SELECT * FROM `users` WHERE user_email='$username' AND password='$password'  AND  user_type='admin'   LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['admin_username'] = $row['user_email'];
                header("location:adminPanel.php");
            } 
            else {
                $error = "Invalid credentials";
                header("location:admin-login.php?error=$error");
            }

        } else {
            $error = "Invalid credentials";
            header("location:adminPanel.php?error=$error");
        }
    } else {
        $error = "Please Enter Username and Password";
        header("location:admin-login.php?error=$error");
    }
}
