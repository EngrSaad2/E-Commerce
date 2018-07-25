				<div class="col-sm-3">
					<div class="left-sidebar">
					<!--price-range-->
						<div class="price-range">
							<h2>Price Range:</h2><span id="state"></span>
							<div id="slider"></div>
							<div class="well text-center">
								<form action="price.php" method="POST">
									<input type="hidden" name="minvalue" id="minvalue" />
									<input type="hidden" name="maxvalue" id="maxvalue" />
									<input class="pricebuttom" name="pricesearch" type="submit" value="FILTER" />
								 </form>
							</div>
						</div><!--/price-range-->
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<!-- <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="men.php">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div> -->
<!-- 							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div> -->
							<?php
                            	$getcatmenu=$cat->getcatmenu();
                            	if($getcatmenu){
                            		while ($result=$getcatmenu->fetch_assoc()) {
                            			?>
                            			<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a href="probycat.php?pro=<?php echo $result['catid'] ?>"><?php echo $result['catname'] ?></a></h4>
											</div>
										</div>
                            			<?php
                            		}
                            	}
                            ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php
                            	$getbrand=$brand->getbrand();
                            	if($getbrand){
                            		while ($result=$getbrand->fetch_assoc()) {
                            			?>
                            			<li><a href="probybrand.php?pro=<?php echo $result['brandid'] ?>"><?php echo $result['brandname'] ?> </a></li>
                            			<?php
                            		}
                            	}
                            ?>
								</ul>
							</div>
						</div><!--/brands_products-->
					
						<!--shipping-->
						<!-- <div class="shipping text-center">
							<img src="images/home/shipping.jpg" alt="" />
						</div> --><!--/shipping-->
					
					</div>
				</div>
				