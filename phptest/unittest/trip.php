<?php

function trip($userid,$seatid,$busscheid,$numticketsavailable)


{
    require ('connection.php');
    if (!$conn) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

        // Sanitize input values
        $userid = mysqli_real_escape_string($conn, $userid);
        $busscheid = mysqli_real_escape_string($conn, $busscheid);
        $seatid = mysqli_real_escape_string($conn, $seatid);
        $numticketsavailable = mysqli_real_escape_string($conn, $numticketsavailable);
        
if (empty($userid) or empty($seatid) or empty($busscheid)or empty($numticketsavailable)){
    return false;
}
$trip=" INSERT INTO ticket (userid,seatid,busscheid,numticketsavailable)
VALUES('$userid','$seatid','$busscheid','$numticketsavailable') ";

$trip="  INSERT INTO ticket (userid,seatid,busscheid,numticketsavailable)
VALUES('$userid','$seatid','$busscheid','$numticketsavailable') ;" ;
if (!$queryrun = mysqli_query($conn,$trip)) {
    echo "Error updating record: " . mysqli_error($conn);
    return false;
}
    // Check if any rows were affected by the update query
    if (mysqli_affected_rows($conn) > 0) {
        echo "true";
    return true;
} else {
    echo "false";
    return false;
}
}


function test_trip() {
    // Test case 1: select trip with valid input
    $userid =1;
    $seatid =1;
    $busscheid=1;
    $numticketsavailable = 25; 
    $actual_result = trip($userid,$seatid,$busscheid,$numticketsavailable);
    $expected_result = true;
    echo "Test case 1: select trip with valid input<br>";
    echo "Actual result: " . var_export($actual_result, true) . "<br>";
    echo "Expected result: " . var_export($expected_result, true) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 1 passed.<br>";

        // Test case 1: select trip with invalid input
    $userid =1;
    $seatid ='';
    $busscheid=1;
    $numticketsavailable = 25; 
    $actual_result = trip($userid,$seatid,$busscheid,$numticketsavailable);
    $expected_result = false;
    echo "Test case 1: select trip with invalid input.<br>";
    echo "Actual result: " . var_export($actual_result, false) . "<br>";
    echo "Expected result: " . var_export($expected_result, false) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 1 passed.<br>";
           
    // Test case 3: select valid treip with invalid buschedid
    $userid =1;
    $seatid =1;
    $busscheid='';
    $numticketsavailable = 25; 
    $actual_result = trip($userid,$seatid,$busscheid,$numticketsavailable);
    $expected_result = false;
    echo "Test case 1: select valid treip with invalid buschedid<br>";
    echo "Actual result: " . var_export($actual_result, false) . "<br>";
    echo "Expected result: " . var_export($expected_result, false) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 1 passed.<br>";
}
test_trip();

?>