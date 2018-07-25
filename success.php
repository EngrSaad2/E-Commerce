<?php include "inc/header.php"; ?>
<?php
	$login=Session::get('cuslogin');
	if($login==false){
		header("Location:login.php");
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 text-center">
		<div class="success">
			<h2>Success</h2>
			<p>Thanks for Purchase. Receive Your Order Successfully. We will contact you ASAP with delivery details. Here is your order details...<a href="orderdetails.php">Visit Here</a></p>
		</div>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>
<?php include "inc/footer.php"; ?>