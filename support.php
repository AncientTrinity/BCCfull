<?php 
include('authentication.php');
$pagetitle=" Dashboard";
include ('includes/header.php');
include ('includes/navbar.php');

?>
   <body class="bg-light">
      <!-- Support -->
      <div class="osahan-support">
         <div class="osahan-header-nav shadow-sm bg-danger p-3 d-flex align-items-center">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="home.php"><i class="icofont-rounded-left"></i></a>
               Support
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <!-- Source Support -->
         <div class="px-3 py-4">
            <p class="text-muted small">We are here to help you with any information and problems through our contact center</p>
            <div class="messenger bg-white shadow-sm p-3 d-flex align-items-center rounded-1 mb-2">
               <i class="icofont-facebook-messenger mr-3 h5 mb-0 text-danger"></i>
               <p class="mb-0 small">Click here for messenger live chat</p>
            </div>
            <div class="messenger bg-white shadow-sm p-3 d-flex align-items-center rounded-1 mb-2">
               <i class="icofont-envelope-open mr-3 h5 mb-0 text-danger"></i>
               <p class="mb-0 small">Click here to mail us</p>
            </div>
            <div class="messenger bg-white shadow-sm p-3 d-flex align-items-center rounded-1 mb-2">
               <i class="icofont-support mr-3 h5 mb-0 text-danger"></i>
               <p class="mb-0 small">Customer Care</p>
            </div>
         </div>
      </div>
        <!-- sidebar -->
        <?php include ('includes/footernav.php');?> 
      <?php include ('includes/footer.php');?> 