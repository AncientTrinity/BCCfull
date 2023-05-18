<?php 
include('authentication.php');
$pagetitle=" Bus Details";
include ('includes/header.php');
include ('includes/navbar.php');
?>
      <!-- Bus Details -->
      <div class="Bus-Details padding-bt">
         <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
            <h5 class="font-weight-normal mb-0 text-white">
               <a type="hidden" class="text-danger mr-3" href="listing.php"><i class="icofont-rounded-left"></i></a>
               Bus Details
               <?php
    // Retrieving the data from the URL parameter
    if (isset($_GET['bus'])) {
        $data = $_GET['bus'];
    }
    ?>
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <!-- Details -->
         <?php   include('includes/dbcon.php'); 
         
         $query = "SELECT b.busid, b.busnumber, b.model, b.image, b.year, b.liscenseplate, b.capacity,
                 loc1.location AS pickuploc, loc2.location AS destination,
                 t1.bus_terminal AS begin_location, t2.bus_terminal AS end_location,
                 bs.busdepart, bs.busarrival, bs.date,
                 bc.buscompname
          FROM bus AS b
          JOIN busschedule AS bs ON b.busid = bs.busid
          JOIN trip_detail AS td ON bs.busscheid = td.busschedid
          JOIN buscompanies AS bc ON b.buscompid = bc.buscompid
          JOIN locationofstop AS loc1 ON td.pickuploc = loc1.stoplocid
          JOIN locationofstop AS loc2 ON td.destination = loc2.stoplocid
          JOIN trips AS t1 ON bs.begin_locationid = t1.tripid
          JOIN trips AS t2 ON bs.end_locationid = t2.tripid
          WHERE b.busid = '$data' LIMIT 1;";
           $result = mysqli_query($con, $query);

           // Check if the query was successful
           if ($result) {
              // Loop through the rows of the result
              while ($row = mysqli_fetch_assoc($result)) {
                 // Access the data from each row
                 $busid = $row['busid'];
                 $busnumber = $row['busnumber'];
                 $model = $row['model'];
                 $image = $row['image'];
                 $year = $row['year'];
                 $liscenseplate = $row['liscenseplate'];
                 $capacity = $row['capacity'];
                 $pickuploc = $row['pickuploc'];
                 $destination = $row['destination'];
                 $begin_location = $row['begin_location'];
                 $end_location = $row['end_location'];
                 $busdepart = $row['busdepart'];
                 $busarrival = $row['busarrival'];
                 $date = $row['date'];
                 $buscompname = $row['buscompname'];
                 // Output the HTML structure with the retrieved data
                 echo '
                <div class="list_item m-0 bg-white">
                 <div class="px-3 py-3 tic-div border-bottom d-flex">
                 <img src="img/listing/item1.png" class="img-fluid border rounded p-1 shape-img mr-3">
                 <div class="w-100">
                  <h6 class="my-1 l-hght-18 font-weight-bold">'. $model .'</h6>
                 <div class="w-100">
                 
                 <div class="w-100">
                    <h6 class="my-1 l-hght-18 font-weight-bold">'.$year.'</h6>
                    <div class="start-rating f-10">
                       <i class="icofont-star text-danger"></i>
                       <i class="icofont-star text-danger"></i>
                       <i class="icofont-star text-danger"></i>
                       <i class="icofont-star text-danger"></i>
                       <i class="icofont-star text-muted"></i>
                       <span class="text-dark">4.0</span>
                       <div class="d-flex mt-2">
                          <p class="m-0"><i class="icofont-google-map mr-1 text-danger"></i><span class="small">'. $begin_location.' to '. $destination .'</span></p>
                          <p class="small ml-auto mb-0"><i class="icofont-bus mr-1 text-danger"></i> St. $5</p>
                       </div>
                    </div>
                 </div>
                 <div class="bg-white p-3">
                    <div class="row mx-0 mb-3">
                       <div class="col-6 p-0">
                          <small class="text-muted mb-1 f-10 pr-1">Cpacity</small>
                          <p class="small mb-0 l-hght-14"> '. $capacity . '</p>
                       </div>
                       <div class="col-6 p-0">
                          <small class="text-muted mb-1 f-10 pr-1">AC</small>
                          <p class="small mb-0 l-hght-14"> Ac is available</p>
                       </div>
                    </div>
                    <div class="row mx-0 mb-3">
                       <div class="col-6 p-0">
                          <small class="text-muted mb-1 f-10 pr-1">Dinner / Lunch</small>
                          <p class="small mb-0 l-hght-14"> Yes</p>
                       </div>
                       <div class="col-6 p-0">
                          <small class="text-muted mb-1 f-10 pr-1">Safety Features</small>
                          <p class="small mb-0 l-hght-14"> Sanitized</p>
                       </div>
                    </div>
                    <div class="row mx-0">
                       <div class="col-6 p-0">
                          <small class="text-muted mb-1 f-10 pr-1">Essentials</small>
                          <p class="small mb-0 l-hght-14"> Pillow, Water</p>
                       </div>
                       <div class="col-6 p-0">
                          <small class="text-muted mb-1 f-10 pr-1">Snacks</small>
                          <p class="small mb-0 l-hght-14">Juice / shake </p>
                       </div>
                    </div>
                 </div>
                 </div>
                 <ul class="nav nav-pills mb-0 nav-justified bg-white px-3 py-2 border-top border-bottom" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="icofont-info-circle"></i> Info</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="icofont-star"></i> Review</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="icofont-history"></i> Pick Up</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="bus-details pt-3 pb-0 px-3">
            <div class="info" id="info">
                <h6 class="font-weight-normal">About Niloy Poribohon</h6>
                <p class="text-muted small mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="bus-details pt-3 pb-0 px-3">
            <div class="review" id="review">
                <h6 class="font-weight-normal">Review</h6>
                <p class="mb-0"><span class="h4 mb-0">4.8</span><span class="h6">/5</span></p>
                <span class="f-10">Punctuality</span>
                <div class="review-rating row align-items-center">
                    <div class="start-rating f-8 col-3">
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                    </div>
                    <div class="progress col-7 p-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="col-2">
                        <span class="small">5.0</span>
                        </div>
                        </div>
                        <div class="review-rating row align-items-center">
                        <div class="start-rating f-8 col-3">
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-muted"></i>
                        </div>
                        <div class="progress col-7 p-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75"></div>
                        </div>
                        <div class="col-2">
                        <span class="small">4.0</span>
                        </div>
                        </div>
                        <div class="review-rating row align-items-center">
                        <div class="start-rating f-8 col-3">
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-muted"></i>
                        <i class="icofont-star text-muted"></i>
                        </div>
                        <div class="progress col-7 p-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50"></div>
                        </div>
                        <div class="col-2">
                        <span class="small">3.0</span>
                        </div>
                        </div>
                        <div class="review-rating row align-items-center">
                        <div class="start-rating f-8 col-3">
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-muted"></i>
                        <i class="icofont-star text-muted"></i>
                        <i class="icofont-star text-muted"></i>
                        </div>
                        <div class="progress col-7 p-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                        </div>
                        <div class="col-2">
                        <span class="small">2.0</span>
                        </div>
                        </div>
                        <div class="review-rating row align-items-center">
                        <div class="start-rating f-8 col-3">
                        <i class="icofont-star text-danger"></i>
                        <i class="icofont-star text-muted"></i>
                        <i class="icofont-star text-muted"></i>
                        <i class="icofont-star text-muted"></i>
                        <i class="icofont-star text-muted"></i>
                        </div>
                        <div class="progress col-7 p-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5"></div>
                        </div>
                        <div class="col-2">
                        <span class="small">1.0</span>
                        </div>
                        </div>
                 ';



                 
              }
           }
         ?>
        
      <!-- Veiw Seat Button -->
      <div class="fixed-bottom view-seatbt p-3">
         <a href="select-seat.php" class="btn btn-danger btn-block osahanbus-btn rounded-1">Book Your Seats Now</a>
      </div>
     
      
      <!-- sidebar -->

      <?php include ('includes/footer.php');?> 