<?php
    include("connection.php");
    include("session.php");

    if(isset($_REQUEST['btn_submit'])){
        
        $fn = $_REQUEST['firstname'];
        $ln = $_REQUEST['lastname'];
        $e = $_REQUEST['email'];
        $un = $_REQUEST['username'];
        $pwd = $_REQUEST['password'];

        $insert = "insert into admin_login values(NULL, '$fn', '$ln','$e', '$un', '$pwd')";
        mysqli_query($conn, $insert);

        if($insert)
        {
          // echo "insert data..";
                header("location:index.php");
        }
            // else{
        // 	echo "error..";
        // }

    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Cake Studio Registration</title>
    <style>
        body {
  margin: 0;
  padding: 0;
  background-color: #e73131;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 565px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Registration</h3>
                            <div class="form-group">
                                <label for="firstname" class="text-info">Firstname:</label><br>
                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="text-info">Lastname:</label><br>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            <!-- </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div> -->
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <center>

                                <div class="form-group">
                                    <input type="submit" name="btn_submit" class="btn btn-info btn-md" value="Register"><br>
                                    Already have an acount?<a href="index.php" class="text-info"> LogIn</a>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>