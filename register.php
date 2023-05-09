<?php 
session_start();
if (isset($_SESSION['authenticated'])){
    $_SESSION['status']= "You are already login";
    header('location:dashboard.php'); 
    exit(0);
}
$pagetitle=" Register";

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
                <form action="code.php" method="post">
                <div class="form-group mb-3">
                        <label for="">First name </label>
                        <input type="text" class="form-control" name="fname" aria-describedby="emailHelp" placeholder="Enter First Name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Last name </label>
                        <input type="text" class="form-control" name="lname" aria-describedby="emailHelp" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email address</label>
                        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class ="form-group">
                        <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </div> 
</div>

