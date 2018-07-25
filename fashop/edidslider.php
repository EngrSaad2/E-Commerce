<?php include"inc/header.php"; ?>
<?php include"inc/sidebarleft.php"; ?> 
<?php include "../class/category.php"; ?> 
<?php include "../class/brand.php"; ?> 
<?php include "../class/slider.php"; ?> 
    <?php
     if(!isset($_GET['sliderid'])|| $_GET['sliderid']==null){
        header("Location:sliderlist.php");
    }
    else{
        $sliderid=$_GET['sliderid'];
    }
    $slider=new slider();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $sliderid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['sliderid']);
        $updateslider=$slider->updateslider($_POST,$_FILES,$sliderid);
    } 
    ?>
<div class="sidebar_right">
    <div class="sr_title">
       Update Product<span style="text-align: center; margin-left: 350px;"><?php if(isset($updateslider)){echo $updateslider;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST" enctype="multipart/form-data"> 
            <table class="table">
            <?php
            $getslider=$slider->getsliderbyid($sliderid);
            if($getslider){
                while($value=$getslider->fetch_assoc()){
                    ?>
                <tr>
                    <td>Product Name <span style="padding:0px; margin-left:30px;"><input type="text" name="productname" required value="<?php echo $value['productname']; ?> " id="form"  class="form-control"  /></span></td>
                </tr>
                 <tr>
                    <td>Product Price <span style="padding:0px; margin-left:30px;"><input type="text" name="productprice" required value="<?php echo $value['productprice']; ?> " id="form"  class="form-control"  /></span></td>
                </tr>
                <tr>
                    <td>Product Code <span style="padding:0px; margin-left:30px;"><input type="text" name="productcode" required value="<?php echo $value['productcode']; ?> " id="form"  class="form-control"  /></span></td>
                </tr>
                <tr>
                    <td>Product Size <span style="padding:0px; margin-left:30px;"><input type="text" name="productsize" required value="<?php echo $value['productsize']; ?> " id="form"  class="form-control"  /></span></td>
                </tr>
                 <tr>
                    <td>Product Category <span style="padding:0px; margin-left:30px;">
                    <select id="form" required class="form-control"  name="productcat">
                        <option value="">Select Product Category</option>
                        <?php
                        $cat=new category();
                        $getcat=$cat->getallcat();
                         /*$query="SELECT * FROM tbl_category";
                        $getcat=$product->db->select($query);*/
                        if($getcat){
                            while ($result=$getcat->fetch_assoc()) {
                                ?>
                                 <option 
                                 <?php
                                    if($value['catid']==$result['catid']){ ?>
                                        selected="selected"
                                        
                                        <?php
                                    }
                                 ?>
                                 value="<?php echo $result['catid'] ?>"><?php echo $result['catname'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select></span></td>
                </tr>
                <tr>
                    <td>Product Brand <span style="padding:0px; margin-left:30px;">
                    <select id="form" required  class="form-control"  name="productbrand">
                        <option value="">Select Product Brand</option>
                         <?php
                          $brand=new brand();
                        $getbrand=$brand->getallbrand();
                        if($getbrand){
                            while ($result=$getbrand->fetch_assoc()) {
                                ?>
                                 <option 
                                  <?php
                                    if($value['brandid']==$result['brandid']){ ?>
                                        selected="selected"
                                        
                                        <?php
                                    }
                                 ?>
                                 value="<?php echo $result['brandid'] ?>"><?php echo $result['brandname']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select></span></td>
                </tr>
                <tr>
                    <td>Image <span style="padding:0px; margin-left:18px;"><input type="file" name="file" id="form"   class="form-control"  /></span><img src="<?php echo $value['image']; ?>" height="40" width="40" /></td>
                </tr>
                <tr>
                    <td>Status <span style="padding:0px; margin-left:18px;">
                    <select name="status" required="" id="form"   class="form-control" >
                        <option value="">Select Option</option>
                         <?php
                                if($value['status']=='0'){ ?>
                                    <option selected="selected" value="0">First</option>
                                    <option value="1">Second</option>
                                    <option value="2">Third</option>
                                    <?php
                                }
                                elseif($value['status']=='1'){
                                    ?>
                                    <option value="0">First</option>
                                    <option selected="selected"  value="1">Second</option>
                                    <option value="2">Third</option>
                                    <?php
                                }
                                else{
                                    ?>
                                     <option value="0">First</option>
                                    <option   value="1">Second</option>
                                    <option selected="selected" value="2">Third</option>
                                    <?php
                                }
                                 ?>
                    </select></span></td>
                </tr>
                 <tr>
                    <td><span style="padding:0px; margin-left:60px; "><input type="submit" name="submit" value="Update" id="form"  class="form-control" /></span></td>
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