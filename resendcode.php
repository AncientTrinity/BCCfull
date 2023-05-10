<?php
session_start();
include ('includes/dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function  resend_email_verify($fname,$email,$verify_token)
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
    $mail->Subject = "Resend-Verify your email Address";
    $mail->Body    = "
    <h5>Please Verify your Email with the Link Below</h5>
    <br></br>
    <a href='http://localhost/bcc2/verify-email.php?token=$verify_token'>click me</a>
    ";
    $mail->send();
}

if (isset($_POST['resend_email_btn']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email= mysqli_real_escape_string($con,$_POST['email']);


        $checkemail_query="SELECT * FROM userinfo WHERE email='$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($con,$checkemail_query);

        if(mysqli_num_rows($checkemail_query_run)>0)
        {

            $row= mysqli_fetch_array($checkemail_query_run);
            if ($row['verify_status']==0)
            {
                $fname=$row['fname'];
                $email=$row['email'];
                $verify_token=$row['verify_token'];

            resend_email_verify($fname, $email,$verify_token);
            $_SESSION['status']= "Verification Email Link was sent to your email address";
            header("location:signin.php"); 
            exit(0);
            }
            else{
                $_SESSION['status']= "Email Has already been Verified";
                header("location:resend-verif-email.php"); 
                exit(0);
            }

        }
        else
        {
            $_SESSION['status']= "Email Was not Registered Please Register Now!";
            header("location:signup.php"); 
            exit(0);

        }
    }
    else{
        $_SESSION['status']= "Please Enter a Email Feild";
        header("location:resend-verif-email.php"); 
        exit(0);
    }

}

?>