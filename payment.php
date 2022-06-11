<?php
include("connection.php");
include("session.php");
$apikey = "rzp_test_ruMt6O5yervk3b";

$b1="select * from customer_purchase";
$r=mysqli_query($conn,$b1);
$cn = $_REQUEST['cus_name'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <title>Document</title>
</head>
<body>
    
<form action="success.php" method="POST">
    <script
src="https://checkout.razorpay.com/v1/checkout.js"
data-key="<?php echo $apikey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
data-amount="100" 
data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
data-id="<?php echo 'OID'.rand(10,100).'END'; ?>"
data-buttontext="Pay with Razorpay"
data-name="Cake Studio"
data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
data-image="https://example.com/your_logo.jpg"
data-prefill.name="<?php echo $cn; ?>"
data-prefill.email="<?php echo $cn; ?>"
data-prefill.contact="<?php echo $cn; ?>"
    data-theme.color="#F3754"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

