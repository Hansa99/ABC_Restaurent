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
    <main>
        <?php include('../includes/header.php') ?>
        <div class="login-container">
            <div class="container-left-side">
                <img src="../assets/images/common/login_side_image.jpg" alt="">
            </div>
            <div class="container-right-side">
                <div>
                    <p class="common-logo">ABC Restaurent</p>
                    <p class="welcome-text">Welcome Back</p>
                    <p class="mini-text">Sign in with your email address and Password.</p>
                    <form action="login-process.php" method="POST">
                        <div class="input-container">
                            <label for="">Email Address</label>
                            <input type="email" placeholder="Enter your email address" required name="email">
                        </div>
                        <div class="input-container">
                            <label for="">Password</label>
                            <input type="password" placeholder="Enter your password" required name="password">
                        </div>
                        <input class="form-sign-in-btn" type="submit" value="Sign In" name="login_btn">
                        <div class="sign-up-option">
                            <p>Don't have an account?</p>
                            <a href="sign-up.php">Sing Up</a>
                        </div>
                </div>
                </form>
                <!-- admin-login-btn -->
                <a class="admin-login-menu" href="admin-login.php">Admin Login <span class="material-symbols-outlined"> login</span> </a>

                <!-- staff-login-btn -->
                <a class="admin-login-menu staff" href="staff-login.php">Staff Login <span class="material-symbols-outlined"> login</span> </a>
                
                <!-- dispay login error -->
                <?php
                if (isset($_GET['error'])) {
                    $message = $_GET['error'];
                    echo '<div class="error-message" onclick="this.remove();">' . $message . '</div>';
                }
                ?>
            </div>
        </div>
    </main>
    <script src="../assets/js/script.js"></script>
</body>

</html>