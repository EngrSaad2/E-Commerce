<?php include "../config/config.php"; ?>
<?php include "../lib/database.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php
ob_start();
 include "../lib/session.php"; 
 session::checksession();

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
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="It is a website about education">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
         <script src="js/jquery.min.js" type="text/javascript" ></script>
         <script src="js/jquery-2.1.4.min.js" type="text/javascript" ></script>
        <script src="js/bootstrap.min.js" type="text/javascript" ></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript" ></script>
        <script src="js/dataTables.bootstrap.min.js" type="text/javascript" ></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- CKEditor Start -->
      <script src="tinymce/js/tinymce/tinymce.dev.js"></script>

    <!-- // CKEditor End -->
    <!-- Fancybox jQuery -->
    <!-- <script type="text/javascript" src="../fancybox/jquery-1.9.0.min.js"></script> -->
    <script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="../fancybox/main.js"></script>
    <link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox.css" />
    <!-- //Fancybox jQuery -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="main">
            <div class="header">
                <div class="h_left">
                    <div class="h_img"><img src="img/icon.ico" class="h_img2"></div>
                    <div class="h_txt">FARIDPUR SHOP</div>
                    <div class="h_txt2">Online shopping in Faridpur city</div>

                </div>
                 <div class="h_right">
                        <a  style="margin-right:5px; color:#ffffff; font-size: 18px; " href="adminpro.php"><span class="glyphicon glyphicon-user"></span> <?php echo session::get('adminuser'); ?></a><span style="font-size: 18px; color: #ffffff;">|</span> 
                         <?php
                           if(isset($_GET["action"]) && $_GET["action"]=='logout' ){
                              session::destory();

                           }
                           ?>
                         <a style=" color:#ffffff;font-size: 18px;" href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </div>
            </div>
            <div class="menu">           
                   <ul>
                        <li><a href="index.php"><span class="glyphicon glyphicon-signal"></span> Dashbord</li>
                        <li><a href="user.php"><span class="glyphicon glyphicon-edit"></span> User Profile</li>
                        <li><a href="changepass.php"><span class="glyphicon glyphicon-lock"></span> Change Password</li>
                        <li><a href="inbox.php"><span class="glyphicon glyphicon-envelope"></span> Inbox
                        <?php
                        $db=new database();
                         $query="SELECT * FROM tbl_order WHERE status='0' ORDER BY orderid DESC";
                        $msg=$db->select($query);
                        if($msg){
                            $count=mysqli_num_rows($msg);
                            echo "(".$count.")";
                        }
                        else{
                            echo "(0)";
                        }
                        ?>
                        </li>
                        <li><a href="../index.php"><i class="fa fa-globe"></i> Visit Website </a></li>
                   </ul> 
            </div>