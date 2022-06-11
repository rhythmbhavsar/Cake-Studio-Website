<?php
    include("connection.php");
    include("session.php");

    if(isset($_REQUEST['btn_submit'])){
        
        $fn = $_REQUEST['firstname'];
        $ln = $_REQUEST['lastname'];
        $un = $_REQUEST['username'];
        $e = $_REQUEST['email'];
        $pwd = $_REQUEST['password'];

        $insert = "insert into user_login values(NULL, '$fn', '$ln', '$un', '$e', '$pwd')";
        mysqli_query($conn, $insert);

        if($insert)
        {
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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://kit.fontawesome.com/78f2947038.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.imgadj{
    height: 60px;
}
</style>
<title>Register</title>
</head>
<body>

<div class="main">
<span><a href="index.php"><img src="cancel.svg" alt="" class="imgadj"></a></span>
    
    <center>
        <div class="lh">Sign Up</div>
        <span class="acc">Already have an account? <a href="login.php">LogIn</a></span>
    </center>
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form action="" method="post">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user log"></span><input type="text"  Placeholder="Customer Code" name="cust_code" required></p> 
            <p ><span class="fa fa-user log"></span><input type="text"  Placeholder="Firstname" name="c_fname" required></p> 
            <p ><span class="fa fa-user log"></span><input type="text"  Placeholder="Middlename" name="c_mname" required></p> 
            <p ><span class="fa fa-user log"></span><input type="text"  Placeholder="Lastname" name="c_lname" required></p> 
            <p ><select name="c_country">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select></p> 
            <p ><span class="fa fa-user log"></span><input type="text"  Placeholder="Username" name="username" required></p> 
            <p ><span class="fa fa-user log"></span><input type="email"  Placeholder="Email" name="email" required></p> 
            <p><span class="fa fa-lock log"></span><input type="password"  Placeholder="Password" name="password" required></p> 
            
            <div>    
                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign Up" name="btn_submit"></span>
            </div>

          </fieldset>
<div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">CAKE STUDIO
          
          <div class="clearfix"></div>
      </div>
      
      </div>
    </center>
    
</div>
</div>

</body>
</html>