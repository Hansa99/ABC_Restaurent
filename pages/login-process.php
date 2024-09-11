<?php

require_once '../includes/connection.php';
require_once '../includes/validations.php';


//check submition
if (isset($_POST['login_btn'])) {

    //sanatizing inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //input validation
    if (LoginInputValidate($email, $password)) {
        $error_text = "Please fill the input fields";
        header("location:login.php?error='$error_text'");
    } else if (emailValidate($email)) {
        $error_text = "Enter valid email";
        header("location:login.php?error='$error_text'");
    } else {

        $sql = "SELECT * FROM customers WHERE email = ?;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $error_text = "failed stmt";
            header("location:login.php?error=$error_text");
        } else {
            //bind data with stmt
            mysqli_stmt_bind_param($stmt, "s", $email);
            //execute the stmt
            mysqli_stmt_execute($stmt);

            //save the result if available
            $records = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($records)) {

                //encrypted pswd
                $hashed_pswd = $row['password'];
                $check_pswd = password_verify($password, $hashed_pswd);

                //check pswds togather
                if ($check_pswd) {
                    session_start();
                    $_SESSION['customer_id'] = $row['customer_id'];
                    $_SESSION["customer_fname"] = $row['first_name'];
                    $_SESSION["customer_lname"] = $row['last_name'];
                    $_SESSION["customer_email"] = $row['email'];

                    header("location:../index.php");
                } else {

                    $error_text ="Invalid Password";
                    header("location:login.php?error=$error_text");
                    exit();
                }
            } else {
                $error_text = "Invalid email";
                header("location:login.php?error=$error_text");
                exit();
            }
        }

        mysqli_stmt_close($stmt);
    }
} else {
    $error_text = "no inputs";
    header("location:login.php?error=$error_text");
}
