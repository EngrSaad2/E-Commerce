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
 <?php
 if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
 	$cid=Session::get('cusid');
 	$orderinsert=$ct->orderinsert($cid);
 	$deldata=$ct->delcartdata($cid);
 	 header("Location:success.php");

 }
 
 ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td width="2%">Sl</td>
								<td class="description"></td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
						<?php
							$getpro=$ct->getcartpro();
							if($getpro){
								$i=1;
								$sum=0;
								while ($result=$getpro->fetch_assoc()) {
									?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td class="cart_description">
									<h4><?php echo $result['productname']; ?></h4>
								</td>
								<td class="cart_price">
									<p><?php echo $result['price']; ?> Tk</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<?php echo $result['quantity'] ?>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">
									<?php
									$total=$result['quantity']*$result['price'];
									echo $total;
									?> Tk
									</p>
								</td>
							</tr>
							<?php $sum=$sum+$total; 
							?>
									<?php
								}
							}
						?>
						</tbody>
					</table>
				<div class="total_area">
					<?php
					$getdata=$ct->checkcart();
					if($getdata){
					?>
						<ul>
							<li>Cart Sub Total <span><?php if(isset($sum)) {echo $sum;} ?> Tk</span></li>
							<li>Vat <span>0%</span></li>
							<li>Shipping Cost <span>50</span></li>
							<li>Total <span>
							<?php if(isset($sum)) {
								$gtotal=$sum+50;
								Session::set('gtotal',$gtotal);
								echo $gtotal;
							}
							 ?>
							 Tk</span></li>
						</ul>
						<?php
					}
					
						?>	<a class="btn btn-default update" href="index.php">Continue Shopping</a>
							<a class="btn btn-default check_out" href="?orderid=order">Order Now</a>
					</div>
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
			</div>
		</div>
	
	<?php include "inc/footer.php"; ?>