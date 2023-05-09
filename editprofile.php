<?php 
include('authentication.php');
$pagetitle=" Edit Profile";
include ('includes/header.php');
include ('includes/navbar.php');
?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                <div class="card shadow">
                    <div class ="card-header">
                        <h5>Registration Form</h5>
                </div>
                <div class="card-body">
                <form action="editcode.php" method="post">
                <div class="form-group mb-3">
                        <label for="">First name </label>
                        <input type="text" class="form-control" name="fname" aria-describedby="emailHelp" placeholder="Enter First Name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Last name </label>
                        <input type="text" class="form-control" name="lname" aria-describedby="emailHelp" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address:">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" placeholder="Phone #:">
                    </div>
                    <div class ="form-group">
                        <button type="submit" name="update_btn" class="btn btn-primary">Update Profile</button>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </div> 
</div>

<?php include ('includes/footer.php');?> 