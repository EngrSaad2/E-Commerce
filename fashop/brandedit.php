<?php include "inc/header.php"; ?>
<?php include "../class/brand.php"; ?>
<?php
    if(!isset($_GET['brandid'])|| $_GET['brandid']==null){
        header("Location:showbrand.php");
    }
    else{
        $brandid=$_GET['brandid'];
    }
    $brand=new brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brandname=$_POST['brandname'];
        $updatebrand=$brand->updatebrand($brandname,$brandid);
    } 
?>
<?php include "inc/sidebarleft.php"; ?>           
<div class="sidebar_right">
    <div class="sr_title">
       Update Brand  <span style="text-align: center; margin-left: 350px;"><?php if(isset($updatebrand)){echo $updatebrand;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST"> 
            <table class="table">
            <?php 
                $getbrand=$brand->getbrandbyid($brandid);
                if($getbrand){
                    while($result=$getbrand->fetch_assoc()){
                        ?>
                        <tr>
                            <td>Brand Name<span style="padding:0px; margin-left:50px;"><input type="text" name="brandname" value="<?php echo $result['brandname']; ?>" id="form"  class="form-control" /></span></td>
                        </tr>
                        <tr>
                            <td><span style="padding:0px; margin-left:130px; "><input type="submit" name="submit" value="Update" id="form"  class="form-control" required /></span></td>
                        </tr>
                        <?php
                    }
                }
                
            ?>
            </table>
        </form>
    </div>
    </div>
</div>

 <?php include"inc/footer.php"; ?>