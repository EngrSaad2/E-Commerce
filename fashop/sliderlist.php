<?php include"inc/header.php"; ?>
<?php include "../class/slider.php"; ?> 
<?php
    $slider=new slider();
    if(isset($_GET['delslider'])){
        $sliderid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delslider']);
        $delslider=$slider->delsliderbyid($sliderid);
    }
?>
<?php include"inc/sidebarleft.php"; ?>          
<div class="sidebar_right">
    <div class="sr_title">
       Product List <span style="text-align: center; margin-left: 350px;"><?php if(isset($delslider)){echo $delslider;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table">
        <table id="example" class="table table-striped table-bordered" width="100%">
        <thead>
        	<tr style="background:#8F8F8F;">
	        	<th width="5%">No.</th>
	        	<th width="15%">Name</th>
	        	<th width="10%">Size</th>
                <th width="10%">Code</th>
                <th width="10%">Price</th>
                <th width="10%">Category</th>
                <th width="5%">Brand</th>
                <th width="5%">Status</th>
                <th width="10%">Image</th>
                <th width="10%">Action</th>
        	</tr>
            </thead>
            <tbody>
            <?php
                $getproduct=$slider->getallproduct();
                if($getproduct){
                    $i=1;
                    while ($result=$getproduct->fetch_assoc()) {
                       ?>
                       <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $result['productname']; ?></td>
                            <td><?php echo $result['productsize']; ?></td>
                            <td><?php echo $result['productcode']; ?></td>
                            <td><?php echo $result['productprice']; ?></td>
                            <td><?php echo $result['catname']; ?></td>
                            <td><?php echo $result['brandname']; ?></td>
                            <td><?php 
                             if($result['status']=='0'){
                                echo 'First';
                            }
                            elseif($result['status']=='1'){
                                echo 'Second';
                            }
                            else{
                                echo 'Third';
                            }

                             ?>
                                
                            </td>
                            <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" /></td>
                            <td><a href="edidslider.php?sliderid=<?php echo $result['sliderid']; ?>">Edit</a>
                     || <a onclick='return confirm("Are you sure to delete this?");' href="?delslider=<?php echo $result['sliderid'];?>"> Delete</a></td>
                            </tr>
                       <?php
                    }
                }
            ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

 <?php include"inc/footer.php"; ?>