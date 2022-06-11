<?php
include("connection.php");
include("session.php");

if (isset($_REQUEST['btn_status'])) {
	$hid = $_REQUEST['txt_catid'];
	$sta = $_REQUEST['txt_status'];
	$qry = "update cakename set status ='$sta' where cnid='$hid'";
	mysqli_query($conn, $qry);
	header("location:cake_name.php");
}
?>

?>


<!DOCTYPE html>
<html>

<head>
<title>Cake on Name</title>
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

							<!-- /.card -->


							<div class="card card-default">
								<div class="card-header">
									<h3 class="card-title">Name on cake</h3>
								</div>
								<div class="card-body">
									<table border="1" class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Cake</th>
												<th>Name</th>
												<th>Ordered date</th>
												<th>Dilevery Date </th>
												<th>Contact</th>
												<th>Status</th>


											</tr>
										</thead>
										<tbody>
											<?php
											$select = "select  * from cakename";
											$res = mysqli_query($conn, $select);
											$i = 1;
											while ($row = mysqli_fetch_array($res)) {
											?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><img src="../Create_Image/<?php echo $row['cakeimg'] ?>" alt="img" height="100px" width="100px"></td>
													<td><?php echo $row['cakeuserid'] ?></td>
													<td><?php echo $row['orderdate'] ?></td>
													<td><?php echo $row['deliverydate'] ?></td>
													<td><?php echo $row['cakecategoryid'] ?></td>

													<td><?php
														if ($row['status'] == 'Ordered') {
														?>
															<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-lgs<?php echo $i ?>"><i class="fa fa-lock">Ordered</i></button>
														<?php
														} else {
														?>

															<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lgs<?php echo $i ?>"><i class="fa fa-unlock">Order Pending</i></button>
														<?php
														}
														?>
														<div class="modal fade" id="modal-lgs<?php echo $i ?>">

															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Status Edit</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<form method="post">
																		<div class="modal-body">

																			<div class="form-group">

																				<input type="hidden" name="txt_catid" value="<?php echo $row['cnid'] ?>">
																				<?php
																				if ($row['status'] == 'Ordered') {
																					$ad = 'Order Pending';
																				?>
																					<input type="hidden" name="txt_status" value="Order Pending">
																				<?php
																				} else {
																					$ad = 'Ordered';
																				?>
																					<input type="hidden" name="txt_status" value="Ordered">
																				<?php
																				}
																				?>
																			</div>
																			<h2>Are you sure want to <?php echo $ad ?></h2>
																		</div>
																		<div class="modal-footer justify-content-between">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			<button type="submit" name="btn_status" class="btn btn-primary">Save changes</button>
																		</div>
																	</form>
													</td>




												</tr>
											<?php
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