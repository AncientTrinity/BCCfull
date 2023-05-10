<?php
session_start();
include ('includes/dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function  send_password_reset($get_fname,$get_email,$token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "shrimpramen69420@gmail.com";                     //SMTP username
    $mail->Password   = "wkjfonxwlmmcobax";                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587; 
    
    $mail->setFrom("shrimpramen69420@gmail.com", $get_fname);
    $mail->addAddress($get_email);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Resend-Verify your email Address";
    $mail->Body    = "
    <h5>Please Verify your Email with the Link Below</h5>
    <br></br>
    <a href='http://localhost/bcc2/passwordres.php?token=$token&email=$get_email'>click me</a>
    ";
    $mail->send();
}

if(isset($_POST['password_reset_link']))
{
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $token=md5(rand());
    
    $checkemail_query="SELECT * FROM userinfo WHERE email='$email' LIMIT 1";
    $checkemail_query_run = mysqli_query($con,$checkemail_query);

    if(mysqli_num_rows($checkemail_query_run)>0)
    {
        $row=mysqli_fetch_array($checkemail_query_run);
        $get_fname=$row['fname'];
        $get_email=$row['email'];

        $update_token="UPDATE userinfo SET verify_token='$token' WHERE email='$email' LIMIT 1";
        $update_token_run=mysqli_query($con, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_fname,$get_email,$token);
            $_SESSION['status']= "OOPS! Something Went Wrong55";
            header("location:change-password.php"); 
            exit(0);

        } else
        {
            $_SESSION['status']= "OOPS! Something Went Wrong61";
            header("location:change-password.php"); 
            exit(0);
        }
    }
    else{
        $_SESSION['status']= "No Email Found";
        header("location:change-password.php"); 
        exit(0);
    }
}



if (isset($_POST['password_update'])){
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $new_password= mysqli_real_escape_string($con,$_POST['new_password']);
    $confirm_password= mysqli_real_escape_string($con,$_POST['confirm_password']);
    $token= mysqli_real_escape_string($con,$_POST['token']);
    if(!empty($token))
    {

        if(!empty($email)&& !empty($new_password)&& !empty($confirm_password))
        {
            $checktoken="SELECT verify_token FROM userinfo WHERE verify_token='$token' LIMIT 1";
            $check_token_run=mysqli_query($con,$checktoken);

            if(mysqli_num_rows($check_token_run)>0)
            {
                if($new_password == $confirm_password){
                    $update_password ="UPDATE userinfo SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run=mysqli_query($con,$update_password);
                }
                if ($update_password_run)
                {
                    $_SESSION['status']= "UPDATED PASSWORD! ";
                    header("location:signin.php"); 
                    exit(0);
                }
                else{
                    $_SESSION['status']= "Did not update password ";
                    header("location:passwordres.php?token=$token&email=$get_email"); 
                    exit(0); 
                }

            }
        }
        else{
            $_SESSION['status']= "Password and confirm password does not match";
            header("location:passwordres.php?token=$token&email=$get_email"); 
            exit(0); 
        }

    }
    
}







?>