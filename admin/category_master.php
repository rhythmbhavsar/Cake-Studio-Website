<?php
    include("connection.php");
    include("session.php");

    if(isset($_REQUEST['btn_submit'])){
        
        $nm = $_REQUEST['c_name'];
        $insert = "insert into category_master values(NULL,'$nm')";
        mysqli_query($conn, $insert);


    }
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Oct 2021 07:25:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<title>Category Master</title>
    <?php
        include"link_css.php";
        // include"footer.php";
        include"jq.php";
        // include"navbar.php";
        include"sidebar.php";
        // include"form.php";
        // include"form2.php";
    ?>

<style>
  body{
    background: #d6d1c7;
  }
  .container{
    margin-top: 30px;
  }
  .adj{
    /* border: 2px solid black; */
    padding: 20px;
    background: white;
    width: 350px;
  }
  .table_adj{
    background: white;
    width: 350px;
  }
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="container">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col">
    <form action="" method="post" class="adj">
        <h1>Category master</h1><br>
        <label class="form-label">Category: </label><br>
        <input type="text" name="c_name" class="bxadj form-control" required><br>
        <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    <div class="col">
      
    </div>
    <div class="col">
    <table border="1" class="table_adj table table-bordered border-secondary">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "select  * from category_master";
                $res = mysqli_query($conn,$select);
                $i = 1;
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['c_name'] ?></td>
                <td class="text-center">
										<button class="btn btn-sm btn-primary edit_menu" type="button">Edit</button>
										<button class="btn btn-sm btn-danger delete_menu" type="button" >Delete</button>
									</td>
            </tr>
            <?php
              }
            ?>
        </tbody>
  </table>
    </div>
    <div class="col"></div>
    <!-- <div class="col"></div> -->

  </div>
</div>






</body>
</html>