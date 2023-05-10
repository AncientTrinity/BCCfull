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
          <form action="resendcode.php" method="post">
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Your Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Your Email"  >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
               </div >
               <div class ="form-group">
               <button type="submit" name="resend_email_btn" class="btn btn-danger btn-block osahanbus-btn mb-4 rounded-1">RESEND VERIFICATION EMAIL</button>
               </div>
            </form>
         </div>
      </div>