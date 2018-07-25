<?php
    $partner=new partner();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sub'])){
        $insertsub=$partner->insertsub($_POST);
    } 
?>
<footer id="footer">
<div class="panel-footer text-center foterfull">
   <div class="container">
    		<h2 class="textcolor"> Our Partner </h2>
            <div class="row" style="margin-left:auto; margin-right:auto;">
           <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1170px; height: 100px; background:transparent; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('fashop/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1170px; height: 100px; overflow: hidden;">
        <?php
          $getpartner=$pt->getallpartner();
          if($getpartner){
            while ($result=$getpartner->fetch_assoc()) {
              ?>
               <div style="display: none;">
                <img data-u="image" src="fashop/<?php echo $result['image'];  ?>" />
            </div>
              <?php
            }
          }
        ?>
           
            <!-- 
            <div style="display: none;">
                <img data-u="image" src="img/android.jpg" />
            </div>
            <a data-u="any" href="http://www.jssor.com" style="display:none">Scrolling Logo Thumbnail Slider</a>-->
        </div>
    </div>
            
            </div>
        </div>
    </div>

	<div class="panel-footer text-center foterfull">
    	<div class="container">
        		<div class="row text-left">
                	 <div class="col-sm-4 textcolor">
                     		<h2> Contacts Us </h2>
                            	<i class="fa fa-phone"> +8801985796007 </i>  <br/>
                           		<i class="fa fa-envelope"> admin@faridpurshop.com </i> <br/>
                                <i class="fa fa-map-marker"> Faridpur, Dhaka, Bangladesh </i> 
                                <img class="img-responsive faridpurshoplogo" src="images/home/faridpurshop.png" alt="faridpurshop" width="250px">  
                   </div>
							
                     
                      
                       <div class="col-sm-4">
                     			<h2 class="textcolor"> Social Media </h2>
                               
                                
                                <a href=" http://m.me/faridpurshop"><i class="fa fa-facebook socialincon"></i></a>  
                                 <a href="https://facebook.com/faridpurshop"><i class="fa fa-facebook-official socialincon"></i></a> 
                                 
                                  
                                 <a href="https://twitter.com/faridpurshop"><i class="fa fa-twitter socialincon"></i></a> 
                                 
                                 <br/> 
                                 <a href="https://linkedin.com/in/faridpurshop"><i class="fa fa-linkedin socialincon"></i></a>
                                 
                                   
                                  <a href="https://plus.google.com/u/0/101005543464037571908"><i class="fa fa-google-plus-official socialincon"></i></a>  
                                   <a href="https://www.youtube.com/channel/UCcQgeTj69UJQdEVA1fNanyQ"><i class="fa fa-youtube socialincon"></i></a>  <br/>
                                    
                     
                      </div>
                       <div class="col-sm-4">
                     			<h2 class="textcolor"> ABOUT SHOPPER </h2>
                                 <form class="form-horizontal" method="POST">
                                 <div class="form-group">
         
                                	 <input type="email" class="form-control " id="email" placeholder="Enter email" name="email"><br />
                                   
                                   
                                	 <button type="submit" name="sub" class="btn ">Submit</button> 
                                     
                                   </div> 
                                 </form>
                                 <p class="footertext textcolor">Get the most recent updates from </br>
								our site and be updated your self..</p>
                        </div>
     					
                    
                      </div>
                    </div>
                </div>
                <div class="panel-footer lasttext">
                <div class="container">
                <div class="row rowtext">
                          <div class="col-sm-6">
                          <span> &copy; <?php echo date('Y'); ?> <a href="http://faridpurshop.com/">FARIDPURSHOP.COM </a>   All rights reserved.</span>
                          
                          </div>
                          <div class="col-sm-6">
                          	  <span> Developed by  <a href="https://www.facebook.com/faridpurshop"> <strong>TeamFaridpurshop </strong></a>   </span>
                          
                          </div>
                      
                </div>
              </div> 
            </div>
    </footer>
      <script src="js/jquery.min.js"></script>
  <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>     