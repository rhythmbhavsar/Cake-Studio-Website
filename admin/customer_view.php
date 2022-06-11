<?php
    include("connection.php");
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Oct 2021 07:25:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<title>Customer View</title>
    <?php
        include"link_css.php";
        // include"footer.php";
        include"jq.php";
        // include"navbar.php";
        // include"sidebar.php";
        
    ?>
<style>
body{
    background-color: rgb(214, 209, 199);
}
.table_adj{
    margin-top: 30px;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card-default">
<div class="card-header">
    <h3 class="card-title">Customer Details</h3>
</div>
<div class="card-body">
    
    <table border="1" class="table table-bordered table-hover table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Code</th>
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
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "select  * from customer_registraion";
                $res = mysqli_query($conn,$select);
                $i = 1;
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['cust_code'] ?></td>
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
                
                
                </tr>
            <?php
                }
                ?>
        </tbody>
    </table>

</div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>