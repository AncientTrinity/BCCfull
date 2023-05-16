<?php 
session_start();
$pagetitle=" password reset";
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
            <form action="resetpass.php" method="POST">
            <input type="hidden" value="<?php if(isset($_GET['token'])) {echo $_GET['token'];}?>">
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Email</label>
                  <input type="email"  name="email"class="form-control" placeholder="Enter Your Password" value="<?php if(isset($_GET['email'])) {echo $_GET['email'];}?>">
               </div>
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">New Password</label>
                  <input type="password" name="new_password"class="form-control" placeholder="Enter Your Password"  >
               </div>
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" placeholder="Enter Your Password"  >
               </div>
               <button type="submit" name="password_update" class="btn btn-danger btn-block osahanbus-btn rounded-1 mt-4">CHANGE PASSWORD</button>
            </form>
         </div>
      </div>
     