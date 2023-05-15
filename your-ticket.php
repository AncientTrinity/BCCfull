<?php 
include('authentication.php');
$pagetitle=" Dashboard";
include ('includes/header.php');
include ('includes/navbar.php');

?>
      <!-- Ticket -->
      <div class="ticket padding-bt">
         <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="select-seat.php"><i class="icofont-rounded-left"></i></a>
               Ticket
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <!-- You Ticket -->
         <div class="your-ticket p-3">
            <h5 class="mb-3 font-weight-bold text-dark">MANDI Travellers ISO 9002- 2009 Certified</h5>
            <p class="text-success mb-3 font-weight-bold">COMPLETED</p>
            <div class="bg-white border border-warning rounded-1 shadow-sm p-3 mb-3">
               <div class="row mx-0 mb-3">
                  <div class="col-6 p-0">
                     <small class="text-muted mb-1 f-10 pr-1">GOING FROM</small>
                     <p class="small mb-0 l-hght-14"> LUDHIANA</p>
                  </div>
                  <div class="col-6 p-0">
                     <small class="text-muted mb-1 f-10 pr-1">GOING TO</small>
                     <p class="small mb-0 l-hght-14"> GOA</p>
                  </div>
               </div>
               <div class="row mx-0">
                  <div class="col-6 p-0">
                     <small class="text-muted mb-1 f-10 pr-1">DATE OF JOURNEY</small>
                     <p class="small mb-0 l-hght-14"> 05 May, 2022</p>
                  </div>
                  <div class="col-6 p-0">
                     <small class="text-muted mb-1 f-10 pr-1">YOU RATED</small>
                     <p class="small mb-0 l-hght-14"><span class="icofont-star text-warning"></span> 3.5</p>
                  </div>
               </div>
            </div>
            <div class="bg-white rounded-1 shadow-sm p-3 mb-3 w-100">
               <div class="row mx-0">
                  <div class="col-12 p-0 mb-3">
                     <small class="text-danger mb-1 f-10 pr-1">PICKUP FROM</small>
                     <p class="small mb-0 l-hght-14"> Model Towm, Ludhiana - 8:15 PM</p>
                  </div>
                  <div class="col-12 p-0">
                     <small class="text-danger mb-1 f-10 pr-1">DROPPING AT</small>
                     <p class="small mb-0 l-hght-14">Goa Mall Road - 7: 00 AM</p>
                  </div>
               </div>
            </div>
            <div class="list_item d-flex col-12 m-0 p-3 bg-white shadow-sm rounded-1 shadow-sm mb-3">
               <div class="d-flex mb-auto">
                  <span class="icofont-location-pin h4"></span>
               </div>
               <div class="d-flex w-100">
                  <div class="bus_details w-100 pl-3">
                     <p class="mb-2 l-hght-18 font-weight-bold">View Boarding Location on Map</p>
                     <div class="d-flex align-items-center mt-2">
                        <small class="text-muted mb-0 pr-1">Akshya Nagar 1st Block 1st Cross, Rammurthy<br>Nagar, Bangalore <br>560016
                        </small>
                     </div>
                  </div>
               </div>
            </div>
            <div class="list_item d-flex col-12 m-0 p-3 bg-white shadow-sm rounded-1 shadow-sm">
               <div class="d-flex mb-auto">
                  <img src="img/qr-code.png" class="img-fluid osahan-qr">
               </div>
               <div class="d-flex w-100">
                  <div class="bus_details w-100 pl-3">
                     <p class="mb-2 l-hght-18 font-weight-bold">More info.</p>
                     <div class="l-hght-10 d-flex align-items-center my-2">
                        <small class="text-muted mb-0 pr-1">Passenger</small>
                        <p class="small mb-0 ml-auto l-hght-14"> Joan Rase</p>
                     </div>
                     <div class="l-hght-10 d-flex align-items-center my-2">
                        <small class="text-muted mb-0 pr-1">Ticket Number</small>
                        <p class="small mb-0 ml-auto l-hght-14"> 1313</p>
                     </div>
                     <div class="l-hght-10 d-flex align-items-center my-2">
                        <small class="text-muted mb-0 pr-1">PNR Number</small>
                        <p class="small mb-0 ml-auto l-hght-14"> 56276-32324</p>
                     </div>
                     <div class="l-hght-10 d-flex align-items-center mt-3">
                        <p class="mb-0 pr-1 font-weight-bold">Amount Paid</p>
                        <p class="mb-0 ml-auto l-hght-14 text-danger font-weight-bold">$700</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Download Ticket -->
      <div class="fixed-bottom p-3">
         <div class="footer-menu row m-0 px-1 bg-white shadow rounded-2">
            <div class="col-4 p-0 text-center">
               <a href="profile.php" class="home text-danger py-3">
                  <span class="icofont-file-pdf h5"></span>
                  <p class="mb-0 small">Download Pdf</p>
               </a>
            </div>
            <div class="col-4 p-0 text-center">
               <a href="profile.php" class="home text-danger">
                  <span class="icofont-dropbox h5"></span>
                  <p class="mb-0 small">Dropbox Drive</p>
               </a>
            </div>
            <div class="col-4 p-0 text-center">
               <a href="profile.php" class="home text-danger">
                  <span class="icofont-share h5"></span>
                  <p class="mb-0 small">Share Ticket</p>
               </a>
            </div>
         </div>
      </div>
          <!-- sidebar -->
      <?php include ('includes/footer.php');?> 