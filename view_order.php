<?php
include 'connection.php';
include 'session.php';
//  error_reporting(0);

if (isset($_REQUEST['btn_update'])) {
	$catid = $_REQUEST['txt_catid'];
	$cname = $_REQUEST['txt_catname'];
	$qry = "update customer_registraion set c_fname ='$cname' where c_id='$catid' ";
	mysqli_query($conn, $qry);
	header("location:profile.php");
	echo "<script>alert('Edited..')</script> ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<?php include 'link.php' ?>
	<title>View Order</title>
</head>

<body>
	<?php include 'header1.php' ?>
	<?php
	include 'slider.php'
	?>
	<!--------------------------- Profile Part ------------------------------------------->

	<section class="content" id="profile">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
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
									$res = "select * from customer_purchase join customer_purchase_product on customer_purchase_product.reciept_number=customer_purchase.reciept_number join category_wise_entry on category_wise_entry.cw_id=customer_purchase_product.p_code where customer_purchase_product.cus_email='$user'";

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
											<td><img src="admin/<?php echo $row['image'] ?>" height="50px" width="50px" alt="img"></td>
											<td><?php echo $row['price'] ?> Rs. </td>
											<td><?php echo $row['weight'] ?></td>
											<td><?php echo $row['qty'] ?></td>
											<td><?php echo $row['date'] ?></td>
											<td><?php echo $row['d_date'] ?></b></td>
											<td><?php echo $row['status'] ?></b></td>
											<!-- <td><a href="view_order.php?void=<?php echo $row['id'] ?>" class="btn btn-danger"><?php echo $row['status'] ?></a></b></td> -->

										</tr>
									<?php
										$i++;
									}
									?>
								</tbody>
							</table>

						</div>

					</div>
				</div>
			</div>
		</div>
	</section>




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
										<!-- <th>Categoty</th> -->
										<th>Status</th>


									</tr>
								</thead>
								<tbody>
									<?php
									$select = "select  * from cakename where cakeuserid='$user'";
									$res = mysqli_query($conn, $select);
									$i = 1;
									while ($row = mysqli_fetch_array($res)) {
									?>
										<tr>
											<td><?php echo $i++ ?></td>
											<td><img src="Create_Image/<?php echo $row['cakeimg'] ?>" alt="img" height="100px" width="100px"></td>
											<td><?php echo $row['cakeuserid'] ?></td>
											<td><?php echo $row['orderdate'] ?></td>
											<td><?php echo $row['deliverydate'] ?></td>
											<!-- <td><?php echo $row['category'] ?></td> -->
											<td><?php echo $row['status'] ?></td>

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





	<!--------------------------- Profile Part ------------------------------------------->
	<?php include 'footer.php' ?>
	<?php include 'script.php' ?>
</body>

</html>