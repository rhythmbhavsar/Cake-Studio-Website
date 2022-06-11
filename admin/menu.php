<?php
include("connection.php");
include("session.php");

if(isset($_REQUEST['btn_submit'])){
		
    $ct = $_REQUEST['category'];
    $p = $_REQUEST['price'];
    $w = $_REQUEST['weight'];
    $des = $_REQUEST['description'];
    
    $name = $_FILES['userfile']['name'];
    $tmp = $_FILES['userfile']['tmp_name'];
    $type = $_FILES['userfile']['type'];
    $size = $_FILES['userfile']['size'];

    $path = "image/".$name ;
    move_uploaded_file($tmp,$path);

    $int = "insert into category_wise_entry values(NULL,'$ct', '$p','$w', '$des','$path')";
    mysqli_query($conn, $int);

 }

?>

<html>
<head>
  <!-- <style>
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
  }
  </style> -->
    <?php
        include"link_css.php";
        // include"footer.php";
        include"jq.php";
        // include"navbar.php";
        include"sidebar.php";
        // include"form.php";
        // include"form2.php";
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="row">
  <div class="col"></div>
  <div class="col"></div>
  <div class="col"></div>
    <div class="col">
    <form  method="post" class="adj" enctype="multipart/form-data">
        <h1>Menu</h1>
        <label>Category Name: </label><br>
        <select name="category" class="form-select" >
        <?php
                $select = "select  * from category_master";
                $res = mysqli_query($conn,$select);
                while($row=mysqli_fetch_array($res))
                {
            ?>
          <option ><?php echo $row['c_name'] ?></option>
          <?php
            }
          ?>
        </select><br>
        

        <label class="form-label">Price: </label>
        <input type="text" name="price" class="bxadj form-control" required><br>

        <label class="form-label">Weight: </label>
        <input type="text" name="weight" class="bxadj form-control" required><br>

        <label class="form-label">Description: </label>
        <input type="textarea" name="description" class="bxadj form-control" required><br>

        <label class="form-label">Upload Image: </label>
        <input type="file" name="userfile" class="bxadj form-control " required><br><br>

        <button type="submit" name="btn_submit" class="btn btn-primary">Uploda</button>
    </form>
    </div>
    <div class="col">
    </div>
    <div class="col">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>PRICE</th>
                <th>WEIGHT</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "select  * from category_wise_entry";
                $res = mysqli_query($conn,$select);
                $i = 1;
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['category'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['weight'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td><img src="<?php echo $row['image'] ?>" alt="img" height="100px" width="100px"></td>
                <td class="text-center">
										<button class="btn btn-sm btn-primary edit_menu" type="button" >Edit</button>
										<button class="btn btn-sm btn-danger delete_menu" type="button" >Delete</button>
									</td>
                </tr>
            <?php
                }
                ?>
        </tbody>
    </table>
    </div>

  </div>
</div>







  <!-- Control Sidebar -->
 
    <!-- Control sidebar content goes here -->
  
  <!-- /.control-sidebar -->


</body>
</html>