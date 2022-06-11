<?php
include("connection.php");
include("session.php");

if (isset($_REQUEST['btn_status'])) {
	$hid = $_REQUEST['txt_catid'];
	$sta = $_REQUEST['txt_status'];
	$qry = "update customer_purchase_product set status ='$sta' where id='$hid'";
	mysqli_query($conn, $qry);
	header("location:view_order_details.php");
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

							<!-- /.card -->


							<div class="card card-default">
								<div class="card-header">
									<h3 class="card-title">Order Details</h3>
								</div>
								<div class="card-body">
									<table border="1" class="table table-bordered table-hover table-striped">
										<thead>
											<tr>

												<th>Id</th>
												<th>Receipt No</th>
												<th>Customer Name</th>
												<th>Address</th>
												<th>Email Id</th>
												<th>Contact</th>
												<th>Image</th>
												<th>Price </th>
												<th>Weight </th>
												<th>Quantity</th>
												<th>Order Date</th>
												<th>Deliver Date</th>
												<th>Order Status</th>


											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											$res = "select * from customer_purchase join customer_purchase_product on customer_purchase_product.reciept_number=customer_purchase.reciept_number join category_wise_entry on category_wise_entry.cw_id=customer_purchase_product.p_code ";

											$rel = mysqli_query($conn, $res);
											while ($row = mysqli_fetch_array($rel)) {
											?>
												<tr class="tr-data">

													<td><?php echo $i ?></td>
													<td><?php echo $row['reciept_number'] ?></td>
													<td><?php echo $row['cus_name'] ?> </td>
													<td><?php echo $row['c_add'] ?></td>
													<td><?php echo $row['email'] ?></td>
													<td><?php echo $row['contact'] ?></td>
													<td><img src="<?php echo $row['image'] ?>" height="50px" width="50px" alt="img"></td>
													<td><?php echo $row['price'] ?> Rs. </td>
													<td><?php echo $row['weight'] ?></td>
													<td><?php echo $row['qty'] ?></td>
													<td><?php echo $row['date'] ?></td>
													<td><?php echo $row['d_date'] ?></b></td>
													<td><?php
														if ($row['status'] == 'Ordered') {
														?>
															<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lgs<?php echo $i ?>"><i class="fa fa-lock">Ordered</i></button>
														<?php
														} else {
														?>

															<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-lgs<?php echo $i ?>"><i class="fa fa-unlock">Order Pending</i></button>
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

																				<input type="hidden" name="txt_catid" value="<?php echo $row['id'] ?>">
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