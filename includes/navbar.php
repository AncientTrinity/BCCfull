
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="login.php">Belize Bus Companion </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button></button>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item dropdown">
                <li class= "nav-item">
                <?php if(isset ($_SESSION['authenticated'])):?>
                    <a class="nav-link " href="dashboard.php">My Dashboard</a>
                <li class= "nav-item">
                    <a class="nav-link " href="index.php">Tickets</a>
                    <?php endif?>
                </li>
              
                <?php if(!isset ($_SESSION['authenticated'])):?>
                <li class= "nav-item">
                    <a class="nav-link " href="index.php">Homepage </a>
                <li class= "nav-item">
                    <a class="nav-link " href="register.php">Register</a>
                <li class= "nav-item">
                    <a class="nav-link " href="login.php">login</a>
            <?php endif?>

                </li>
                <?php if(isset ($_SESSION['authenticated'])):?>
                    <button type="button" class="btn btn-danger dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="20" height="20" class="rounded-circle"> <?=$_SESSION['auth_user']['fname']?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="logout.php">logout</a></li>
                        <li><a class="dropdown-item" href="editprofile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="#">View Travel History</a></li>
                        <li><a class="dropdown-item" href="#">View Payment History</a></li>
                    </ul>
                </li>
                    </ul>
                <?php endif?> 
            </div>
            </div>
        </nav>