<?php
session_start();
include ('includes/dbcon.php');
 if(isset($_GET['token'])){
    $token=$_GET['token'];
    $verify_query= "SELECT 	verify_token,verify_status FROM userinfo WHERE verify_token= '$token' LIMIT 1";
    $verify_query_run = mysqli_query($con,$verify_query);

    if (mysqli_num_rows($verify_query_run)>0)
    {
        $row=mysqli_fetch_array($verify_query_run);
        //echo $row ['verify_token'];
        if( $row ['verify_status']=="0")
        {
            $clicked_token=$row['verify_token'];
            $update_query="UPDATE userinfo SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_query_run=mysqli_query($con,$update_query);

            if($update_query_run){
                $_SESSION['status']= "Your account has been Succsessfully Verified.!";
                header("location:login.php"); 
                exit(0);
            }
            else{
                $_SESSION['status']= "verification Failed";
                header("location:login.php"); 
                exit(0);
            }
        }
        else
        { 
            $_SESSION['status']= "Email Already verified Please login";
            header("location:login.php"); 
            exit(0);
        }
    }else
    {
        $_SESSION['status']= "This Token Doesnt Exist";
        header("location:login.php"); 
        exit(0);
    }


 }
 else {
    $_SESSION['status']= "Not Allowed";
    header("location:login.php");
    exit(0);
 }
?>