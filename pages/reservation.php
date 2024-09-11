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
    <link rel="stylesheet" href="../assets/css/reservation.css">
    <title>Reservation</title>
</head>

<body>
    <?php include('../includes/header.php') ?>
    <main>
        <div class="reservation-container">
            <div class="inner-container">
                <div class="reservation-card">
                    <div class="reservation-card-top">
                        <p>Reservation Table</p>
                    </div>
                    <div class="reservation-card-bot">
                        <form action="reservation-process.php" method="POST" class="reservation-form">

                            <div class="input-couple">
                                <div class="input-element">
                                    <label for="">Enter Your Name</label>
                                    <input type="text" placeholder="Enter Your Name" name="name"  required>
                                </div>

                                <div class="input-element">
                                    <label for="">Enter Your Email</label>
                                    <input type="email" placeholder="Enter Your Email" name="email" required>
                                </div>

                            </div>

                            <div class="input-couple">
                                <div class="input-element">
                                    <label for="">Enter Date</label>
                                    <input type="date" placeholder="Enter Date" name="date" required >
                                </div>

                                <div class="input-element">
                                    <label for="">Enter Time</label>
                                    <input type="Time" placeholder="Enter Time" name="time" required>
                                </div>
                            </div>

                            <div class="input-couple">
                                <div class="input-element">
                                    <label for="">Enter Your Phone Number</label>
                                    <input type="tel" placeholder="Enter Phone Number"  name="phone_number" required>
                                </div>

                                <div class="input-element">
                                    <label for="">Number of Guests</label>
                                    <input type="number" placeholder="Number of Guests" name="guests" required>
                                </div>
                            </div>

                            <input type="submit" value="Add Reservation" class="add-reservation-btn" name="add_reservation">

                        </form>
                    </div>
                </div>

                <!-- display message -->
                <?php
                if (isset($_GET['msg'])) {
                    $message = $_GET['msg'];
                    echo '<div class="error-message" onclick="this.remove();">' . $message . '</div>';
                }
                ?>
            </div>
        </div>
    </main>
    <?php include('../includes/footer.php') ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>