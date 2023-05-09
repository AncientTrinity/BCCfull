<?php
function bookinghistory($userid) {
    require ('connection.php');

    $seltrip="SELECT T.ticketid, UI.fname,S.seattype,LS.location,L.location,BS.busarrival
    From ticket T 
    JOIN busschedule as BS 
    ON BS.busscheid = T.busscheid 
    JOIN locationofstop AS LS 
    ON BS.begin_locationid = LS.stoplocid 
    JOIN locationofstop AS L
    ON BS.end_locationid = L.stoplocid 
    JOIN seat AS S ON T.seatid = S.seatid 
    JOIN userinfo as UI 
    ON T.userid = UI.userid 
    WHERE UI.userid = ?";

    $queryrun=mysqli_prepare($conn,$seltrip);
    $queryrun->bind_param('s', $userid);
    $queryrun->execute();
    $result=$queryrun->get_result();

    if(mysqli_num_rows($result)==0){
        echo "No Trips Found";    //test cases query runs

    }else{

        while($row = mysqli_fetch_assoc($result)){
            echo "Ticket ID: " . $row["ticketid"] . "<br>";
            echo "First Name: " . $row["fname"] . "<br>";
            echo "Seat Type: " . $row["seattype"] . "<br>";
            echo "Begin Location: " . $row["location"] . "<br>";
            echo "End Location: " . $row["location"] . "<br>";
            echo "Bus Arrived At: " . $row["busarrival"] . "<br>";
        }
    }
}

function test_bookinghistory() {
    // Test Case 1: Valid User ID with History
    $userid = "3";
    ob_start();
    bookinghistory($userid);
	$expected_result = "Ticket ID: 1<br>First Name: Chris<br>Seat Type: normal<br>Begin Location: Cayo<br>End Location: Cayo<br>Bus Arrived At: 10:00:00<br>";
    $actual_result = ob_get_clean();
    compare_results($expected_result, $actual_result);

    // Test Case 2: Valid User ID with no History
    $userid = "5678";
    ob_start();
	$expected_result = "No Trips Found";
    bookinghistory($userid);
    $actual_result = ob_get_clean();
    compare_results($expected_result, $actual_result);

    // Test Case 3: Invalid User ID (Non-existent User)
    $userid = "9999";
    ob_start();
    bookinghistory($userid);
	$expected_result = "No Trips Found";
    $actual_result = ob_get_clean();
    compare_results($expected_result, $actual_result);

    // Test Case 4: Invalid User ID (Empty String)
    $userid = "";
    ob_start();
    bookinghistory($userid);
	$expected_result = "No Trips Found";
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

test_bookinghistory();
 
?>