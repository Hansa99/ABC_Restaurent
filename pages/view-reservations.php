<?php
include('../includes/connection.php');

$reservation = mysqli_query($conn, "SELECT * FROM reservation");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/view-items.css">
    <title>View Reservations</title>
</head>

<body>
    <!-- header section -->
    <?php include('../includes/admin-header.php') ?>
    <div class="view-item-container">
        <p class="item-list-title">Active - Reservations</p>
        <div class="outer-wrapper">
            <table class="inner-wrapper">
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Guests</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($reservation) > 0) {
                        // fetch data from database
                        while ($row = mysqli_fetch_assoc($reservation)) {
                            $reservation_id = $row['reservation_id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $date = $row['date'];
                            $time = $row['time'];
                            $guests = $row['guests'];
                    ?>
                            <tr>
                                <td class="table-data"><?php echo $reservation_id ?></td>
                                <td class="table-data"><?php echo $name ?></td>
                                <td class="table-data"><?php echo $email ?></td>
                                <td class="table-data"><?php echo $phone ?></td>
                                <td class="table-data"><?php echo $date ?></td>
                                <td class="table-data"><?php echo $time ?></td>
                                <td class="table-data"><?php echo $guests ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>No reservation found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('../includes/footer.php'); ?>
    <script src="../assets/js/script.js"></script>
</body>

</html>
