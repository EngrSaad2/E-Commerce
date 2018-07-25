<?php include "inc/header.php"; ?>
	
<?php include "inc/slider.php"; ?>
	
	<section>
		<div class="container">
			<div class="row"><!-- category -->
				<?php include "inc/category.php"; ?><!--end category -->
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Latest Items</h2>
						<?php 
						$getkpd=$pd->getkproduct();
						if($getkpd){
							while($result=$getkpd->fetch_assoc()){
								
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
						else{
							echo '<span style="text-align:center;margin-left:400px;color:red;font-size:20px;"><p>No Item Found</p></span>';
						}
							?>
						
					</div><!--features_items-->
					<!--category tab-->
					<?php include "inc/categorytab.php"; ?>
					<!--end category tab-->
					<!--recommended_items-->
					<?php include "inc/recomand.php"; ?>
					<!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include "inc/footer.php"; ?>