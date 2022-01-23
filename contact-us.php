<?php include "inc/header.php"; ?>
	 <div id="contact-page" class="container">
    	<div class="bg">...
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
					             
					        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group  col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                             <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p style="color:#088B99;">Faridpurshop</p>
	    					<p>Faridpur City</p>
							<p>Faridpur,Dhaka,Bangladesh</p>
							<p>Mobile: +88017 70 99 99 70</p>
							<p>Email: faridpurshop78@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="http://www.facebook.com/faridpurshop" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="http://www.twitter.com/faridpurshop" target="_blank"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="http://plus.google.com/u/0/101005543464037571908" target="_blank"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="http://www.youtube.com/channel/UCcQgeTj69UJQdEVA1fNanyQ" target="_blank"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
<?php include "inc/footer.php"; ?>
