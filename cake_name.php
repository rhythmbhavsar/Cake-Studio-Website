<?php
include("connection.php");
// session_start();

$user_session = $_SESSION['user'];
$usersel = "select * from customer_registraion where username='$user_session'";
$userres = mysqli_query($conn, $usersel);
$userrow = mysqli_fetch_array($userres);
$user_id = $userrow['c_id'];

//..................

if (isset($_REQUEST['btn_submit_cake'])) {
	$newimage = $_SESSION['newimage'];
	$email = $_SESSION['user'];
	$deledate = $_REQUEST['txt_deldate'];
	$date = date('Y-m-d');
	$id = $_SESSION['session_cart'];
	$insert = "insert into cakename(cakeimg,cakeuserid,orderdate,deliverydate,cakecategoryid,status) values('$newimage','$email','$date','$deledate','$id','Order')";
	mysqli_query($conn, $insert);
	header("location:view_order.php");
}



//.........................


if (isset($_REQUEST['cart'])) {
	$_SESSION['session_cart'] = $_REQUEST['cart'];
	$id = $_REQUEST['cart'];

	$res = "select * from category_wise_entry where cw_id = '$id'";
	$rel = mysqli_query($conn, $res);
	$row1 = mysqli_fetch_array($rel);

	// $path = 'admin/' . $row1['image'];
	$path = 'admin/' . $row1['image'];
	// $path = 'admin/image/10.jpg';
	$im = $row1['image'];

	$right = 5;
	$bottom = 16;
	$rotate = 0;
	// FETCH IMAGE & WRITE TEXT
	$img = imagecreatefromjpeg($path); //sunset image store in your folder
	$white = imagecolorallocate($img, 255, 255, 255);
	$txt = "Your Name";
	$font = "C:\Windows\Fonts\Arial.ttf";
	$font_size = 16;
	$new = imagettftext($img, $font_size, $rotate, $right, $bottom, $white, $font, $txt);
	//imagettftext(image_name, fontsize, font_rotate, font_margin_left, font_margin_top, $white, $font, $txt);
	//header('Content-type: image/jpeg');
	//imagejpeg($img);//view image on browser
	// OR SAVE TO A FILE
	// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
	$_SESSION['newimage'] = "IMG_" . $user_id . date('_dmyhis_') . rand(100000, 999999) . "." . "jpg";
	$newimage = $_SESSION['newimage'];
	imagejpeg($img, "Create_Image/$newimage", 100);

	imagedestroy($img);
	header("location:cake_name.php");
}
//------------------------------------------------------------------------------
if (isset($_SESSION['session_cart'])) {
	$id = $_SESSION['session_cart'];

	$res = "select * from category_wise_entry where cw_id = '$id'";
	$rel = mysqli_query($conn, $res);
	$row1 = mysqli_fetch_array($rel);
	// $path = 'admin/' . $row1['image'];
	$path = 'admin/image/10.jpg';
	$newimage = $_SESSION['newimage'];
}
//----------------------------------------------------------------------------------	
if (isset($_REQUEST['btn_reset'])) {
	unset($_SESSION['cname_session']);
	unset($_SESSION['right_session']);
	unset($_SESSION['bottom_session']);
	unset($_SESSION['rotate_session']);
	$right = 5;
	$bottom = 16;
	$rotate = 0;
	// FETCH IMAGE & WRITE TEXT
	$img = imagecreatefromjpeg($path); //sunset image store in your folder
	$white = imagecolorallocate($img, 255, 255, 255);
	$txt = $_REQUEST['txt_cname'];
	$font = "C:\Windows\Fonts\Arial.ttf";
	$font_size = 1000;
	$new = imagettftext($img, $font_size, $rotate, $right, $bottom, $white, $font, $txt);
	//imagettftext(image_name, fontsize, font_rotate, font_margin_left, font_margin_top, $white, $font, $txt);
	//header('Content-type: image/jpeg');
	//imagejpeg($img);//view image on browser
	// OR SAVE TO A FILE
	// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
	$newimage = $_SESSION['newimage'];
	imagejpeg($img, "Create_Image/$newimage", 100);

	imagedestroy($img);
	header("location:cake_name.php");
}
//---------------------------------------------------------------
if (isset($_SESSION['cname_session'])) {
	$c_name = $_SESSION['cname_session'];
} else {
	$c_name = 'Your Name';
}
//---------------------------------------------------------------
if (isset($_SESSION['right_session'])) {
	$right = $_SESSION['right_session'];
} else {
	$right = '';
}
//-----------------
if (isset($_SESSION['bottom_session'])) {
	$bottom = $_SESSION['bottom_session'];
} else {
	$bottom = '';
}
//--------------------
if (isset($_SESSION['rotate_session'])) {
	$rotate = $_SESSION['rotate_session'];
} else {
	$rotate = '';
}


//--------------*--------------------------------------------

