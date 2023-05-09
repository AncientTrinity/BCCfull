<?php
function paymentinfo($userid){
    require ('connection.php');

    $query = "SELECT S.seatname, LS.location as begin_location, L.location as end_location, BS.busarrival, BC.buscompname, B.busnumber, BS.cost 
              FROM ticket T 
              JOIN busschedule BS ON BS.busscheid = T.busscheid 
              JOIN bus B ON BS.busid = B.busid 
              JOIN buscompanies BC ON B.buscompid = BC.buscompid 
              JOIN locationofstop LS ON BS.begin_locationid = LS.stoplocid 
              JOIN locationofstop L ON BS.end_locationid = L.stoplocid 
              JOIN seat S ON T.seatid = S.seatid 
              WHERE T.userid = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "No Trips Found";
    } else {
        while ($row = $result->fetch_assoc()) {
            echo "Seat Name: " . $row["seatname"] . "<br>";
            echo "Begin Location: " . $row["begin_location"] . "<br>";
            echo "End Location: " . $row["end_location"] . "<br>";
            echo "Bus Arrived At: " . $row["busarrival"] . "<br>";
            echo "Buscompany Name: " . $row["buscompname"] . "<br>";
            echo "Bus Number: " . $row["busnumber"] . "<br>";
            echo "Cost: " . $row["cost"] . "<br>";
        }
    }
}
function test_paymentinfo() {
    require ('connection.php');
    
    // Test case 1: valid user id
    echo "Test case 1: valid user id<br>";
    $expected_result = "Seat Name: b2<br>Begin Location: Belmopan<br>End Location: Cayo<br>Bus Arrived At: 10:00:00<br>Buscompany Name: Morales<br>Bus Number: 4200<br>Cost: 5<br>";
    ob_start();
    paymentinfo(3);
    $actual_result = ob_get_clean();
    compare_results($expected_result, $actual_result);

    // Test case 2: invalid user id
    echo "\nTest case 2: invalid user id<br>";
    $expected_result = "No Trips Found";
    ob_start();
    paymentinfo(1000);
    $actual_result = ob_get_clean();
    compare_results($expected_result, $actual_result);

    // Test case 3: no trips found for user
    echo "\nTest case 3: no trips found for user<br>";
    $expected_result = "No Trips Found";
    ob_start();
    paymentinfo(2);
    $actual_result = ob_get_clean();
    compare_results($expected_result, $actual_result);

}

function compare_results($expected_result, $actual_result) {
    if ($expected_result === $actual_result) {
        echo "PASS\n<br>";
    } else {
        echo "FAIL\n<br>";
        echo "Expected result: $expected_result\n";
        echo "Actual result: $actual_result\n<br>";
    }
}

test_paymentinfo();

?>
