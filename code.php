<?php
session_start();
include ('includes/dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($fname,$lname,$email,$verify_token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "shrimpramen69420@gmail.com";                     //SMTP username
    $mail->Password   = "wkjfonxwlmmcobax";                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587; 
    
    $mail->setFrom("shrimpramen69420@gmail.com", $fname);
    $mail->addAddress($email);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Verify your email Address";
    $mail->Body    = "
    <h5>Please Verify your Email with the Link Below</h5>
    <br></br>
    <a href='http://localhost/bcc/verify-email.php?token=$verify_token'>click me</a>
    ";
    $mail->send();
    echo'Email has been Sent';
}
if (isset($_POST['register_btn']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $verify_token =md5(rand());

        //exsiting Email
        $check_email_query= "SELECT email FROM userinfo WHERE email='$email' LIMIT 1";
        $check_email_query_run = mysqli_query($con,$check_email_query);
    
    
        if(mysqli_num_rows($check_email_query_run)>0){
            $_SESSION['status'] = "This Email Already Exists";
            header("Location: register.php");
        }
        else{
            //insert user // registered users
            $query ="INSERT INTO userinfo (fname, lname, email, password, verify_token) VALUES('$fname','$lname','$email','$password','$verify_token') ";
            $query_run = mysqli_query($con, $query);
            if ($query_run){
                sendemail_verify("$fname","$lname","$email","$verify_token");
                $_SESSION['status'] = "Registration Sucsessful. !Please Verify your email address";
                header("Location: register.php");
    
            }else{
                $_SESSION['status'] = "Registration Failed";
                header("Location: register.php");
    
            }
        }


}

?>