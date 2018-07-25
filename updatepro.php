<?php include "inc/header.php"; ?>
<?php
	$login=Session::get('cuslogin');
	if($login==false){
		header("Location:login.php");
	}
?>
 <?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    	$cid=Session::get('cusid');
        $custoproup=$cmr->custoproup($_POST,$cid);
    } 
    ?>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
				<form method="POST">
					<table class="table table-striped  table-bordered">
					<?php
						$cid=Session::get('cusid');
						$getuserpro=$cmr->getuserpro($cid);
						if($getuserpro){
							while ($result=$getuserpro->fetch_assoc()) {
								?>
						<tr>
							<td colspan="3" align="center"><h2><?php if(isset($custoproup)){echo $custoproup;} else{echo "Update Profile";} ?></h2></td>
						</tr>
						<tr>
							<td width="20%">Name</td>
							<td width="5%">:</td>
							<td width="75%"><input name="name" type="text" class="ipro"  value="<?php echo $result['name']; ?>" required /></td>
						</tr>
						<tr>
							<td width="20%">City/Village</td>
							<td width="5%">:</td>
							<td width="75%"><input type="text" name="city" class="ipro"  value="<?php echo $result['city']; ?>" required /></td>
						</tr>
						<tr>
							<td width="20%">Zilla</td>
							<td width="5%">:</td>
							<td width="75%"><input type="text" name="zilla" class="ipro"  value="<?php echo $result['zilla']; ?>" required /></td>
						</tr>
						<tr>
							<td width="20%">Thana</td>
							<td width="5%">:</td>
							<td width="75%"><input type="text" name="thana" class="ipro"  value="<?php echo $result['thana']; ?>" required /></td>
						</tr>
						<tr>
							<td width="20%">Post Office</td>
							<td width="5%">:</td>
							<td width="75%"><input type="text" name="post" class="ipro"  value="<?php echo $result['post']; ?>" required /></td>
						</tr>
						<tr>
							<td width="20%">Address</td>
							<td width="5%">:</td>
							<td width="75%"><input type="text" name="address" class="ipro"  value="<?php echo $result['address']; ?>" required /></td>
						</tr>
						<tr>
							<td width="20%">Mobile</td>
							<td width="5%">:</td>
							<td width="75%"><input type="text" name="mobile" class="ipro"  value="<?php echo $result['mobile']; ?>" required /></td>
						</tr>
						<tr>
							<td colspan="3" align="center"><button class="uppro" name="submit" type="submit">Save</button></td>
						</tr>
							<?php
							}
						}
					?>
					</table>
					</form>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	
	<?php include "inc/footer.php"; ?>