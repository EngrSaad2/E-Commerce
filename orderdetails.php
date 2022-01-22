<?php include "inc/header.php"; ?>
<?php
	$login=Session::get('cuslogin');
	if($login==false){
		header("Location:login.php");
	}
?>
<?php
  if(isset($_GET['confrim'])){
	$confrim=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['confrim']);
	$confrim=$ct->uporderbyid($confrim);
    }
    $cid=Session::get('cusid');
	$getdata=$ct->checkorder($cid);
	if(!$getdata){
		header("Location:index.php");
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
							<td class="description">Name</td>
							<td>Code</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td>Date</td>
							<td>Order Code</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$cid=Session::get('cusid');
						$getpro=$ct->getorderpro($cid);
						if($getpro){
							$i=1;
							while ($result=$getpro->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td class="cart_product">
								<img src="fashop/<?php echo $result['image']; ?>" height="50" width="50" alt="faridpurshop" />
							</td>
							<td class="cart_description">
								<h4><?php echo $result['productname']; ?></h4>
							</td>
							<td><?php echo $result['productcode']; ?></td>
							<td class="cart_price">
								<p><?php echo $result['price']; ?> Tk</p>
							</td>
							<td class="cart_quantity">
								<?php echo $result['quantity']; ?>
							</td>
							<td><?php echo $fm->formatdate($result["dat"] ); ?></td>
							<td><?php echo $result['ordercode']; ?></td>
							<td><?php
								if($result['status']==0){
									echo "Pending";
								}
								else{
									echo "Shifted";
								}
							?>
							<td class="cart_delete">
							<?php
								if($result['status']==1){ ?>
									<a class="cart_quantity_delete" onclick='return confirm("Are you sure to get this order?");' href="?confrim=<?php echo $result['orderid']; ?>">Confirm</a>
								<?php }
								else{
									echo "N/A";
								}
							?>
								
							</td>
						</tr>
								<?php
							}
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<?php include "inc/footer.php"; ?>
