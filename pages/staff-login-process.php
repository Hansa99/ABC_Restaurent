<?php
include('../includes/connection.php');
include('../includes/validations.php');

if (isset($_POST['staff_login_btn'])) {

    //sanatizing inputs
    $username = mysqli_real_escape_string($conn, $_POST['staff_username']);
    $password = mysqli_real_escape_string($conn, $_POST['staff_password']);


    //validating inputs
    if (!LoginInputValidate($username, $password)) {

        $query = "SELECT * FROM `users` WHERE user_email='$username' AND password='$password'  AND  user_type='staff'   LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['staff_username'] = $row['user_email'];
                header("location:staffPanel.php");
            } 
            else {
                $error = "Invalid credentials";
                header("location:staff-login.php?error=$error");
            }

        } else {
            $error = "Invalid credentials";
            header("location:staff-login.php?error=$error");
        }
    } else {
        $error = "Please Enter Username and Password";
        header("location:staff-login.php?error=$error");
    }
}
