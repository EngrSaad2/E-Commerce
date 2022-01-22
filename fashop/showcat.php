<?php include "inc/header.php"; ?>
<?php include "../class/category.php"; ?>
<?php
    $cat=new category();
    if(isset($_GET['delcat'])){
        $catid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
        $delcat=$cat->delcatbyid($catid);
    }...
?>
<?php include "inc/sidebarleft.php"; ?>  
<div class="sidebar_right">
    <div class="sr_title">
       Category List <span style="text-align: center; margin-left: 350px;"><?php if(isset($delcat)){echo $delcat;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table">
        <table id="example" class="table table-striped table-bordered" width="100%">
        <thead>
        	<tr style="background:#8F8F8F;">
	        	<th>Serial NO</th>
	        	<th>Category Name</th>
                <th>Category Type</th>
	        	<th>Action</th>
        	</tr>
            </thead>
            <tbody>
            <?php
                $getcat=$cat->getallcat();
                if($getcat){
                    $i=1;
                    while ($result=$getcat->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $result['catname']; ?></td>
                            <td><?php echo $result['cattype']; ?></td>
                            <td><a href="catedit.php?catid=<?php echo $result['catid']; ?>">Edit</a> || <a onclick='return confirm("Are you sure to delete this?");'  href="?delcat=<?php echo $result['catid']; ?>"> Delete</a></td>
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
