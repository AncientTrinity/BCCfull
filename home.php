<?php 
include('authentication.php');
$pagetitle=" Dashboard";
include ('includes/header.php');
include ('includes/navbar.php');

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
      <!-- verification -->
      <div class="osahan-verification padding-bt">
         <div class="p-3 shadow bg-danger danger-nav osahan-home-header">
            <div class="font-weight-normal mb-0 d-flex align-items-center">
               <img src="img/logo.png" class="img-fluid osahan-nav-logo">
               <div class="ml-auto d-flex align-items-center">
                  <a href="profile.php" class="mr-3"><img src="img/user1.jpg" class="img-fluid rounded-circle"></a>
                  <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
               </div>
            </div>
         </div>
         <div class="bg-danger px-3 pb-3">
            <div class="bg-white rounded-1 p-3">
            <form action="listing.php" method="POST">
            <div class="form-group border-bottom pb-2">
               <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-search-map text-danger"></span> From</label><br>
               <select class="js-example-basic-single form-control" name="pickup">
                  <?php
                  // Assuming you have a database connection
                  include('includes/dbcon.php');
                  $query = "SELECT `stoplocid`,`location` FROM `locationofstop`";
                  $result = $con->query($query);

                  $options = array();
                  // Add an empty first option
                  echo "<option value=''></option>";
                  // Fetch the options from the result set
                  if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        $options[] = $row;
                     }
                  }
                  // Loop through the options and generate <option> tags
                  foreach ($options as $option) {
                     echo "<option value='" . $option['location'] . "'>" . $option['location'] . "</option>";
                  } ?>
               </select>
            </div>
            <div class="form-group border-bottom pb-2">
               <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-google-map text-danger"></span> To</label><br>
               <select class="js-example-basic-single form-control" name="dropoff">
                  <?php
                  // Assuming you have a database connection
                  include('includes/dbcon.php');
                  $query = "SELECT `stoplocid`,`location` FROM `locationofstop`";
                  $result = $con->query($query);

                  $options = array();
                  // Add an empty first option
                  echo "<option value=''></option>";
                  // Fetch the options from the result set
                  if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        $options[] = $row;
                     }
                  }
                  // Loop through the options and generate <option> tags
                  foreach ($options as $option) {
                     echo "<option value='" . $option['location'] . "'>" . $option['location'] . "</option>";
                  } ?>
               </select>
            </div>
            <div class="form-group border-bottom pb-1">
               <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-ui-calendar text-danger"></span> Date</label><br>
               <input name="date" id="date-input" class="form-control border-0 p-0" type="date">

               <script>
                  var dateInput = document.getElementById('date-input');

                  dateInput.addEventListener('change', function() {
                     var selectedDate = dateInput.value;
                     var parts = selectedDate.split('-');
                     var year = parts[0];
                     var month = parts[2];
                     var day = parts[1];
                     var formattedDate = year + '-' + day + '-' + month;
                     dateInput.value = formattedDate;
                  });
               </script>

            </div>
            <button type="submit" class="btn btn-danger btn-block osahanbus-btn rounded-1">Search</button>
         </form>
            </div>
         </div>
         <div class="p-3 bg-warning">
            <div class="row m-0">
               <div class="col-6 py-1 pr-1 pl-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/safe-vehicles.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Safe and Hygenic<br>Vehicles</p>
                  </div>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/customer-support.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Best Customer<br>Support</p>
                  </div>
               </div>
               <div class="col-6 py-1 pr-1 pl-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/live-tracking.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Live Track your<br>Journey</p>
                  </div>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/verified-drivers.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Verified Drivers<br>and Vehicles</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="p-3">
            <h6 class="text-center">Bus Discounts For You</h6>
            <div class="row m-0">
               <div class="col-6 py-1 pr-1 pl-0">
                  <a href="listing.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer1.jpg" alt="">
                  </a>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <a href="listing.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer2.jpg" alt="">
                  </a>
               </div>
               <div class="col-6 py-1 pr-1 pl-0">
                  <a href="listing.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer3.jpg" alt="">
                  </a>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <a href="listing.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer4.jpg" alt="">
                  </a>
               </div>
            </div>
         </div>
      </div>

      <!-- sidebar -->
      <?php include ('includes/footernav.php');?> 
      <?php include ('includes/footer.php');?> 