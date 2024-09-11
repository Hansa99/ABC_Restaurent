<?php include('../includes/connection.php');

if(isset($_POST['add_reservation'])){
    
    $name =  mysqli_real_escape_string($conn, $_POST['name']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $date =  mysqli_real_escape_string($conn, $_POST['date']);
    $time =  mysqli_real_escape_string($conn, $_POST['time']);
    $phone =  mysqli_real_escape_string($conn, $_POST['phone_number']);
    $guests =  mysqli_real_escape_string($conn, $_POST['guests']);

    $sql = "INSERT INTO reservation (name, email, phone, date, time, guests) VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests')";

    if ($conn->query($sql) === TRUE) {
        $msg = "Reservation successful!";
        header("location:reservation.php?msg=$msg");
        
    } else {
        $msg = "Reservation Failed!";
        header("location:reservation.php?msg=$msg");
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
