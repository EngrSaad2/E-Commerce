<?php include "inc/header.php"; ?>
<?php
	$login=Session::get('cuslogin');
	if($login==true){
		header("Location:orderdetails.php");
	}
?>
	 <?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $custoreg=$cmr->custoreg($_POST);
    } 
    ?>
     <?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
        $custologin=$cmr->custologin($_POST);
    } 
    ?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>
						<?php if(isset($custologin)){ echo $custologin;} 
							else{
								echo 'Login to your account';
							}
						?>
						</h2>
						<form  method="POST">
							<input type="email" name="email" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Password" />
							<button type="submit" class="btn btn-default" name="login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<h2 class="nh2">
				<?php if(isset($custoreg)){ echo $custoreg;} 
					else{
						echo 'New User Signup!';
					}
				?>
				</h2>
				<div class="col-sm-3">
					<div class="signup-form"><!--sign up form-->
						<form method="POST">
							<input type="text" name="name" placeholder="Name" required />
							<input type="text" name="city" placeholder="City/Village" required />
							<input type="text" name="thana" placeholder="Thana"/>
							<input type="email" name="email" placeholder="Email Address" required />
							<input type="password" name="password" placeholder="Password" required />
						
					</div>
				</div>
				<div class="col-sm-3">
					<div class="signup-form">
							<input type="text" name="address" placeholder="Home Area/Address" required />
							<input type="text" name="zilla" placeholder="Zilla" required />
							<input type="text" name="post" placeholder="Post Office" required/>
							<input type="text" name="mobile" placeholder="Mobile" required/>
							<button type="submit" name="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	<?php include "inc/footer.php"; ?>