<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Login Page</title>
</head>

<body>
    <?php include('../includes/header.php') ?>
    <main>
        <div class="login-container">
            <div class="container-left-side">
                <img src="../assets/images/common/login_side_image.jpg" alt="">
            </div>
            <div class="container-right-side">
                <div>
                    <p class="common-logo">ABC Restaurent</p>
                    <p class="welcome-text">Welcome to our resturant</p>
                    <p class="mini-text">Sign Up with your email address and Password.</p>
                    <form action="register.php" method="post">
                        <div class="name-input-container ">
                            <div class="input-container">
                                <label for="">First name</label>
                                <input type="text" placeholder="First name" name="first_name" required>
                            </div>
                            <div class="input-container">
                                <label for="">Last name</label>
                                <input type="text" placeholder="Last name" name="last_name" required>
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="">Email Address</label>
                            <input type="email" placeholder="Enter your email address" name="email" required>
                        </div>
                        <div class="input-container">
                            <label for="">Password</label>
                            <input type="password" placeholder="Password" name="password" required id="newPassword">
                        </div>
                        <div class="input-container">
                            <label for="">Confirm Password</label>
                            <input class="" type="password" placeholder="Comfirm Password" name="com_password" required id="confirmPassword">
                        </div>
                        <input class="form-sign-in-btn js-sing-up-btn" type="submit" value="Create Account" style="margin-top:10px;" name="register_btn">
                        <div class="sign-up-option">
                            <p>Already have a account?</p>
                            <a href="login.php">Sign In</a>
                        </div>
                </div>
                </form>

                <!-- display sing up error -->
                <?php
                if (isset($_GET['error'])) {
                    $message = $_GET['error'];
                    echo '<div class="error-message" onclick="this.remove();">' . $message . '</div>';
                }
                ?>
            </div>
        </div>
    </main>
    
     <!-- footer -->
     <?php include('../includes/footer.php'); ?>
    <script src="../assets/js/script.js"></script>
</body>

</html>