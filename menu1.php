<?php
include("connection.php");
include("session.php");

// $sel= "select * from category_wise_entry where cw_id='cat'";
// $result = mysqli_query($conn,$sel);
// if(mysqli_num_rows($result) > 0){

// }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/fontAwesome.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">

<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">
<link rel="stylesheet" href="stylem.css">
<link rel="stylesheet" href="css/drop_style.css">
<?php 
// include("link.php");
?>
<title>Menu</title>
</head>
<body>
<?php 
include("m_header_nl.php");
?>
      <!-- menu section starts -->
    <section class="ftco-section" >
        <div class="container-fluid px-4" style="margin-top: 30px;">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Specialities</span>
                    <h2 class="mb-4">Our Menu</h2>
                </div>
            </div>

            <div class="container">
            <div class="row">
                
                <!---------------------------------- Category part -------------------------------------------------------------->
                <!-- <div class="heading-menu text-center ftco-animate">
                    <h3>Cakes</h3>
                </div> -->
                <!---------------------------------- Product part -------------------------------------------------------------->
                <?php
                if (isset($_REQUEST['cat'])) {
                $cat = $_REQUEST['cat'];
                $select = "select  * from category_wise_entry  where category='$cat'";
                $res = mysqli_query($conn,$select);
                $i = 1;
                while($row=mysqli_fetch_array($res))
                {
                    ?> 
                    <div class="col-6">
                    
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img" style="background-image: url(admin/<?php echo $row['image'] ?>);"></div>

                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3><?php echo $row['cake_name'] ?></h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price"><?php echo $row['price'] ?>₹</span>
                                </div>
                            </div>
                            <p><?php echo $row['description'] ?></p>
                            <p><span>Weight- <?php echo $row['weight'] ?></span></p>


                        </div>
                    </div>

                    </div>
                    <?php
                        }
                        }
                    else{
                    $select = "select  * from category_wise_entry ";
                    $res = mysqli_query($conn,$select);
                    $i = 1;
                    while($row=mysqli_fetch_array($res))
                    {
                    ?> 
                    <div class="col-6">
                    
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img" style="background-image: url(admin/<?php echo $row['image'] ?>);"></div>

                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3><?php echo $row['cake_name'] ?></h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price"><?php echo $row['price'] ?>₹</span>
                                </div>
                            </div>
                            <p><?php echo $row['description'] ?></p>
                            <p><span>Weight- <?php echo $row['weight'] ?></span></p>


                        </div>
                    </div>

                    </div>
                    <?php
                        }
                        }
                    ?>



                
            </div>
            </div>
        </div>
    </section>
    <!-- menu section ends -->
</body>
</html>