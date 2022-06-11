<?php
$err = "";

include("connection.php");
include("session.php");

$pageheading = 'Change Password';
if (isset($_REQUEST['btn_submit'])) {
	$q = "select * from admin_login where password = '" . $_REQUEST['txt_opass'] . "' and username = '" . $_SESSION['admin'] . "'";
	$qq = mysqli_query($conn, $q);
	if (mysqli_num_rows($qq) > 0) {
		if ($_REQUEST['txt_npass'] == $_REQUEST['txt_cpass']) {

			$q1 = "update admin_login set password = '" . $_REQUEST['txt_npass'] . "' where username = '" . $_SESSION['admin'] . "'";
			mysqli_query($conn, $q1);
			$err = "Pasword Changed!!!";
		} else {
			$err = "New And Confirm Password Are Not Same";
		}
	} else {
		$err = "old Password is Invalid";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>change Password</title>
	<?php
	include("link_css.php");
	?>
</head>

<body>
	<div class="">

		<?php
		include("sidebar.php");
		?>
		<div class="content-wrapper">
			<section id="main-content">
				<div class="container-fluid">
					<!-- <h3><i class="fa fa-angle-right"></i> <?php echo $pageheading ?></h3> -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Change Password</h3>
						</div>
						<div class="row">
						<!--  DATE PICKERS -->
						<div class="col-md-12">
							<div class="form-panel">
								<!-- <h4 class="mb"><i class="fa fa-angle-right"></i> Form </h4> -->
								<form class="form-horizontal style-form" method="post">
									<div id="sendmessage" style="color:#FF3300;padding-left:30px;margin-bottom:20px;">
										<?php
										if ($err != '') {
											echo "* " . $err;
										}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label"> Enter Old Password </label>
										<div class="col-sm-12">
											<input type="password" name="txt_opass" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label"> Enter New Password </label>
										<div class="col-sm-12">
											<input type="password" name="txt_npass" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label"> Enter Confirm Password </label>
										<div class="col-sm-12">
											<input type="password" name="txt_cpass" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</form>

							</div>
						</div>



					</div>
				</div>
				</div>

			</section>
		</div>
		
	</div>

	

</body>

</html>