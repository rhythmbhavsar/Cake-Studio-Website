<?php
include("connection.php");
include("session.php");



    if(isset($_REQUEST['atc']))
	{
		$cart=$_REQUEST['atc'];
		$q=1;
		$r=0;
		// $s=$_SESSION['user'];
		$a2 = "select * from customer_purchase_product where p_code='$cart' and cus_email='$user' and status='cart'";
		$r1=mysqli_query($conn,$a2);
		if(mysqli_num_rows($r1))
		{
			$r2=mysqli_fetch_array($r1);
			$r3 = $r2['qty'] + 1;
			$r4 = "update customer_purchase_product set qty = '$r3' where p_code='$cart' and cus_email='$user' and status='cart'";
			mysqli_query($conn,$r4);
		}
		else 
		{
			$insert="insert into customer_purchase_product values(NULL, '$r','$cart','$q','$user', 'cart')";			
		 	mysqli_query($conn,$insert);
		}	
		 header("location:cart.php");
        }
        

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
    include("m_header.php");
    ?>
    <!-- menu section starts -->
    <section class="ftco-section">
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
                        $res = mysqli_query($conn, $select);
                        $i = 1;
                        while ($row = mysqli_fetch_array($res)) {
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
                                                <span class="price"><?php echo $row['price']?>₹</span>
                                            </div>
                                        </div>
                                        <p><?php echo $row['description'] ?></p>
                                        <p><span>Weight- <?php echo $row['weight'] ?></span></p>
                                        <a href="menu.php?atc=<?php echo $row['cw_id'] ?>" class="btn btn-danger">Add to cart</a>
                                        <a href="cake_name.php?cart=<?php echo $row['cw_id'] ?>" class="btn btn-danger">Customize Cake</a>

                                    </div>
                                </div>

                            </div>
                        <?php
                        }
                    } else {
                        $select = "select  * from category_wise_entry ";
                        $res = mysqli_query($conn, $select);
                        $i = 1;
                        while ($row = mysqli_fetch_array($res)) {
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
                                        <a href="menu.php?atc=<?php echo $row['cw_id'] ?>" class="btn btn-danger">Add to cart</a>
                                        <a href="cake_name.php?cart=<?php echo $row['cw_id'] ?>" class="btn btn-danger">Customize Cake</a>
                                        <!-- <button type="button" class="btn btn-danger">Add to cart</button>
                            <button type="button" class="btn btn-danger">Customize Cake</button> -->

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