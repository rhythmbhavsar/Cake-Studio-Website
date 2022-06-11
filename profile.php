<?php
include 'connection.php';
include 'session.php';
//  error_reporting(0);

if (isset($_REQUEST['btn_update'])) {
    $catid = $_REQUEST['txt_catid'];
    $cname = $_REQUEST['txt_catname'];
    $mname = $_REQUEST['txt_mname'];
    $lname = $_REQUEST['txt_lname'];
    $uname = $_REQUEST['txt_uname'];
    $sname = $_REQUEST['txt_state'];
    $ciname = $_REQUEST['txt_city'];
    $aname = $_REQUEST['txt_add'];
    $moname = $_REQUEST['txt_mobile'];
    $ename = $_REQUEST['txt_email'];
    $pname = $_REQUEST['txt_password'];
    $qry = "update customer_registraion set c_fname ='$cname', c_mname ='$mname',c_lname ='$lname',username ='$uname',c_state ='$sname',c_city ='$ciname',c_add ='$aname',c_mobile ='$moname',c_email ='$ename',c_password ='$pname' where c_id='$catid' ";
    mysqli_query($conn, $qry);
    header("location:profile.php");
    echo "<script>alert('Edited..')</script> ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'link.php' ?>
    <title>Profile</title>
</head>

<body>
    <?php include 'header1.php' ?>
    <?php include 'slider.php' ?>
    <!--------------------------- Profile Part ------------------------------------------->

    <section class="content" id="profile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Profile</h3>
                        </div>
                        <div class="card-body">

                            <table border="1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <!-- <th>Customer Code</th> -->
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $select = "select  * from customer_registraion where username='$user'";
                                    $res = mysqli_query($conn, $select);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                        <tr>
                                            <!-- <td><?php echo $i++ ?></td> -->
                                            <!-- <td><?php echo $row['cust_code'] ?></td> -->
                                            <td><?php echo $row['c_fname'] ?></td>
                                            <td><?php echo $row['c_mname'] ?></td>
                                            <td><?php echo $row['c_lname'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['c_country'] ?></td>
                                            <td><?php echo $row['c_state'] ?></td>
                                            <td><?php echo $row['c_city'] ?></td>
                                            <td><?php echo $row['c_add'] ?></td>
                                            <td><?php echo $row['c_mobile'] ?></td>
                                            <td><?php echo $row['c_gender'] ?></td>
                                            <td><?php echo $row['c_email'] ?></td>
                                            <td><?php echo $row['c_password'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-lg<?php echo $i ?>">Edit</button>


                                                <div class="modal fade" id="modal-lg<?php echo $i ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> Edit</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="post">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="txt_catid" value="<?php echo $row['c_id'] ?>">

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">First Name</label>
                                                                        <input type="text" name="txt_catname" value="<?php echo $row['c_fname'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Middle Name</label>
                                                                        <input type="text" name="txt_mname" value="<?php echo $row['c_mname'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Last Name</label>
                                                                        <input type="text" name="txt_lname" value="<?php echo $row['c_lname'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Username</label>
                                                                        <input type="text" name="txt_uname" value="<?php echo $row['username'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">State</label>
                                                                        <input type="text" name="txt_state" value="<?php echo $row['c_state'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">City</label>
                                                                        <input type="text" name="txt_city" value="<?php echo $row['c_city'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Address</label>
                                                                        <input type="text" name="txt_add" value="<?php echo $row['c_add'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Mobile</label>
                                                                        <input type="text" name="txt_mobile" value="<?php echo $row['c_mobile'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Email</label>
                                                                        <input type="text" name="txt_email" value="<?php echo $row['c_email'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Password</label>
                                                                        <input type="password" name="txt_password" value="<?php echo $row['c_password'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" readonly>
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
                                                <!-- /.modal -->

                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <center>
                                <a href="change_password.php" class="btn btn-danger" role="button" data-bs-toggle="button">Change Password</a>
                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--------------------------- Profile Part ------------------------------------------->
    <?php include 'footer.php' ?>
    <?php include 'script.php' ?>
</body>

</html>