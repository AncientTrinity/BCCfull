<?php
session_start();
include ('includes/dbcon.php');


if (isset($_POST['login_btn']))
{
    if(!empty(trim($_POST['email'])) &&(!empty(trim($_POST['password'])))){
        $email= mysqli_real_escape_string($con,$_POST['email'] );
        $password= mysqli_real_escape_string($con,$_POST['password'] );

        $login_query= "SELECT *  FROM userinfo WHERE email ='$email' AND password='$password' LIMIT 1";
        $login_query_run= mysqli_query($con,$login_query);

        if(mysqli_num_rows($login_query_run)>0)
        {
            $row= mysqli_fetch_array($login_query_run);
            //echo $rowp['verify status'];

            if ($row['verify_status']==1)
            {
                $_SESSION['authenticated'] = TRUE;
                $_SESSION['auth_user']=[
                    'userid'=>$row['userid'],
                    'fname'=> $row ['fname'],
                    'email'=> $row ['email'],
                ];

                $_SESSION['status']= "You Are Logged in Succesfully";
                header("location:home.php"); 
                exit(0);
            }
            else{
                $_SESSION['status']= "Please Verify your email address to login 32";
                header("location:signin.php"); 
                exit(0);
            }


        } else 
        {
            $_SESSION['status']= "Invalid Email Or Password";
            header("location:signin.php"); 
            exit(0);
        }
    }else{
        $_SESSION['status']= "ALL FEILDS ARE MADATORY";
        header("location:signin.php"); 
        exit(0);
    }
 
}


?>