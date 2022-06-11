<?php
    include("connection.php");
    include("session.php");
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
                                <table border="1" class="table table-bordered table-hover table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Reciept</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Date</th>
                <th>Dilevery date</th>
                <th></th>

               
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "select  * from customer_purchase join customer_purchase_product on customer_purchase_product.reciept_number=customer_purchase.reciept_number";
                $res = mysqli_query($conn,$select);
                $i = 1;
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['reciept_number'] ?></td>
                <td><?php echo $row['cus_name'] ?></td>
                <td><?php echo $row['c_add'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['contact'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['d_date'] ?></td>
                <td><a href="view_order_details.php?ov=<?php echo $row['id'] ?>" class="btn btn-primary">View More </a></td>
                
               
                
                
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