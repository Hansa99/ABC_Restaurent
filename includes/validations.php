<?php
//validate funcations

//check input fields are empty
function inputValidate($fname, $lname, $email, $password, $cpassword)
{
    $status = false;
    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($cpassword)) {
        $status = true;
    } else {
        $status = false;
    }
    return $status;
}

//login input field validation
function LoginInputValidate($email, $password)
{
    $status = false;
    if (empty($email) || empty($password)) {
        $status = true;
    } else {
        $status = false;
    }
    return $status;
}


//name validation
function nameValidate($fname, $lname)
{
    $status = false;
    if (!preg_match("/^[a-zA-Z]+$/", $fname)) {
        $status = true;
    } else if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
        $status = true;
    } else {
        $$status = false;
    }

    return $status;
}

//email validation
function emailValidate($email)
{
    $status = false;
    if (!preg_match("/^[a-zA-Z\d\._-]+@[a-zA-Z\d_-]+\.[a-zA-Z\d\.]{2,}$/", $email)) {
        $status = true;
    } else {
        $$status = false;
    }

    return $status;
}


//password validation
function passwordValidate($password)
{
    $status = false;
    if (!preg_match("/^.{5,}$/", $password)) {
        $status = true;
    } else {
        $status = false;
    }
    return $status;
}


// check email availability
function emailAvailability($conn, $email)
{
    $status = false;
    $query = "SELECT * FROM customers WHERE email = '$email' LIMIT 1 ";
    $result_set = mysqli_query($conn, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $status = true;
        } else {
            $status = false;
        }
    }
    return $status;
}
