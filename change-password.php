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
      <!-- Change Password -->
      <div class="osahan-giftcard">
         <div class="osahan-header-nav bg-danger p-3 d-flex align-items-center">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="home.html"><i class="icofont-rounded-left"></i></a>
               Change Password
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <div class="px-3 py-4">
         <form action="resetpass.php" method="post">
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
               </div>
               <button type="submit" name="password_reset_link"class="btn btn-danger btn-block osahanbus-btn rounded-1 mt-4">Send Email</button>
            </form>
         </div>
      </div>
   