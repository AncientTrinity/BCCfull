<?php

function edithprofile($userid,$fname,$lname,$phone,$address)
{
    require ('connection.php');

    // Check if connection to database is successful
    if (!$conn) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    // Sanitize input values
    $userid = mysqli_real_escape_string($conn, $userid);
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $phone = mysqli_real_escape_string($conn, $phone);
    $address = mysqli_real_escape_string($conn, $address);

if (empty($userid) or empty($fname) or empty($lname) or empty($phone) or empty($address)){
    return false;
}


    // Prepare and execute update query
    $updatequery = "UPDATE userinfo SET fname='$fname',lname='$lname',address='$address',phonenumber='$phone' WHERE userid='$userid'";
	
	$udatequery="UPDATE userinfo SET fname='$fname',lname='$lname',address='$address',phone='$phone' WHERE userid='$userid' IS NOT NULL;";
    if (!$queryrun = mysqli_query($conn,$updatequery)) {
        echo "Error updating record: " . mysqli_error($conn);
        return false;
    }

    // Check if any rows were affected by the update query
    if (mysqli_affected_rows($conn) > 0) {
			echo "true";
        return true;
    } else {
		echo "fasle";
        return false;
    }
}



function test_edithprofile() {
    // Test case 1: Update user information with valid input
    $userid = 1;
    $fname = 'victor';
    $lname = 'tillett';
    $phone = '123456';
    $address = '12sadd3 Mawdadain St.';
    $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
    $expected_result = true;
    echo "Test case 1: Update user information with valid input.<br>";
    echo "Actual result: " . var_export($actual_result, true) . "<br>";
    echo "Expected result: " . var_export($expected_result, true) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 1 passed.<br>";
  
    // Test case 2: Update user information with empty first name
    $userid = 1;
    $fname = '';
    $lname = 'Doe';
    $phone = '1234567890';
    $address = '123 Main St.';
    $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
    $expected_result = false;
    echo "Test case 2: Update user information with empty first name.<br>";
    echo "Actual result: " . var_export($actual_result, true) . "<br>";
    echo "Expected result: " . var_export($expected_result, true) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 2 passed.<br>";
  
    // Test case 3: Update user information with invalid user ID
    $userid = 'invalid';
    $fname = 'John';
    $lname = 'Doe';
    $phone = '1234567890';
    $address = '123 Main St.';
    $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
    $expected_result = false;
    echo "Test case 3: Update user information with invalid user ID.<br>";
    echo "Actual result: " . var_export($actual_result, true) . "<br>";
    echo "Expected result: " . var_export($expected_result, true) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 3 passed.<br>";
  
    // Test case 4: Update user information with invalid phone number
    $userid = null;
    $fname = 'John';
    $lname = 'Doe';
    $phone = 'invalid';
    $address = '123 Main St.';
    $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
    $expected_result = false;
    echo "Test case 4: Update user information with invalid phone number.<br>";
    echo "Actual result: " . var_export($actual_result, true) . "<br>";
    echo "Expected result: " . var_export($expected_result, true) . "<br>";
    assert($actual_result == $expected_result);
    echo "Test case 4 passed.<br>";
  }
// Run the tests
test_edithprofile();

?>
