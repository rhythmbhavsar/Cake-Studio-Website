<?php
    include("connection.php");
    include("session.php");
?>

<!DOCTYPE html>
<html>

<head>
<title>Customer View</title>
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
									<h3 class="card-title">Details</h3>
								</div>
								<div class="card-body">
                                <table border="1" class="table table-bordered table-hover table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Email</th>

               
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "select  * from customer_registraion";
                $res = mysqli_query($conn,$select);
                $i = 1;
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['c_fname'].' '.$row['c_lname']  ?></td>
                <td><?php echo $row['c_add'] ?></td>
                <td><?php echo $row['c_mobile'] ?></td>
                <td><?php echo $row['c_gender'] ?></td>
                <td><?php echo $row['c_email'] ?></td>
                
               
                
                
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
            <center><a href="customer_view.php">View In detail</a></center>
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