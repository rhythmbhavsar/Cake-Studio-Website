<?php
	include("connection.php");
	include("session.php");
	$page_heading = 'Category';
?>

<?php
    
	if(isset($_REQUEST['txt_submit']))
	{
	    $cname=$_REQUEST['txt_catname'];
		$insert="insert into category_master values(NULL,'$cname')";
		mysqli_query($conn,$insert);
		
		header("location:category1.php");
	}
	
	if(isset($_REQUEST['did']))
	{
	    $cid=$_REQUEST['did'];
		$del="delete from category_master where cid='$cid'";
		mysqli_query($conn,$del);
		header("location:category1.php");
	}
	
	if(isset($_REQUEST['btn_update']))
	{
		$catid=$_REQUEST['txt_catid'];
	   $cname=$_REQUEST['txt_catname'];
	   $qry="update category_master set c_name ='$cname' where cid='$catid' ";
	   mysqli_query($conn,$qry);
		header("location:category1.php");
	}
	
	

?>

<!DOCTYPE html>
<html>
<head>
<title>Category</title>
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
							<label for="exampleInputEmail1">Category Name</label>
							<input type="text" name="txt_catname" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" required>
						  </div>
						  
						</div>
						<!-- /.card-body -->
		
						<div class="card-footer">
						  <button type="submit" name="txt_submit" class="btn btn-primary">Submit</button>
						</div>
					  </form>
					</div>
					<!-- /.card -->
					
					
					<div class="card card-default">
					  <div class="card-header">
						<h3 class="card-title">Details</h3>
					  </div>
					  <div class="card-body">
					  	<table class="table table-bordered table-hover table-striped">
							<thead>
						   		<tr>
						   			<th>No</th>
						   			<th>CategoryName</th>
									<th>Delete</th>
									<th>Edit</th>
						   		</tr>
						    </thead>
							<tbody>
							   <?php
							   $i=1;
							   $qry="select * from category_master";
							   $res=mysqli_query($conn,$qry);
							   
							   while($row=mysqli_fetch_array($res))
							   {
							   ?>
						   <tr>
						      <td><?php  echo $i?></td>
							  <td><?php  echo $row['c_name']?></td>
							  <td><a href="category1.php?did=<?php echo $row['cid'] ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to Delete...')">Delete</a></td>
							  <td>
							  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-lg<?php  echo $i?>">Edit</button>
							  
							  
							  <div class="modal fade" id="modal-lg<?php  echo $i?>">
								<div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <h4 class="modal-title">Category Edit</h4>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<form method="post">
									<div class="modal-body">
										<div class="form-group">
											<label for="exampleInputEmail1">Category Name</label>
											<input type="text" name="txt_catname" value="<?php  echo $row['c_name']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
											<input type="hidden" name="txt_catid" value="<?php  echo $row['cid']?>" >
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
						   $i++;
						   }
						   ?>
						   </tbody>
						</table>
					  </div>
					  <div class="card-footer">
					  
					  </div>
					</div>
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
	include("jq.php");
?>
</body>
</html>
