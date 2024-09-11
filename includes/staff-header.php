<?php
session_start();
$staff_name;



if (!isset($_SESSION['staff_username'])) {
    $staff_name = "Login";
} else {
    $staff_name = $_SESSION['staff_username'];
}

?>


<header>
    <nav>
        <div class="nav-logo">
            <a href="../includes/log-out.php">ABC Restaurent</a>
        </div>
        <div class="nav-mid-section">

        </div>
        <div class="nav-right-section">
            <ul>
                <li class="underline"><a href="../pages/view-items.php">View Items</a></li>
                <li class="underline"><a href="../pages/view-orders.php">View Orders</a></li>
                <li class="underline"><a href="../pages/view-reservations.php">View Reservations</a></li>
            </ul>
        </div>
        <div class="login-section">
            <p class="js-log-menu-btn"><?php echo $staff_name ?><span class="material-symbols-outlined">
                    account_circle
                </span></p>
            <?php

            //checking user logged or not
            if (!isset($_SESSION['staff_username'])) {
                echo '  <div class="sign-up-menu display-off js-login-menu">
                                    <a href="login.php">Login</a>
                                    <a href="sign-up.php">Sign Up</a>
                                </div>';
            } else {
                echo '  <div class="sign-up-menu display-off js-login-menu">
                                    <a href="#">Profile</a>
                                    <a href="../includes/log-out.php">Log Out</a>
                                 </div>';
            }
            ?>

            <span class="material-symbols-outlined nav-menu-icon js-nav-toggle">
                menu
            </span>
        </div>
        <div class="mobile-nav-section display-off js-mobile-nav">
            <ul>
                <li class="underline"><a href="../pages/view-items.php">Add Items</a></li>
                <li class="underline"><a href="../pages/view-orders.php">View Orders</a></li>
                <li class="underline"><a href="../pages/view-reservations.php">View Reservations</a></li>
            </ul>
        </div>
    </nav>
</header>