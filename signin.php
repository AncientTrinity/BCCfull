<?php 
session_start();

if (isset($_SESSION['authenticated'])){
    $_SESSION['status']= "please login to user dashboard auth php";
    header('location:home.php'); 
    exit(0);
}
$pagetitle=" Signin";
include ('includes/header.php');
?>
<?php
                     if(isset($_SESSION['status']))
                     {
                        ?>
                        <div class="alert alert-success">
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
               Sign in to your account
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"></a>
            </div>
         </div>
         <div class="px-3 pt-3 pb-5">
          <form action="logincode.php" method="post">
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Your Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Your Email"  >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
               </div>
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Your Password"  >
               </div>
               
               </div >
               <div class ="form-group">
               <button type="submit" name="login_btn" class="btn btn-danger btn-block osahanbus-btn mb-4 rounded-1">SIGN IN</button>
               </div>
            </form>
            <hr>
            <div class="row">
               <div class="col"></div>
               <div class="col"><a href="change-password.php" class="text-muted small">Forgot your password?</a></div>
               <div class="col"></div>
               <div class="col"><a href="resend-verif-email.php" class="text-muted small">Resend Verification Email?</a></div>
            </div>
            </hr>
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
            <div class="osahan-signin text-center p-1">
               <p class="m-0">Not a member ? <a href="signup.php" class="text-danger ml-2">Sign Up</a></p>
            </div>
         </div>
      </div>