<?php 
include('authentication.php');
$pagetitle=" Dashboard";
include ('includes/header.php');
include ('includes/navbar.php');

?>
      <!-- Profile -->
      <div class="osahan-profile">
         <div class="osahan-header-nav shadow-sm bg-danger p-3 d-flex align-items-center">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="home.php"><i class="icofont-rounded-left"></i></a>
               My Profile
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <!-- Profile -->
         <div class="px-3 pt-3 pb-5">
         <form action="editcode.php" method="post">
               <div class="d-flex justify-content-center rounded-2 mb-4">
                  <div class="form-profile w-100">
                     <div class="text-center mb-3 position-relative">
                        <div class="position-absolute edit-bt">
                           <label for="upload-photo" class="mb-0"><span class="icofont-pencil-alt-5 text-white"></span></label>
                           <input type="file" name="photo" id="upload-photo" />
                        </div>
                        <img src="img/profile.jpg" class="rounded-pill">
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">First Name</label>
                        <input type="text" class="form-control" name="fname"  placeholder =<?php echo $_SESSION['auth_user']['fname'];?>>
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder =<?php echo $_SESSION['auth_user']['lname'];?>>
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">Your New Address</label>
                        <input type="text" class="form-control" name="address" placeholder =<?php echo $_SESSION['auth_user']['address'];?>>
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" placeholder =<?php echo $_SESSION['auth_user']['phonenumber'];?>>
                     </div>
                     <div class="mb-5">
                        <button type="submit" name="update_btn" class="btn btn-danger btn-block osahanbus-btn rounded-1">UPDATE PROFILE</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="fixed-bottom p-3">
         <div class="footer-menu row m-0 bg-danger shadow rounded-2">
            <div class="col-3 p-0 text-center">
               <a href="home.php" class="home text-white">
                  <span class="icofont-ui-home h5"></span>
                  <p class="mb-0 small">Home</p>
               </a>
            </div>
            <div class="col-3 p-0 text-center">
               <a href="my-ticket.php" class="home text-white">
                  <span class="icofont-ticket h5"></span>
                  <p class="mb-0 small">My Tickets</p>
               </a>
            </div>
            <div class="col-3 p-0 text-center">
               <a href="notification.php" class="home text-white">
                  <span class="icofont-notification h5"></span>
                  <small class="osahan-n">4</small>
                  <p class="mb-0 small">Notice</p>
               </a>
            </div>
            <div class="col-3 p-0 text-center">
               <a href="profile.php" class="home text-white active">
                  <span class="icofont-user h5"></span>
                  <p class="mb-0 small">Account</p>
               </a>
            </div>
         </div>
      </div>
        <!-- sidebar -->
        <?php include ('includes/footernav.php');?> 
      <?php include ('includes/footer.php');?>   