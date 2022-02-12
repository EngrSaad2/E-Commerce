<?php include "inc/header.php"; ?>
<?php
	 if(!isset($_GET['prodet'])|| $_GET['prodet']==NULL){
      header("Location:404.php");
    }
      else{
      	 $productid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['prodet']);
      }
      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['quan'])){
        $quentity=$_POST['quentity'];
        $addtocart=$ct->addtocart($quentity,$productid);
    } 
?>
	<section>
		<div class="container">
			<div class="row">
				<?php include "inc/category.php"; ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Description Product</h2>
						<?php 
						$getfpd=$pd->getprobyid($productid);
						if($getfpd){
							while($result=$getfpd->fetch_assoc()){
								
								?>
						<div class="col-sm-6">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="targetarea" style="border:1px solid #eee"><img
										<img id="image2" border="0"  src="fashop/image/black.jpg" alt="Shirt" style="width:250px;height:338px" /></div>

								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="product-image-wrapper">
								<div class="details_title text-center">
									Description
								</div>
								<div class="details">
									<table class="table">
										<tr>
											<td>Product Name  :</td>
											<td>Loream Ipsom</td>
										</tr>
										<tr>
											<td>Product Category :</td>
											<td><?php echo $result['catname']; ?></td>
										</tr>
										<tr>
											<td>Product Brand&nbsp;&nbsp; :</td>
											<td><?php echo $result['brandname']; ?></td>
										</tr>
										<tr>
											<td>Product Prize  :</td>
											<td><?php echo $result['productprice'].' Tk'; ?></td>
										</tr>
										<tr>
											<td>Product Code&nbsp; :</td>
											<td><?php echo $result['productcode'];?></td>
										</tr>
										<tr>
											<td>Product Size&nbsp;&nbsp; :</td>
											<td><?php echo $result['productsize']; ?></td>
										</tr>
									</table>
								</div>
								<div class="details_title text-center">
									<form method="POST">
										<input type="hidden" class="quentity" value="1" name="quentity" />
										<button class="btn btn-defult" name="quan" type="submit"> Add To Cart</button>
									</form>
								</div>
							</div>
						</div>
					<div class="col-sm-12">
						<div class="details_title text-center">
								 Product Description &amp; Delevery Role
						</div>
					</div>
						<div class="col-sm-12">
							<div class="description">
							<?php echo $result['description'] ?>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="details_title text-center">
								Relative Products
						</div>
					</div>
					<?php 
						$catid=$result['catid'];
						$getrepd=$pd->getrelpro($catid);
						if($getrepd){
							while($result=$getrepd->fetch_assoc()){
								
								?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="fashop/<?php echo $result['fontimg']; ?>" alt="faridpurshop" height="249" width="268" />
										<h2><?php echo $result['productprice']; ?></h2>
											<p style="color: #5CB2BC;"><?php echo $result['productname']; ?></p>
											<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $result['productprice']; ?></h2>
												<p style="color: red;"><?php echo $result['productname']; ?></p>
												<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
										</div>
									</div>
								</div>
							</div>
						</div>	
							<?php
							}
						}
					?>				
					</div>
					<?php
							}
						}
						?>
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include "inc/footer.php"; ?>
