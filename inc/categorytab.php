		<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
								<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
								<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
								<li><a href="#kids" data-toggle="tab">Kids</a></li>
								<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
							</ul>
						</div>
						<div class="tab-content">
						<div class="tab-pane fade active in" id="tshirt" >
						<?php
						$getactivepro=$pd->getactivepro();
							if($getactivepro){
								while($result=$getactivepro->fetch_assoc()){
									?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="fashop/<?php echo $result['fontimg'];?>" height="250" width="200" alt="" />
												<h2><?php echo $result['productprice'];?> Tk</h2>
												<p><?php echo $result['productname'];?></p>
												<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php
							}
							}
							else{
								echo '<span style="text-align:center;margin-left:400px;color:red;font-size:20px;"><p>No Item Found</p></span>';
								}?>
							</div>
							
							<div class="tab-pane fade" id="blazers" >
					<?php
						$getactivepro=$pd->getblazers();
							if($getactivepro){
								while($result=$getactivepro->fetch_assoc()){
									?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="fashop/<?php echo $result['fontimg'];?>" height="250" width="200" alt="" />
												<h2><?php echo $result['productprice'];?> Tk</h2>
												<p><?php echo $result['productname'];?></p>
												<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php
							}
							}else{
								echo '<span style="text-align:center;margin-left:400px;color:red;font-size:20px;"><p>No Item Found</p></span>';
								}?>
							</div>
							
							<div class="tab-pane fade" id="sunglass" >
						<?php
						$getactivepro=$pd->getsunglass();
							if($getactivepro){
								while($result=$getactivepro->fetch_assoc()){
									?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="fashop/<?php echo $result['fontimg'];?>" height="250" width="200" alt="" />
												<h2><?php echo $result['productprice'];?> Tk</h2>
												<p><?php echo $result['productname'];?></p>
												<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php
							}
							}else{
								echo '<span style="text-align:center;margin-left:400px;color:red;font-size:20px;"><p>No Item Found</p></span>';
								}?>
							</div>
							
							<div class="tab-pane fade" id="kids" >
						<?php
							$getactivepro=$pd->getkids();
								if($getactivepro){
									while($result=$getactivepro->fetch_assoc()){
										?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="fashop/<?php echo $result['fontimg'];?>" height="250" width="200" alt="" />
													<h2><?php echo $result['productprice'];?> Tk</h2>
													<p><?php echo $result['productname'];?></p>
													<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
												</div>
												
											</div>
										</div>
									</div>
									<?php
								}
								}else{
									echo '<span style="text-align:center;margin-left:400px;color:red;font-size:20px;"><p>No Item Found</p></span>';
									}?>
							</div>
							
							<div class="tab-pane fade" id="poloshirt" >
								<?php
									$getactivepro=$pd->getpoloshirt();
										if($getactivepro){
											while($result=$getactivepro->fetch_assoc()){
												?>
											<div class="col-sm-3">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="fashop/<?php echo $result['fontimg'];?>" alt="" />
															<h2><?php echo $result['productprice'];?> Tk</h2>
															<p><?php echo $result['productname'];?></p>
															<a href="details.php?prodet=<?php  echo $result['productid'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
														</div>
														
													</div>
												</div>
											</div>
											<?php
										}
										}else{
											echo '<span style="text-align:center;margin-left:400px;color:red;font-size:20px;"><p>No Item Found</p></span>';
									}?>
							</div>
						</div>
					</div><!--/category-tab-->