if (isset($_REQUEST['btn_submit'])) {
	$c_name = $_REQUEST['txt_cname'];
	$right = $_REQUEST['txt_right'];
	$bottom = $_REQUEST['txt_bottom'];
	$rotate = $_REQUEST['txt_rotate'];
	if (empty($_REQUEST['txt_cname'])) {
		if (isset($_SESSION['cname_session'])) {
			$c_name = $_SESSION['cname_session'];
		} else {
			$c_name = "Your Name";
		}
	} else {
		$_SESSION['cname_session'] = $c_name;
		$c_name = $_SESSION['cname_session'];
	}
	//---------------------------------------------
	if (empty($_REQUEST['txt_right'])) {
		if (isset($_SESSION['right_session'])) {
			$right = $_SESSION['right_session'];
		} else {
			$right = 5;
		}
	} else {
		$_SESSION['right_session'] = $right;
		$right = $_SESSION['right_session'];
	}
	//---------------------------------------------
	if (empty($_REQUEST['txt_bottom'])) {
		if (isset($_SESSION['bottom_session'])) {
			$bottom = $_SESSION['bottom_session'];
		} else {
			$bottom = 16;
		}
	} else {
		$_SESSION['bottom_session'] = $bottom;
		$bottom = $_SESSION['bottom_session'];
	}
	//---------------------------------------------
	if (empty($_REQUEST['txt_rotate'])) {
		if (isset($_SESSION['rotate_session'])) {
			$rotate = $_SESSION['rotate_session'];
		} else {
			$rotate = 0;
		}
	} else {
		$_SESSION['rotate_session'] = $rotate;
		$rotate = $_SESSION['rotate_session'];
	}
	//---------------------------------------------

	// FETCH IMAGE & WRITE TEXT
	$img = imagecreatefromjpeg($path); //sunset image store in your folder
	$white = imagecolorallocate($img, 255, 255, 255);
	$txt = $_REQUEST['txt_cname'];
	$font = "C:\Windows\Fonts\Arial.ttf";
	$font_size = 16;
	$new = imagettftext($img, $font_size, $rotate, $right, $bottom, $white, $font, $txt);
	//imagettftext(image_name, fontsize, font_rotate, font_margin_left, font_margin_top, $white, $font, $txt);

	// OUTPUT IMAGE
	//header('Content-type: image/jpeg');
	//imagejpeg($img);//view image on browser


	// OR SAVE TO A FILE
	// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
	$newimage = $_SESSION['newimage'];
	imagejpeg($img, "Create_Image/$newimage", 100);
	imagedestroy($img);
	header("location:cake_name.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Name on Cake</title>

	<!-- Bootstrap Core CSS -->
	<?php
	// include("uplinkcss.php");
	?>
	<style>
		.adj {
			border: 2px solid black;
			width: 500px;
			position: absolute;
			left: 50%;
			top: 65%;
			transform: translate(-50%, -50%);
			background-color: white;
			box-shadow: 0 6px 20px 0 rgb(0 0 0 / 19%);
			border-radius: 1rem;
			border: transparent;
		}

		.bxadj {
			width: 100vh;
			background-color: #ddd;
		}

		.iadj {
			border: 1px solid black;
		}
	</style>
</head>

<body class="bxadj">
	<?php
	include("header1.php");
	include("link.php");
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container" style="margin-top: 40px;">

		</div>
		<!-- /.container -->
	</nav>
	<br />

	<div class="adj">
		<center>
			<b style="color:black; font-size: 1.5rem;">Cake With Name</b><br>
			<br>
			<?php

			?>

			<div id="img">
				<img src="Create_Image/<?php echo $newimage ?>" style="border-radius:10px; height: 300px; width: 300px;" />

			</div>
			<br /><br />
			<form method="post">
				<!--Image Upload:<input type="file" name="userfile" required="required" class="btn btn-primary"/><br>-->
				Name : <input type="text" name="txt_cname" class="iadj" value="<?php echo $c_name ?>" /><br /><br />
				Lable Right : <input type="number" class="iadj" name="txt_right" value="<?php echo $right ?>" /><br /><br />
				Lable Bottom : <input type="number" class="iadj" name="txt_bottom" value="<?php echo $bottom ?>" /><br /><br />
				Lable Rotate : <input type="number" class="iadj" name="txt_rotate" value="<?php echo $rotate ?>" /><br /><br />
				Delivery Date : <input required class="iadj" type="date" name="txt_deldate" id="shootdate" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>" required /><br /><br />
				<input type="submit" class="btn btn-primary" name="btn_submit_cake" value="Order" />
				<input type="submit" class="btn btn-primary" name="btn_reset" value="Reset Lable" />
				<input type="submit" class="btn btn-primary" name="btn_submit" value="Submit" />

			</form><br /><br />
		</center>
	</div>
</body>

</html>