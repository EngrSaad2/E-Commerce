<?php 
ob_start();
include "lib/session.php";
 ?> 
<?php

 session::init();
 include 'config/config.php';
 include 'lib/database.php';
 include 'helpers/format.php';
 spl_autoload_register(function($class_name){
	 	include "class/".$class_name.".php";
	 });
 $db=new database;
 $fm=new format();
 $pd=new product();
 $ct=new cart();
 $cat=new category();
 $brand=new brand();
 $cmr=new customer();
 $sl=new slider();
 $pt=new partner();

?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <meta name="language" content="English">
     <meta name="description" content="It is a online shopping website">
     <meta name="keywords" content="<?php echo KEYWORDS;  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> IUBAT Shop | <?php echo $fm->title();  ?></title>
     <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="css/multizoom.css" type="text/css" />
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	 <script src="js/jquery.min.js"></script>
	 <script src="js/jquery-ui.min.js"></script>
	 <script src="js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>
	 <script type="text/javascript" src="js/multizoom.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link href="icon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
     <script type="text/javascript">
	jQuery(document).ready(function($){
		
			$('#image2').addimagezoom({
		zoomrange: [3, 10],
		magnifiersize: [300,400],
		magnifierpos: 'right',
		cursorshade: true,
	}); // single image zoom with default options
	var getoutput=$("#state");
	  		var getslider=$("#slider");
	  		getslider.slider({
	  			range:true,
	  			min:100,
	  			max:5000,
	  			values:[200,800],
	  			slide:function(event,ui){
				getoutput.html(ui.values[0] + "-" + ui.values[1]+"Taka");
				$("#minvalue").val(ui.values[0]);
				$("#maxvalue").val(ui.values[1]);
			}
		});
	  		getoutput.html(getslider.slider("values",0)+"-"+getslider.slider("values",1)+"Taka");
	  		$("#minvalue").val(getslider.slider('values',0));
			$("#maxvalue").val(getslider.slider('values',1));

			 var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 0,
              $AutoPlaySteps: 4,
              $SlideDuration: 2500,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 140,
              $Cols: 12
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1300);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
	
	});

</script>

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +8801904654712</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> raselhasandurjoy@gmail.com</a></li>
							</ul>
						</div>
					</div>
                    
                   <div class="col-sm-4"> 
                   
                   </div>
                    
                  
					<div class="col-sm-4">
						<div class="search_box pull-left">
							<form action="search.php" method="GET">
								<input type="text" name="search" placeholder="Search"/>
							</form>
						</div>
						<div class="h_cart pull-right">
							<i class="fa fa-shopping-cart"></i> Cart
							<?php
							$getdata=$ct->checkcart();
							if($getdata){
								$gtotal=Session::get('gtotal');
								echo '('.$gtotal.' Tk)';
							}
							else{
								echo '(empty)';
							}	
							?>
						</div>
                     </div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/faridpurshoplogo.png" class="imgresponsive logo2" alt="faridpurshop" /></a>
						</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						  <div class="navbar-header">
		                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>                  
		                </div>
						<div class="mainmenu">
						 <div class="collapse navbar-collapse">
							 <nav>
							<ul class="nav navbar-nav navbar-right">
							 <?php 
					            $path=$_SERVER['SCRIPT_FILENAME'];
					            $currentpage=basename($path,'.php');
					            ?>
								<li class="menu"><a href="index.php" <?php if($currentpage=='index') echo 'class=active'; ?>>Home</a></li>
								<li class="dropdown menu"><a href="#">Men<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    <?php
                                    	$getcatmenu=$cat->getcatmen();
                                    	if($getcatmenu){
                                    		while ($result=$getcatmenu->fetch_assoc()) {
                                    			?>
                                    			<li><a href="probycat.php?pro=<?php echo $result['catid'] ?>"><?php echo $result['catname'] ?></a></li>
                                    			<?php
                                    		}
                                    	}
                                    ?>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Women<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php
                                    	$getcatmenu=$cat->getcatwmen();
                                    	if($getcatmenu){
                                    		while ($result=$getcatmenu->fetch_assoc()) {
                                    			?>
                                    			<li><a href="probycat.php?pro=<?php echo $result['catid'] ?>"><?php echo $result['catname'] ?></a></li>
                                    			<?php
                                    		}
                                    	}
                                    ?>
                                    </ul>
                                </li>  
								<li><a <?php if($currentpage=='kids') echo 'class=active'; ?> href="kids.php">Kids</a></li>
								<li><a href="gift.php">Gift</a></li> 
								<?php
									$getdata=$ct->checkcart();
										if($getdata){
										?>
									<li><a <?php if($currentpage=='cart') echo 'class=active'; ?> href="cart.php">Cart</a></li>
									<li><a <?php if($currentpage=='payment') echo 'class=active'; ?> href="payment.php">Payment</a></li> 
									<?php
								}
								?>
								<?php
								$cid=Session::get('cusid');
									$getdata=$ct->checkorder($cid);
										if($getdata){
										?>
									<li class="menu"><a <?php if($currentpage=='order') echo 'class=active'; ?> href="orderdetails.php">Order</a></li>
									<?php
								}
								?>
								<?php
								$login=Session::get('cuslogin');
								if($login==true){
									?>
									<li class="menu"><a <?php if($currentpage=='profile') echo 'class=active'; ?> href="profile.php"> <?php  echo session::get('cusname'); ?></a></li>
									<?php
								}
								?>
								
								<li class="menu"><a <?php if($currentpage=='contact-us') echo 'class=active'; ?> href="contact-us.php">Contact</a></li>
									<?php
									if(isset($_GET['cid'])){
										$deldata=$ct->delcartdata();
										Session::destory();
									}
									$login=Session::get('cuslogin');
									if($login==false){?>
										<li><a <?php if($currentpage=='login') echo 'class=active'; ?> href="login.php">Login</a></li>
										<?php
									}
									else{
										?>
										<li class="menu"><a href="?cid=<?php Session::get('cusid'); ?>">Logout</a></li>
										<?php
									}
								?>
							</ul>
							</nav>
							</div>
						</div>
					</div>
					
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->