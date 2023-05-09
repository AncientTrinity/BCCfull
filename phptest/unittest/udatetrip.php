<?php

function updatetrip($ticketid,$bussceduleid)

{
    require ('connection.php');
    if (!$conn) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

        // Sanitize input values
        $ticketid = mysqli_real_escape_string($conn, $ticketid);
        $bussceduleid = mysqli_real_escape_string($conn, $bussceduleid);
        
if (empty($ticketid) or empty($bussceduleid)){
    return false;
}
$seltrip=" UPDATE ticket SET busscheid = $bussceduleid WHERE ticketid = '$ticketid'";

$seltrip=" UPDATE ticket SET busscheid = $bussceduleid WHERE ticketid = $ticketid IS NOT NULL;";
if (!$queryrun = mysqli_query($conn,$seltrip)) {
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
function test_updatetrip(){

    $ticketid=1;
    $bussceduleid= 5;
    $actual_result = updatetrip($ticketid, $bussceduleid);
    $expected_result = true;
    echo "Test case 1: Update ticket information with valid input.<br>";
    echo "Actual result: " . var_export($actual_result, true) . "<br>";
    echo "Expected result: " . var_export($expected_result, true) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 1 passed.<br>";

        // Test case 2: Update ticket info with invalid bus schedule id
        $ticketid=1;
        $bussceduleid='';
        $actual_result = updatetrip($ticketid, $bussceduleid);
        $expected_result = false;
        echo "Test case 2: Update ticket info with invalid bus schedule id.<br>";
        echo "Actual result: " . var_export($actual_result, true) . "<br>";
        echo "Expected result: " . var_export($expected_result, true) . "<br>";
        assert($actual_result == $expected_result);
        echo "Test case 2 passed.<br>";


// Test case 3: Update ticket info with invalid id
    $ticketid='';
    $bussceduleid= 5;
    $actual_result = updatetrip($ticketid, $bussceduleid);
    $expected_result = false;
    echo "Test case 3: Update ticket info with invalid id.<br>";
    echo "Actual result: " . var_export($actual_result, true) . "<br>";
    echo "Expected result: " . var_export($expected_result, true) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 3 passed.<br>";
}
test_updatetrip();
?>
