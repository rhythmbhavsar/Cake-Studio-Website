<?php
include("connection.php");
include("session.php");
$user = $_SESSION['user'];

if (isset($_REQUEST['dl'])) {
    $c_id = $_REQUEST['dl'];
    $del3 = "delete from customer_purchase_product where id='$c_id'";
    mysqli_query($conn, $del3);
    header("location:cart.php");
}

if (isset($_REQUEST['btn_submit'])) {
    $a1 = 1;
    $b1 = "select * from customer_purchase";
    $r = mysqli_query($conn, $b1);
    while ($row = mysqli_fetch_array($r)) {
        $a1 = $row['id'] + 1;
    }
    $cn = $_REQUEST['c_name'];
    $ca = $_REQUEST['c_add'];
    $cu = $_REQUEST['u_name'];
    $cnm = $_REQUEST['c_num'];
    $cd = $_REQUEST['c_date'];
    $dd = $_REQUEST['d_date'];
    $s = "Order";

    $insert = "insert into customer_purchase values(NULL, '$a1', '$cn', '$ca', '$cu', '$cnm', '$cd', '$dd','$s')";
    mysqli_query($conn, $insert);


    $up = "update customer_purchase_product set reciept_number = '$a1',status = 'Order' where cus_email = '$user' AND status = 'cart' ";
    mysqli_query($conn, $up);

    $b2 = "select * from customer_purchase_product where cus_email='$user' AND  reciept_number='$a1'";
    $b3 = mysqli_query($conn, $b2);
    while ($b4 = mysqli_fetch_array($b3)) {
        $_SESSION['cart1'] = $br;
        $b5 = $b4['qty'];
        $b6 = $b4['p_code'];
        $b7 = "select * from category_wise_entry 
                where cw_id='$b6'";
        $b8 = mysqli_query($conn, $b7);
        $b9 = mysqli_fetch_array($b8);
        $b10 = $b9['qty'];
        $b11 = $b10 - $b5;
        $update1 = "update category_wise_entry set qty='$b11' where cw_id='$b6' ";
        mysqli_query($conn, $update1);
    }
    header("location:view_order.php");
}

if (isset($_REQUEST['btn_update'])) {
    $catid = $_REQUEST['txt_catid'];
    $qty = $_REQUEST['txt_catname'];
    $qry = "update customer_purchase_product set qty ='$qty' where id='$catid' ";
    mysqli_query($conn, $qry);
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
    <link rel="stylesheet" href="css/stylec.css">
    <link rel="stylesheet" href="css/drop_style.css">
    <?php
    // include("link.php");
    ?>
    <title>Cart</title>

</head>

<body>
    <?php
    include("header1.php");
    ?>
    <!-- Cart section starts -->
    <div class="card-crt" style="margin-top: 95px;">
        <div class="row" style="margin-right: 0px !important; margin-left: 0px !important;">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <!-- <div class="col align-self-center text-right text-muted">3 items</div> -->
                    </div>
                </div>

                <?php
                // if (isset($_SESSION['cart1'])) {
                // $atc = $_REQUEST['atc'];
                $select = "select  * from customer_purchase_product join category_wise_entry on category_wise_entry.cw_id=customer_purchase_product.p_code where cus_email='$user' AND status='cart'";
                $res = mysqli_query($conn, $select);
                $i = 1;
                $total = 0;
                while ($row = mysqli_fetch_array($res)) {
                    $j = 1;
                    $q = $row['qty'];
                    $p = $row['price'];
                    // $total = 0;
                ?>


                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="cart-img img" src="admin/<?php echo $row['image'] ?>" alt="img" height="1000px" width="1000px"></div>
                            <div class="col">
                                <div class="row text-muted"><?php echo $row['cake_name'] ?></div>
                                <!-- <div class="row"><?php echo $row['description'] ?></div> -->
                            </div>
                            <div class="col">QTY.<a href="#" class="border"><?php echo $row['qty'] ?></a> </div>
                            <div class="col"><?php echo $row['price'] * $row['qty']; ?> <?php $total = $total + ($row['price'] * $row['qty']); ?>₹</div>
                            <span class="close"><a href="cart.php?dl=<?php echo $row['id'] ?>"> &#10005; </a></span>
                            <!-- <span><a href="cart.php?qte="<?php echo $row['id'] ?>">Edit</a></span> -->


                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-lg<?php echo $i ?>">Edit</button>


                            <div class="modal fade" id="modal-lg<?php echo $j ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Category Edit</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Category Name</label>
                                                    <input type="number" name="txt_catname" value="<?php echo $row['qty'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Quantity" min=1>
                                                    <input type="hidden" name="txt_catid" value="<?php echo $row['id'] ?>">
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" name="btn_update" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>



                        </div>
                    </div>

                <?php
                    $j++;
                }
                // }
                ?>
                <div class="row main align-items-center">
                    <div class="col-2"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">Total:- <?php echo $total ?>₹</div>
                    <div class="col"></div>
                </div>



                <div class="back-to-shop"><a href="menu.php">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Place Order</b></h5>
                </div>
                <hr>
                <div class="row">
                    <!-- <div class="col" style="padding-left:0;">ITEMS 3</div> -->

                    <div class="col text-right">

                    </div>
                </div>
                <form method="POST">
                    <p>Customer name</p> <input id="code" name="c_name" placeholder="Enter your Name" required>
                    <p>Customer address</p> <input id="code" name="c_add" placeholder="Enter your Address" required>
                    <p>Contact</p> <input id="code" name="c_num" placeholder="Enter contact number" required>
                    <p>Username</p> <input id="code" name="u_name" placeholder="<?php echo  $_SESSION['user']; ?>" value="<?php echo  $_SESSION['user']; ?>" readonly>
                    <p> Date</p> <input id="code" name="c_date" type="date" value="<?php echo date("Y-m-d"); ?>" readonly>
                    <p> Deliver Date</p> <input type="date" name="d_date" id="start" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" max="2021-12-31" required>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 1vh 0;">
                        <input name="p_total" value="<?php echo  $total; ?>" hidden>
                    </div> <button class="btn" type="submit" name="btn_submit">CHECKOUT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Cart section ends -->
    <?php

    // }
    ?>

    <?php
    include("script.php");
    ?>


</body>

</html>