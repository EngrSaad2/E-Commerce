<section id="imgslider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#imgslider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#imgslider-carousel" data-slide-to="1"></li>
							<li data-target="#imgslider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
						
						
						<div class="item active">
								<?php
									$getsliderf=$sl->getsliderf();
									if($getsliderf){
										while ($result=$getsliderf->fetch_assoc()) {
											?>
												<div class="col-sm-6">
													<h1><span>U</span>ttara Shop</h1>
													<h2>Online Shop For IUBAT Students</h2>
													<h3>Productname: <?php echo $result['productname'];?></h3>
													<h4>Productcode: <?php echo $result['productcode'];?></h4>
													<h5>Price: <?php echo $result['productprice'];?> Tk</h5>
												</div>
												<div class="col-sm-6">
													<img src="fashop/<?php echo $result['image']; ?>"  class="girl img-responsive" alt="" />
												</div>
											<?php
										}
									}
								?>
							</div>
							<div class="item">
								
							<?php
								$getsliderf=$sl->getsliders();
								if($getsliderf){
									while ($result=$getsliderf->fetch_assoc()) {
										?>
											<div class="col-sm-6">
												<h1><span>I</span>UBAT Shop</h1>
												<h2>Online Shopping For IUBAT Students</h2>
												<h3>Productname: <?php echo $result['productname'];?></h3>
													<h4>Productcode: <?php echo $result['productcode'];?></h4>
													<h5>Price: <?php echo $result['productprice'];?></h5>
											</div>
											<div class="col-sm-6">
												<img src="fashop/<?php echo $result['image']; ?>" height="400" width="400"  class="girl img-responsive" alt="" />
											</div>
										<?php
									}
								}
							?>
							</div>
							
							<div class="item">
								<?php
									$getsliderf=$sl->getslidert();
									if($getsliderf){
										while ($result=$getsliderf->fetch_assoc()) {
											?>
												<div class="col-sm-6">
													<h1><span>F</span>aridpurshop</h1>
													<h2>Online Shopping In Faridpur City</h2>
													<h3>Productname: <?php echo $result['productname'];?></h3>
													<h4>Productcode: <?php echo $result['productcode'];?></h4>
													<h5>Price: <?php echo $result['productprice'];?></h5>
												</div>
												<div class="col-sm-6">
													<img src="fashop/<?php echo $result['image']; ?>" height="400" width="400"  class="girl img-responsive" alt="" />
												</div>
											<?php
										}
									}
								?>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->