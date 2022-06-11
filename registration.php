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
    // echo "insert data..";
    header("location:login.php");
  }
  // else{
  // 	echo "error..";
  // }


}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/78f2947038.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <title>Customer Registration</title>

  <style>
    .imgadj {
      height: 60px;
    }

    .frmadj {
      /* border: 2px solid black; */
      margin-top: 25px;
      margin-bottom: 30px;
    }

    .hd1 {
      font-size: 50px;
      font-size: 100px;
      color: black;
      /* margin-top: 5%; */
      left: 50%;
      /* position: fixed; */
      top: 10%;
      /* transform: translate(-50%, -50%); */
      font-family: 'FontAwesome', sans-serif;
    }

    .acc {
      color: black;
      display: flow-root;
      font-size: 15px;
    }

    .acc a {
      color: #c8a97e;
    }

    .error {
      color: red;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="head1">
    <span><a href="index.php"><img src="cancel.svg" alt="" class="imgadj"></a></span>
    <center class="hd1">Registration
      <span class="acc">Already have an account? <a href="login.php">Log In</a></span>
    </center>
  </div>

  <div class="container frmadj">
    <div class="row">


      <div class="col-9">


        <form action="" class="fadj" method="post" name="form1">
          <div class="mb-3">
            <?php $i = 1;
            $sel = "select * from customer_registraion";
            $res = mysqli_query($conn, $sel);
            while ($row = mysqli_fetch_array($res)) {
              $i = $row['cust_code'] + 1;
            }
            ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Refrence No. </label>
              <input type="text" name="txt_ref" class="form-control" id="exampleInputEmail1" value="<?php echo $i; ?>" readonly="" required>
            </div>

          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">First Name</label>
            <input type="text" class="form-control" name="c_fname" placeholder="First Name" required>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
            <input type="text" class="form-control" name="c_mname" placeholder="Middle Name" required>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="c_lname" placeholder="Last Name" required>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">User Name</label>
            <input type="text" class="form-control" name="username" placeholder="User Name" required>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Country</label>
            <select class="form-control" aria-label="Default select example" name="c_country" required>
              <option selected>-- SELECT COUNTRY--</option>
              <option value="India">India</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">State</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="State" name="c_state" required>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">City</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City" name="c_city" required>
          </div>

          <div class="input-group">
            <span class="input-group-text">Address</span>
            <textarea class="form-control" aria-label="With textarea" name="c_add" required></textarea>
          </div><br>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Mobile Number" name="c_mobile" data-bind="value:replyNumber" min="1000000000" max="9999999999" required>
            <!-- <span class="error">*Please Enter valid phone number</span> -->
            <div class="invalid-feedback">
              Please provide a valid zip.
            </div>
          </div>



          <div class="input-group mb-3">
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label">Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="c_gender" value="male" required>
                <label class="form-check-label" for="flexRadioDefault1">Male</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="c_gender" value="female" required>
                <label class="form-check-label" for="flexRadioDefault2">Female</label>
              </div>
            </div>
          </div>


          <div class="input-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="email" aria-describedby="basic-addon2" name="c_email">

          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="c_password">
          </div>
          <button type="submit" class="btn btn-primary" name="btn_submit">Register</button>

        </form>


      </div>


    </div>
  </div>



</body>

</html>