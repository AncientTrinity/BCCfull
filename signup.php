<?php 
session_start();

if (isset($_SESSION['authenticated'])){
    $_SESSION['status']= "please login to user dashboard auth php";
    header('location:home.php'); 
    exit(0);
}
$pagetitle=" Hompage";
include ('includes/header.php');
?>
       <?php
                     if(isset($_SESSION['status']))
                     {
                        ?>
                        <div class="alert alert-success" role="alert">
                          <h4><?=$_SESSION['status']; ?></h4>;
                        </div>
                        <?php
                        unset($_SESSION['status']);
                     }
                    ?>
      <!-- sign up -->
      <div class="osahan-signup">
         <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="get-started.php"><i class="icofont-rounded-left"></i></a>
               Create an account
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"></a>
            </div>
         </div>
         <div class="p-3">
         <form action="code.php" method="post">
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">First name</label>
                  <input type="text" class="form-control" name="fname"  placeholder="Enter First Name">
               </div>
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Lastname</label>
                  <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
               </div>
               <div class="form-group mb-3">
                        <label class="text-muted f-10 mb-1">Email address</label>
                        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Password</label>
                  <input type="text" class="form-control" name="password" placeholder="Password">
               </div>
               <button type="submit" name="register_btn" class="btn btn-danger btn-block osahanbus-btn mb-3 rounded-1 mt-4">CREATE AN ACCOUNT</button>
               <p class="text-muted text-center small">By signing up you agree to our Privacy Policy and Terms.</p>
            </form>
            <div class="sign-or d-flex align-items-center justify-content-center mb-4">
               <hr class="mr-4">
               <p class="text-muted text-center py-2 m-0">OR</p>
               <hr class="ml-4">
            </div>
            <a href="verification.html" class="btn btn-block rounded-1 google-btn osahanbus-social">
            <i class="icofont-google-plus"></i> LOGIN WITH GOOGLE
            </a>
            <a href="verification.html" class="my-3 btn btn-block rounded-1 fb-btn osahanbus-social">
            <i class="icofont-facebook"></i> LOGIN WITH FACEBOOK
            </a>
         </div>
      </div>