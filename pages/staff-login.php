<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/admin-staff-login.css">
    <title>Staff Login</title>
</head>

<body>
    <?php include('../includes/header.php') ?>
    <main>
        <div class="container">
            <p class="panel-title">Staff Login Panel</p>
            <div class="login-cart">
                <div class="admin-icon">
                    <span class="material-symbols-outlined">
                        shield_person
                    </span>
                </div>
                <form action="staff-login-process.php" class="admin-login-form" method="POST">
                    <input type="email" placeholder="Staff Username" required name="staff_username">
                    <input type="password" placeholder="Password" required name="staff_password">
                    <input type="submit" class="admin-login-btn" value="Login" name="staff_login_btn">
                </form>
            </div>

            <!-- admin login error display -->
            <?php
            if (isset($_GET['error'])) {
                $message = $_GET['error'];
                echo '<div class="error-message" onclick="this.remove();">' . $message . '</div>';
            }
            ?>

        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
    <script src="../assets/js/script.js"></script>
</body>

</html>