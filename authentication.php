<?php
session_start();

if (!isset($_SESSION['authenticated'])){
    $_SESSION['status']= "please login to user dashboard auth php";
    header('location:signin.php'); 
    exit(0);
}


?>