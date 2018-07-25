<?php include "inc/header.php"; ?>
<?php include_once "../class/brand.php"; ?>
<?php
    $brand=new brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brandname=$_POST['brandname'];
        $insertbrand=$brand->insertbrand($brandname);
    } 
?>
<?php include "inc/sidebarleft.php"; ?>           
<div class="sidebar_right">
    <div class="sr_title">
       Category  <span style="text-align: center; margin-left: 300px;"><?php if(isset($insertbrand)){echo $insertbrand;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST"> 
            <table class="table">
                <tr>
                    <td>Brand Name<span style="padding:0px; margin-left:50px;"><input type="text" name="brandname" placeholder="Type your brandname" id="form"  class="form-control" /></span></td>
                </tr>
                </tr>
                 <tr>
                    <td><span style="padding:0px; margin-left:130px; "><input type="submit" name="submit" value="Save" id="form"  class="form-control" required /></span></td>
                </tr>
            </table>
        </form>
    </div>
    </div>
</div>

 <?php include"inc/footer.php"; ?>