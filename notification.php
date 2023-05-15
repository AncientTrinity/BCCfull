<?php 
include('authentication.php');
$pagetitle=" Notifications";
include ('includes/header.php');
include ('includes/navbar.php');

?>
      <!-- Notification -->
      <div class="osahan-notification padding-bt">
         <div class="osahan-header-nav shadow-sm bg-danger p-3 d-flex align-items-center">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="home.php"><i class="icofont-rounded-left"></i></a>
               Notification
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a href="#" class="text-white mr-3">Clear</a>
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <!-- Day & Time -->
         <div class="osahan-notification">
            <!-- Notification Item -->
            <div class="notification d-flex m-0 bg-white border-bottom p-3">
               <div class="icon pr-3">
                  <span class="icofont-check-alt bg-success text-white mb-0 rounded-pill"></span>
               </div>
               <div class="noti-details l-hght-18 pr-0">
                  <p class="mb-1">Confirm your ticket</p>
                  <span class="small text-muted">Confirm your ticket dolor sit ame nsectetuer adipisicing elit sed</span>
               </div>
               <div class="f-10 px-0 text-right">
                  <span>10:14.AM</span>
               </div>
            </div>
            <!-- Notification Item -->
            <div class="notification d-flex m-0 bg-white border-bottom p-3">
               <div class="icon pr-3">
                  <span class="percentage bg-primary text-white mb-0 rounded-pill p-1">%</span>
               </div>
               <div class="noti-details l-hght-18 pr-0">
                  <p class="mb-1">Today Discount</p>
                  <span class="small text-muted">Hot Discount for today uer adipisicing wisted cllege</span>
               </div>
               <div class="f-10 px-0 text-right">
                  <span>12:00.PM</span>
               </div>
            </div>
            <!-- Notification Item -->
            <div class="notification d-flex m-0 bg-white border-bottom p-3">
               <div class="icon pr-3">
                  <span class="icofont-gift bg-warning text-dark mb-0 rounded-pill"></span>
               </div>
               <div class="noti-details l-hght-18 pr-0">
                  <p class="mb-1">Confirm your ticket</p>
                  <span class="small text-muted">Confirm your ticket dolor sit ame nsectetuer adipisicing elit sed</span>
               </div>
               <div class="f-10 px-0 text-right">
                  <span>03:20.PM</span>
               </div>
            </div>
            <!-- Notification Item -->
            <div class="notification d-flex m-0 bg-white border-bottom p-3">
               <div class="icon pr-3">
                  <span class="icofont-check-alt bg-success text-white mb-0 rounded-pill"></span>
               </div>
               <div class="noti-details l-hght-18 pr-0">
                  <p class="mb-1">Confirm your ticket</p>
                  <span class="small text-muted">Confirm your ticket dolor sit ame nsectetuer adipisicing elit sed</span>
               </div>
               <div class="f-10 px-0 text-right">
                  <span>01:11.AM</span>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer Fixed -->
      <div class="fixed-bottom p-3">
         <div class="footer-menu row m-0 bg-danger shadow rounded-2">
            <div class="col-3 p-0 text-center">
               <a href="home.html" class="home text-white">
                  <span class="icofont-ui-home h5"></span>
                  <p class="mb-0 small">Home</p>
               </a>
            </div>
            <div class="col-3 p-0 text-center">
               <a href="my-ticket.html" class="home text-white">
                  <span class="icofont-ticket h5"></span>
                  <p class="mb-0 small">My Tickets</p>
               </a>
            </div>
            <div class="col-3 p-0 text-center">
               <a href="notification.html" class="home text-white active">
                  <span class="icofont-notification h5"></span>
                  <p class="mb-0 small">Notice</p>
               </a>
            </div>
            <div class="col-3 p-0 text-center">
               <a href="profile.html" class="home text-white">
                  <span class="icofont-user h5"></span>
                  <p class="mb-0 small">Account</p>
               </a>
            </div>
         </div>
      </div>
       <!-- sidebar -->
       <?php include ('includes/footernav.php');?> 
      <?php include ('includes/footer.php');?>     