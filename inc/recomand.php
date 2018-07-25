					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									 <?php 
											$getrpd=$pd->getrproduct();
											if($getrpd){
											while($result=$getrpd->fetch_assoc()){
											?>
		
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="fashop/<?php echo $result['fontimg']; ?>" alt="faridpurshop" height="250" width="200" />
												<h2><?php echo $result['productprice']; ?></h2>
												<p style="color: #5CB2BC;"><?php echo $result['productname']; ?></p>
												<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
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
								for($i=0;$i<=3;$i++){
									?>
								<div class="item">	
									<?php 
										$getrpd=$pd->getrproduct();
										if($getrpd){
										while($result=$getrpd->fetch_assoc()){
										?>
	
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="fashop/<?php echo $result['fontimg']; ?>" alt="faridpurshop" height="230" width="200" />
											<h2><?php echo $result['productprice']; ?></h2>
											<p style="color: #5CB2BC;"><?php echo $result['productname']; ?></p>
											<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
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
								?>
							</div>
							 <!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>		 -->	
						</div>
					</div>