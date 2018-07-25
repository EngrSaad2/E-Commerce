<?php include "inc/header.php"; ?>
<?php
  if(isset($_GET['delcart'])){
	$delcart=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcart']);
	$delcart=$ct->delcartbyid($delcart);
    }
 if($_SERVER['REQUEST_METHOD']=='POST'){
        $quentity=$_POST['quentity'];
        $cartid=$_POST['cartid'];
        $updatecart=$ct->updatecart($quentity,$cartid);
        if($quentity<=0){
        	$delcart=$ct->delcartbyid($cartid);
        }
    } 
    if(!isset($_GET['id'])){
    	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
    }
?>

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td width="2%">Sl</td>
							<td class="image">Item</td>
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
							<td class="cart_product">
								<a href=""><img src="fashop/<?php echo $result['image']; ?>" height="50" width="50" alt="Saad"></a>
							</td>
							<td class="cart_description">
								<h4><?php echo $result['productname']; ?></h4>
								<p>Product ID: <?php echo $result['productcode']; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $result['price']; ?> Tk</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form method="POST">
									<input type="hidden" name="cartid" value="<?php echo $result['cartid'] ?>" autocomplete="off">
									<input max='6' min='1' class="cart_quantity_input updateq" type="number" name="quentity" value="<?php echo $result['quantity'] ?>" autocomplete="off">
									<input type="submit" name="submit" class="up" value="Update" />
									</form>
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
							<td class="cart_delete">
								<a class="cart_quantity_delete" onclick='return confirm("Are you sure to delete this?");' href="?delcart=<?php echo $result['cartid']; ?>"><i class="fa fa-times"></i></a>
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
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container ">
				<div class="col-sm-12">
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
					else{
							header("Location:index.php");
					}
						?>	<a class="btn btn-default update" href="index.php">Continue Shopping</a>
							<a class="btn btn-default check_out" href="payment.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
<?php include "inc/footer.php"; ?>