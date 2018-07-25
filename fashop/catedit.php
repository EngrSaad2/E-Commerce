<?php include "inc/header.php"; ?>
<?php include "../class/category.php"; ?>
<?php
    if(!isset($_GET['catid'])|| $_GET['catid']==null){
        header("Location:showcat.php");
    }
    else{
        $catid=$_GET['catid'];
    }
    $cat=new category();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $category=$_POST['category'];
        $cattype=$_POST['cattype'];
        $updatecat=$cat->updatecat($category,$cattype,$catid);
    } 
?>
<?php include "inc/sidebarleft.php"; ?>           
<div class="sidebar_right">
    <div class="sr_title">
       Update Category  <span style="text-align: center; margin-left: 350px;"><?php if(isset($updatecat)){echo $updatecat;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST"> 
            <table class="table">
            <?php 
                $getcat=$cat->getcatbyid($catid);
                if($getcat){
                    while($result=$getcat->fetch_assoc()){
                        ?>
                        <tr>
                            <td>Category Name<span style="padding:0px; margin-left:30px;"><input type="text" name="category" value="<?php echo $result['catname']; ?>" id="form"  class="form-control" /></span></td>
                        </tr>
                        <tr>
                            <td>Category Type<span style="padding:0px; margin-left:30px;"><input type="text" name="cattype" value="<?php echo $result['cattype']; ?>" id="form"  class="form-control" /></span></td>
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