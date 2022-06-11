<?php
include("connection.php");
include("session.php");
$page_heading = 'Category';
?>

<?php

if (isset($_REQUEST['btn_submit'])) {

	$cn = $_REQUEST['cake_name'];
	$ct = $_REQUEST['category'];
	$p = $_REQUEST['price'];
	$w = $_REQUEST['weight'];
	$des = $_REQUEST['description'];

	$name = $_FILES['ufile']['name'];
	$tmp = $_FILES['ufile']['tmp_name'];
	$type = $_FILES['ufile']['type'];
	$size = $_FILES['ufile']['size'];

	$path = "image/" . $name;
	move_uploaded_file($tmp, $path);

	$int = "insert into category_wise_entry values(NULL,'$cn', '$ct', '$p','$w', '$des','$path')";
	mysqli_query($conn, $int);
}



if (isset($_REQUEST['did1'])) {
	$cw_id = $_REQUEST['did1'];
	$del = "delete from category_wise_entry where cw_id='$cw_id'";
	mysqli_query($conn, $del);
	header("location:menu1.php");
}

if (isset($_REQUEST['btn_update'])) {
	$catid = $_REQUEST['txt_catid'];
	$cname = $_REQUEST['txt_cname'];
	$price = $_REQUEST['txt_catname'];
	$wt = $_REQUEST['weight_e'];
	$ds = $_REQUEST['description_e'];
	$qry = "update category_wise_entry set cake_name='$cname', price ='$price',weight ='$wt',description ='$ds' where cw_id='$catid' ";
	mysqli_query($conn, $qry);
	header("location:menu1.php");
}

?>



<!DOCTYPE html>
<html>

<head>
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
									<h3 class="card-title">menu</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form role="form" method="POST" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group">
											<label for="exampleInputEmail1">Cake Name</label>
											<input type="text" name="cake_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Cake Name" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Category Name:</label>
											<select name="category" class="form-control">
												<?php
												$select = "select  * from category_master";
												$res = mysqli_query($conn, $select);
												while ($row = mysqli_fetch_array($res)) {
												?>
													<option value="<?php echo $row['cid'] ?>"><?php echo $row['c_name'] ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Price</label>
											<input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" min="1" data-bind="value:replyNumber" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Weight:</label>
											<input type="text" name="weight" class="form-control" id="exampleInputEmail1" placeholder="Enter Weight" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Description:</label>
											<input type="textarea" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Upload Image:</label>
											<input type="file" name="ufile" class="bxadj form-control " required><br><br>
										</div>

									</div>
									<!-- /.card-body -->

									<div class="card-footer">
										<button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
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
												<th>ID</th>
												<th>Name</th>
												<th>CATEGORY</th>
												<th>PRICE</th>
												<th>WEIGHT</th>
												<th>DESCRIPTION</th>
												<th>IMAGE</th>
												<th>DELETE</th>
												<th>EDIT</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$select = "select  * from category_wise_entry join category_master on category_master.cid=category_wise_entry.category";
											$res = mysqli_query($conn, $select);
											$j = 1;
											while ($row = mysqli_fetch_array($res)) {
											?>
												<tr>
													<td><?php echo $j ?></td>
													<td><?php echo $row['cake_name'] ?></td>
													<td><?php echo $row['c_name'] ?></td>
													<td><?php echo $row['price'] ?></td>
													<td><?php echo $row['weight'] ?></td>
													<td><?php echo $row['description'] ?></td>
													<td><img src="<?php echo $row['image'] ?>" alt="img" height="100px" width="100px"></td>
													<td class="text-center">
														<a href="menu1.php?did1=<?php echo $row['cw_id'] ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to Delete...')">Delete</a>
													</td>
													<td>
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-lg<?php echo $j ?>">Edit</button>
														<div class="modal fade" id="modal-lg<?php echo $j ?>">
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
																				<label for="exampleInputEmail1">Cake Name</label>
																				<div class="form-group">
																					<input type="text" name="txt_cname" value="<?php echo $row['cake_name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Cake Name">
																				</div>
																				<label for="exampleInputEmail1">Price</label>
																				<div class="form-group">
																					<input type="number" name="txt_catname" value="<?php echo $row['price'] ?>" class="form-control" id="exampleInputEmail1" data-bind="value:replyNumber" placeholder="Enter Category Name">
																				</div>
																				<input type="hidden" name="txt_catid" value="<?php echo $row['cw_id'] ?>">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Weight:</label>
																					<input type="text" name="weight_e" class="form-control" id="exampleInputEmail1" placeholder="Enter Weight" value="<?php echo $row['weight'] ?>" required>
																				</div>
																				<div class="form-group">
																					<label for="exampleInputEmail1">Description:</label>
																					<input type="textarea" name="description_e" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="<?php echo $row['description'] ?>" required>
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
												$j++;
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