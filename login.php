<?php
    include("connection.php");

    if(isset($_REQUEST['btn_login'])){

        $un = $_REQUEST['username'];
        $p = $_REQUEST['c_password'];

        $sel = "Select * from customer_registraion where username= '$un' AND c_password = '$p'";
        $result = mysqli_query($conn,$sel);

        $sel1 = "Select * from admin_login where username= '$un' AND password = '$p'";
        $result1 = mysqli_query($conn,$sel1);

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['user'] = $un;

            header("location:home.php");
            // echo "<script>alert('Valid user..')</script> ";
        }
        else if(mysqli_num_rows($result1) > 0)
        {
            $_SESSION['admin'] = $un;

            header("location:admin/home.php");
        }
        else{

            echo "<script>alert('Invalid user..')</script> ";
            
            
           
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Log In</title>
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
    .lh{
        position: absolute;
        left: 50%;

    }
.imgadj{
    height: 60px;
}
.cpswd{
    margin-top: 35px;
    font-size: 15px;
}
.cpswd a{
    color: #c8a97e;
}
</style>
<title>Document</title>
</head>
<body>

<div class="main">
<span><a href="index.php"><img src="cancel.svg" alt="" class="imgadj"></a></span>
    
    <center>

        <div class="lh">Log In</div>
        <span class="acc">Don't have an account? <a href="registration.php">Register Here</a></span>
    </center>
    
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form action="" method="post">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user log"></span><input type="text"  Placeholder="Username" name="username" required></p>
            <p><span class="fa fa-lock log"></span><input type="password"  Placeholder="Password" name="c_password" required></p>
            
            <div>    
                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Submit" name="btn_login"></span>
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