<?php
 include 'session.php';
 ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark  fixed-top" id="ftco-navbar">
        <div class="container">
            <a href="home.php" class="navbar-brand">Cake Studio</a>

            <div class="collpase navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="home.php#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="home.php#gallery" class="nav-link">Gallery</a></li>
                    <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="home.php#testimonial" class="nav-link">Testimonials</a></li>
                    <!-- <li class="nav-item cta"><a href="profile.php" class="nav-link">Profile</a></li> -->
                    <!-- <li class="nav-item cta"><a href="logout.php" class="nav-link">Log Out</a></li> -->

                    <div class="dropdown">
                    <span class="nav-item" style="color: white; "><center><img src="user_i/user.svg" alt="""></center>
                    <span class="nav-item"> Profile</span></span>
                    <div class="dropdown-content">
                    <a class="dropdown-item" href="#">Welcome <?php echo  $_SESSION['user']; ?> </a>
                    <div class="dropdown-divider"></div>

                    <a href="profile.php"><img src="user_i/user_black.svg" alt=""">Profile</a>
                    <a href="view_order.php"><img src="user_i/bag.svg" alt=""">View Orders</a>
                    <a href="cart.php"><img src="user_i/cart.svg" alt=""">Cart </a>
                    <center><a href="logout.php" class="btn btn-danger lgadj">Log Out</a></center>
                    </div>
                    </div>

                </ul>
            </div>   
        </div>
    </nav>
    <style>
        .lgadj{
            color: white !important;
            border-radius: 0px !important;
        }
        .lgadj:hover{
            background-color: #c82333 !important ; 
            border-color: #bd2130 !important;
        }
    </style>