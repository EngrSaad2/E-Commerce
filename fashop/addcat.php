<?php include "inc/header.php"; ?>
<?php include "../class/category.php"; ?>
<?php
    $cat=new category();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $category=$_POST['category'];
        $cattype=$_POST['cattype'];
        $insertcat=$cat->insertcat($category,$cattype);
    } 
?>
<?php include "inc/sidebarleft.php"; ?>           
<div class="sidebar_right">
    <div class="sr_title">
       Category  <span style="text-align: center; margin-left: 350px;"><?php if(isset($insertcat)){echo $insertcat;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST"> 
            <table class="table">
                <tr>
                    <td>Category Name<span style="padding:0px; margin-left:30px;"><input type="text" name="category" placeholder="Type your category" id="form"  class="form-control" /></span></td>
                </tr>
                <tr>
                    <td>Category Type<span style="padding:0px; margin-left:30px;"><input type="text" name="cattype" placeholder="Type your category type" id="form"  class="form-control" /></span></td>
                </tr>
                 <tr>
                    <td><span style="padding:0px; margin-left:130px; "><input type="submit" name="submit" value="Save"  id="form"  class="form-control" required /></span></td>
                </tr>
            </table>
        </form>
    </div>
    </div>
</div>

 <?php include"inc/footer.php"; ?>