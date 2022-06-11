<?php
include("connection.php");
include("session.php");
 ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark  fixed-top" id="ftco-navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand">Cake Studio</a>

            <div class="collpase navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="index.php#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="index.php#gallery" class="nav-link">Gallery</a></li>
                    <li class="nav-item"><a href="menu1.php" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="index.php#testimonial" class="nav-link">Testimonials</a></li>
                    <li class="nav-item cta"><a href="login.php" class="nav-link">Log In</a></li>
                    <div class="dropdown">
                    <button class="dropbtn">Categories</button>
                    <div class="dropdown-content">
                    <a href="menu1.php">All</a>
                    <?php
                        $select = "select  * from category_master";
                        $res = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <a href="menu1.php?cat=<?php echo $row['cid'] ?>"><?php echo $row['c_name'] ?></a>
                    <?php
                        }
                    ?>
                    </div>
                    </div>
                   
                </ul>
            </div>
        </div>
    </nav>