<?php
include("connection.php");
include("session.php");

if (isset($_REQUEST['btn_submit'])) {

    $cc = $_REQUEST['txt_ref'];
    $fn = $_REQUEST['c_fname'];
    $mn = $_REQUEST['c_mname'];
    $ln = $_REQUEST['c_lname'];
    $un = $_REQUEST['username'];
    $ccn = $_REQUEST['c_country'];
    $cs = $_REQUEST['c_state'];
    $ct = $_REQUEST['c_city'];
    $ca = $_REQUEST['c_add'];
    $cm = $_REQUEST['c_mobile'];
    $cg = $_REQUEST['c_gender'];
    $ce = $_REQUEST['c_email'];
    $cp = $_REQUEST['c_password'];

    $insert = "insert into customer_registraion values(NULL,'$cc','$fn', '$mn', '$ln', '$un', '$ccn', '$cs', '$ct', '$ca', '$cm', '$cg', '$ce', '$cp')";
    mysqli_query($conn, $insert);

    if ($insert) {
        echo "<script>alert('Data Inserted')</script>";
        // header("location:login.php");
    }
    // else{
    // 	echo "error..";
    // }


}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Customer Registration</title>
    <?php
    include("link_css.php");
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include("sidebar.php");
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        // include("menu.php");
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php
            // include("page_heading.php");
            ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <?php $i = 1;
                                            $sel = "select * from customer_registraion";
                                            $res = mysqli_query($conn, $sel);
                                            while ($row = mysqli_fetch_array($res)) {
                                                $i = $row['cust_code'] + 1;
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Refrence No. </label>
                                                <input type="text" name="txt_ref" class="form-control" id="exampleInputEmail1" value="<?php echo $i; ?>" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="c_fname" placeholder="First Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" name="c_mname" placeholder="Middle Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="c_lname" placeholder="Last Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Country</label>
                                            <select class="form-control" aria-label="Default select example" name="c_country">
                                                <option class="form-control" selected>Select Country</option>
                                                <option class="form-control" value="India">India</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">State</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="State" name="c_state" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">City</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City" name="c_city" required>
                                        </div>
                                        <div class="form-group">
                                            <span class="input-group-text">Address</span>
                                            <!-- <textarea class="form-control" aria-label="With textarea" name="c_add"></textarea> -->
                                            <input type="textarea" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Address" name="c_add" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Mobile Number" name="c_mobile" data-bind="value:replyNumber" min="1000000000" max="9999999999" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="c_gender" value="male">
                                                <label class="form-check-label" for="flexRadioDefault1">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="c_gender" value="female">
                                                <label class="form-check-label" for="flexRadioDefault2">Female</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="email" aria-describedby="basic-addon2" name="c_email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="c_password" required>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="btn_submit" class="btn btn-primary">Register</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                            <!-- /.card -->


                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include("footer.php");
        ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php
    // include("js.php");
    ?>
</body>

</html>