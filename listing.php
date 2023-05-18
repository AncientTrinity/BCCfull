<?php
include('authentication.php');
$pagetitle = " Listings";
include('includes/header.php');
include('includes/navbar.php');
include('includes/dbcon.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $pickup = $_POST["pickup"];
   $dropoff = $_POST["dropoff"];
   $date = $_POST["date"];
}

?>
<!-- Listing Page -->
<div class="osahan-listing">
   <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
      <h5 class="font-weight-normal mb-0 text-white">
         <a class="text-danger" href="home.php"><i class="icofont-rounded-left"></i></a>
      </h5>
      <div class="ml-auto d-flex align-items-center">
         <a href="home.php" class="text-white h6 mb-0"><i class="icofont-search-1"></i></a>
         <a href="#" class="mx-4 text-white h6 mb-0" data-toggle="modal" data-target="#filterModal"><i class="icofont-filter"></i></a>
         <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
      </div>
   </div>
   <div class="osahan-listing p-0 m-0 row border-top">
      <div class="p-2 border-bottom w-100">
         <div class="bg-white border border-warning rounded-1 shadow-sm p-2">
            <div class="row mx-0 px-1">
               <div class="col-6 p-0">
                  <small class="text-muted mb-1 f-10 pr-1">GOING FROM</small>
                  <p class="small mb-0">
                     <?php
                     echo $pickup;
                     ?></p>
               </div>
               <div class="col-6 p-0">
                  <small class="text-muted mb-1 f-10 pr-1">GOING TO</small>
                  <p class="small mb-0">
                     <?php
                     echo $dropoff;
                     ?>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <!-- List Item -->
      <?php
      include('includes/dbcon.php');
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
          WHERE loc1.location = '$pickup' AND loc2.location = '$dropoff' AND bs.date = '$date' ;";

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
            echo '<div class="list_item_gird m-0 bg-white shadow-sm listing-item border-bottom">';
            echo '<div class="px-3 pt-3 tic-div">';
            echo '<div class="list-item-img">';
            echo '<img src="img/listing/item1.png" class="img-fluid">';
            echo '</div>';
            echo '<p class="mb-0 l-hght-10">' . $model . ', '.$year.'</p>';
            echo '<p class="mb-0 l-hght-10">' .'Liscenseplate: '. $liscenseplate . '</p>';
            echo '<span class="text-danger small">' .$pickup.' to '. $destination . '</span>';
            echo '<div class="start-rating small">';
            echo '<span class="text-dark">' .'Capacity: '. $capacity . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="p-3 d-flex">';
            echo '<div class="bus_details w-100">';
            echo '<div class="d-flex">';
            echo '<p><i class="icofont-wind mr-2 text-danger"></i><span class="small">AC</span></p>';
            echo '<p class="small ml-auto"><i class="icofont-bus mr-2 text-danger"></i>2/1</p>';
            echo '</div>';
            echo '<div class="d-flex l-hght-10">';
            echo '<span class="icofont-clock-time small mr-2 text-danger"></span>';
            echo '<div>';
            echo '<small class="text-muted mb-2 d-block">Journey Start</small>';
            echo '<p class="small">' . $date . ', ' . $busdepart . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="d-flex l-hght-10">';
            echo '<span class="icofont-google-map small mr-2 text-danger"></span>';
            echo '<div>';
            echo '<small class="text-muted mb-2 d-block">From - To</small>';
            echo '<p class="small mb-1">' . $begin_location.' to '.$end_location .'</p>';
            $link = "bus-details.php?bus=" . urlencode($busid) ;
            echo "<a href='$link'>Bus Details</a>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

         }
      }
      ?>
   </div>
</div>
<!-- Filter Modal -->
<div class="modal fade" id="filterModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog m-0">
      <div class="modal-content modal-content rounded-0 border-0 vh-100">
         <form>
            <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
               <h5 class="font-weight-normal mb-0 text-white">
                  <a data-dismiss="modal" aria-label="Close" class="text-danger"><i class="icofont-rounded-left mr-3"></i></a>
                  Filter By
               </h5>
               <div class="ml-auto d-flex align-items-center">
                  <a href="#" class="text-white mr-3">Clear all</a>
                  <a class="toggle osahan-toggle h4 m-0 text-white ml-auto hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1"><i class="icofont-navigation-menu"></i></a>
               </div>
            </div>
            <div class="modal-body p-3">
               <div class="mb-4">
                  <div class="d-flex">
                     <p class="mb-2 text-dark font-weight-bold">Choose Class</p>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="customRadioclass1" name="customRadioclass1" class="custom-control-input">
                     <label class="custom-control-label small" for="customRadioclass1">AC</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="customRadioclass2" name="customRadioclass1" class="custom-control-input">
                     <label class="custom-control-label small" for="customRadioclass2">Non AC</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="customRadioclass3" name="customRadioclass1" class="custom-control-input">
                     <label class="custom-control-label small" for="customRadioclass3">Business</label>
                  </div>
               </div>
               <div class="mb-4">
                  <p class="mb-2 text-dark font-weight-bold">Choose Price</p>
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="customRadioprice1" name="customRadioprice1" class="custom-control-input">
                     <label class="custom-control-label small" for="customRadioprice1">$100 - $200</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="customRadioprice2" name="customRadioprice1" class="custom-control-input">
                     <label class="custom-control-label small" for="customRadioprice2">$300 - $400</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="customRadioprice3" name="customRadioprice1" class="custom-control-input">
                     <label class="custom-control-label small" for="customRadioprice3">$600 - $800</label>
                  </div>
               </div>
               <div class="mb-4">
                  <p class="mb-2 text-dark font-weight-bold">Choose Bus Service</p>
                  <div class="btn-group btn-group-toggle d-block" data-toggle="buttons">
                     <label class="btn btn-chkftr btn-danger small btn-sm rounded mr-2 mb-2">
                        <input type="checkbox" name="options" autocomplete="off"> Niloy Poribohon
                     </label>
                     <label class="btn btn-chkftr btn-danger small btn-sm rounded mr-2 mb-2">
                        <input type="checkbox" name="options" autocomplete="off"> Green Wheel
                     </label>
                     <label class="btn btn-chkftr btn-danger small btn-sm rounded mr-2 mb-2">
                        <input type="checkbox" name="options" autocomplete="off"> Parboti Bus
                     </label>
                     <label class="btn btn-chkftr btn-danger small btn-sm rounded mr-2 mb-2">
                        <input type="checkbox" name="options" autocomplete="off"> Night Way
                     </label>
                  </div>
               </div>
            </div>
            <div class="modal-footer border-0 fixed-bottom">
               <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger btn-block osahanbus-btn py-3">APPLY FILTER</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- sidebar -->
<?php include('includes/footer.php'); ?>