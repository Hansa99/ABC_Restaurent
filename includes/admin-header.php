<?php
session_start();
$user_name;

if (isset($_SESSION['admin_username'])) {
    $user_name = $_SESSION['admin_username'];
} else if (isset($_SESSION['staff_username'])) {
    $user_name = $_SESSION['staff_username'];
} else {
    $user_name = "Login";
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
                <?php
                if (isset($_SESSION['admin_username'])) {
                ?>
                    <li class="underline"><a href="../pages/adminPanel.php">Add Items</a></li>
                    <li class="underline"><a href="../pages/view-items.php">View Items</a></li>
                    <li class="underline"><a href="../pages/view-orders.php">View Orders</a></li>
                    <li class="underline"><a href="../pages/view-reservations.php">View Reservations</a></li>

                <?php
                } else if (isset($_SESSION['staff_username'])) {
                ?>
                    <li class="underline"><a href="../pages/view-items.php">View Items</a></li>
                    <li class="underline"><a href="../pages/view-orders.php">View Orders</a></li>
                    <li class="underline"><a href="../pages/view-reservations.php">View Reservations</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="login-section">

            <p class="js-log-menu-btn"><?php echo $user_name ?><span class="material-symbols-outlined">
                    account_circle
                </span></p>



            <?php
            // checking user logged or not
            if (isset($_SESSION['admin_username']) || isset($_SESSION['staff_username'])) {
                echo '<div class="sign-up-menu display-off js-login-menu">
              <a href="#">Profile</a>
              <a href="../includes/log-out.php">Log Out</a>
          </div>';
            } else {
                echo '<div class="sign-up-menu display-off js-login-menu">
              <a href="login.php">Login</a>
              <a href="sign-up.php">Sign Up</a>
          </div>';
            }
            ?>


            <span class="material-symbols-outlined nav-menu-icon js-nav-toggle">
                menu
            </span>
        </div>
        <div class="mobile-nav-section display-off js-mobile-nav">
            <ul>
                <?php
                if (isset($_SESSION['admin_username'])) {
                ?>
                    <li class="underline"><a href="../pages/adminPanel.php">Add Items</a></li>
                    <li class="underline"><a href="../pages/view-items.php">View Items</a></li>
                    <li class="underline"><a href="../pages/view-orders.php">View Orders</a></li>
                    <li class="underline"><a href="../pages/view-reservations.php">View Reservations</a></li>

                <?php
                } else if (isset($_SESSION['staff_username'])) {
                ?>
                    <li class="underline"><a href="../pages/view-items.php">View Items</a></li>
                    <li class="underline"><a href="../pages/view-orders.php">View Orders</a></li>
                    <li class="underline"><a href="../pages/view-reservations.php">View Reservations</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</header>