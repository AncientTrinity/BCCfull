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
            <form action="http://view.jqueryfuns.com/2021/7/14/10770e63bb166c1f4ed93fd82ffc72c1/profile.php">
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
                        <label class="text-muted f-10 mb-1">User Name</label>
                        <input type="number" class="form-control" placeholder="Enter User Name"  value="osahantech">
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">Mobile Number</label>
                        <input type="number" class="form-control" placeholder="Enter Mobile Number"  value="1234567890">
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">Your Email</label>
                        <input type="email" class="form-control" placeholder="Enter Your Email"  value="example@mail.com">
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">City</label>
                        <input type="number" class="form-control" placeholder="Enter City"  value="Ludh.">
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">State</label>
                        <input type="number" class="form-control" placeholder="Enter State"  value="Pun.">
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">Address</label>
                        <textarea class="form-control" placeholder="Enter Address">House #675, Sector #12, Road #20 Dhaka-123001</textarea>
                     </div>
                     <div class="form-group">
                        <label class="text-muted f-10 mb-1">Life Insurance</label>
                        <div class="mt-1">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="yes" name="lifeinsurance" class="custom-control-input" checked>
                              <label class="custom-control-label small" for="yes">Yes</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="no" name="lifeinsurance" class="custom-control-input">
                              <label class="custom-control-label small" for="no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="mb-5">
                        <a href="home.php" class="btn btn-danger btn-block osahanbus-btn rounded-1">UPDATE PROFILE</a>
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