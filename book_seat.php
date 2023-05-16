<?php
session_start();
include ('includes/dbcon.php');



    // Retrieve the submitted seat number
$seatNumber = $_POST['seatno'];

// Check if the seat is available
$sql = "SELECT * FROM seat WHERE seatno = '$seatNumber' AND is_booked = 0";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Seat is available, mark it as booked
    $sql = "UPDATE seat SET is_booked = 1 WHERE seatno = '$seatNumber'";
    if ($conn->query($sql) === TRUE) {
        echo "Seat $seatNumber booked successfully.";
    } else {
        echo "Error updating seat status: " . $con->error;
        header("location:payment-options.php"); 
        exit(0);
    }
} else {
    // Seat is already booked or doesn't exist
    echo "Seat $seatNumber is not available.";
}

?>