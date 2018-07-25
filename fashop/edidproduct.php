<?php include"inc/header.php"; ?>
<?php include"inc/sidebarleft.php"; ?> 
<?php include "../class/product.php"; ?> 
    <?php
     if(!isset($_GET['productid'])|| $_GET['productid']==null){
        header("Location:productlist.php");
    }
    else{
        $productid=$_GET['productid'];
    }
    $product=new product();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $productid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['productid']);
        $updateproduct=$product->updateproduct($_POST,$_FILES,$productid);
    } 
    ?>
<div class="sidebar_right">
    <div class="sr_title">
       Update Product<span style="text-align: center; margin-left: 350px;"><?php if(isset($updateproduct)){echo $updateproduct;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST" enctype="multipart/form-data"> 
            <table class="table">
            <?php
            $getproduct=$product->getprobyid($productid);
            if($getproduct){
                while($value=$getproduct->fetch_assoc()){
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
                         $query="SELECT * FROM tbl_category";
                        $getcat=$product->db->select($query);
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
                         $query="SELECT * FROM tbl_brand";
                        $getbrand=$product->db->select($query);
                        if($getbrand){
                            $i=1;
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
                    <td>
                   
                        Content <textarea id="elm1" required name="description">
                            <?php
                             echo $value['description'];
                            ?>
                        </textarea>
                        
                    </td>
                </tr>
                <tr>
                    <td>Image <span style="padding:0px; margin-left:18px;"><input type="file" name="fontimg" id="form"   class="form-control"  /></span><img src="<?php echo $value['fontimg']; ?>" height="40" width="40" /></td>
                </tr>
                 <tr>
                    <td>Type <span style="padding:0px; margin-left:30px;">
                    <select id="form"  required class="form-control"  name="fecture">
                        <option value="">Select Type</option>
                                <?php
                                    if($value['type']=='0'){ ?>
                                        <option selected="selected" value="0">Fectured</option>
                                        <option value="1">Non-Fecture</option>
                                        
                                        
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <option value="0">Fectured</option>
                                        <option selected="selected" value="1">Non-Fecture</option>
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