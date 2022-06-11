<?php
    include("connection.php");
    include("session.php");

    if(isset($_REQUEST['btn_submit'])){
        
        $cc = $_REQUEST['cust_code'];
        $fn = $_REQUEST['c_fname'];
        $mn = $_REQUEST['c_mname'];
        $ln = $_REQUEST['c_lname'];
        $ccn = $_REQUEST['c_country'];
        $cs = $_REQUEST['c_state'];
        $ct = $_REQUEST['c_city'];
        $ca = $_REQUEST['c_add'];
        $cm = $_REQUEST['c_mobile'];
        $cg = $_REQUEST['c_gender'];
        $ce = $_REQUEST['c_email'];
        $cp = $_REQUEST['c_password'];

        $insert = "insert into customer_registraion values(NULL,'$cc','$fn', '$mn', '$ln', '$ccn', '$cs', '$ct', '$ca', '$cm', '$cg', '$ce', '$cp')";
        mysqli_query($conn, $insert);


    }
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Oct 2021 07:25:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<title>Customer registration</title>
 
    <?php
        include"link_css.php";
        // include"footer.php";
        include"jq.php";
        // include"navbar.php";
        include"sidebar.php";
    ?>

<style>
body{
background: #d6d1c7;
}
.container{
    margin-top: 30px;
    margin-bottom: 60px;
}
.fadj{
    /* border: 2px solid black; */
    padding: 40px;
    background: white;
}
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="container">
  <div class="row">
    <div class="col"></div>

    <div class="col-9">


<form action="" class="fadj" method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Customer Code</label>
  <input type="text" class="form-control" name="cust_code" placeholder="Customer Code">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">First Name</label>
  <input type="text" class="form-control" name="c_fname" placeholder="First Name">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
  <input type="text" class="form-control" name="c_mname" placeholder="Middle Name">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Last Name</label>
  <input type="text" class="form-control" name="c_lname" placeholder="Last Name">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Country</label>
<select class="form-select" aria-label="Default select example" name="c_country">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">State</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="State" name="c_state">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">City</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City" name="c_city">
</div>

<div class="input-group">
    <span class="input-group-text">Address</span>
    <textarea class="form-control" aria-label="With textarea" name="c_add"></textarea>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mobile Number" name="c_mobile">
</div>



<div class="input-group mb-3">
<label for="exampleFormControlInput1" class="form-label">Gender</label>
<div class="form-check">
  <input class="form-check-input" type="radio"  id="flexRadioDefault1" name="c_gender" value="male" >
  <label class="form-check-label" for="flexRadioDefault1">Male</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio"  id="flexRadioDefault2" name="c_gender" value="female">
  <label class="form-check-label" for="flexRadioDefault2">Female</label>
</div>
</div>


<div class="input-group mb-3">
<label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="text" class="form-control" placeholder="email" aria-describedby="basic-addon2" name="c_email">
  <span class="input-group-text" id="basic-addon2">@gmail.com</span>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="c_password">
</div>
<button type="submit" class="btn btn-primary" name="btn_submit">Register</button>

</form>


    </div>

    <div class="col"></div>
  </div>
</div>

</body>
</html>