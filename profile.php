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
				<div class="col-md-6">
					<table class="table table-striped  table-bordered">
					<?php
						$cid=Session::get('cusid');
						$getuserpro=$cmr->getuserpro($cid);
						if($getuserpro){
							while ($result=$getuserpro->fetch_assoc()) {
								?>
						<tr>
							<td colspan="3" align="center"><h2>Your Profile</h2></td>
						</tr>
						<tr>
							<td width="20%">Name</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['name']; ?></td>
						</tr>
						<tr>
							<td width="20%">City/Village</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['city']; ?></td>
						</tr>
						<tr>
							<td width="20%">Zilla</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['zilla']; ?></td>
						</tr>
						<tr>
							<td width="20%">Thana</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['thana']; ?></td>
						</tr>
						<tr>
							<td width="20%">Post Office</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['post']; ?></td>
						</tr>
						<tr>
							<td width="20%">Address</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['address']; ?></td>
						</tr>
						<tr>
							<td width="20%">Email</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['email']; ?></td>
						</tr>
						<tr>
							<td width="20%">Mobile</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['mobile']; ?></td>
						</tr>
						<tr>
							<td colspan="3"><a class="upd" href="updatepro.php">Update Details</a></td>
						</tr>
							<?php
							}
						}
					?>
					</table>
					
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	
	<?php include "inc/footer.php"; ?>