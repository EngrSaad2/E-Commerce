<?php include "../lib/session.php"; ?>
<?php ob_start(); ?>
 <?php include "../config/config.php"; ?>
<?php include "../lib/database.php"; ?>
<?php include "../helpers/format.php"; ?>
 <?php include '../class/adminlogin.php'; ?>
 <?php 
    $al=new adminlogin();
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $adminuser=$_POST['username'];
      $adminpassword=md5($_POST['password']);
      $loginchk=$al->adminlogin($adminuser,$adminpassword);
    }
 ?>
<!DOCTYPE html>
<html>
  <head>
      <title></title>
      <link href="css/style.css" type="text/css" rel="stylesheet" />
      <!--<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet" />-->
  </head>
  <body>
   <div class="main">
        <form class="login" method="post" >
            <p class="title">Admin Login</p>
            <span class="msg"><?php if(isset($loginchk)){echo $loginchk;}?></span>
            <input class="in" type="text" name="username" placeholder="Type your username..." />
            <input class="in" type="password" name="password" placeholder="Type password..." />
            <input class="sub" type="Submit" value="Log In" /> 
        </form>
      </div>
  </body>
</html>