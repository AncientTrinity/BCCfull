<?php
include ('includes/dbcon.php');
session_start();


// Get the user's information from the database
$userid = $_SESSION['auth_user']['userid'];
$query = "SELECT * FROM userinfo WHERE userid = $userid";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update_btn']))
{
    $fname=$_POST ['fname'];
    $lname=$_POST ['lname'];
    $address=$_POST ['address'];
    $phonenumber=$_POST ['phonenumber'];

    $udatequery="UPDATE userinfo SET fname='$fname',lname='$lname',address='$address',phonenumber='$phonenumber' WHERE userid='$userid'";
    $queryrun=mysqli_query($con,$udatequery);
}

if($queryrun){
    $_SESSION['status'] = "Updated";
    header("Location: editprofile.php");

}else{
    $_SESSION['status'] = "Notupdated";
    header("Location: editprofile.php");

}



?>