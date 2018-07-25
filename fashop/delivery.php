<?php include "inc/header.php"; ?>
<?php include "inc/sidebarleft.php"; ?> 
<?php include "../class/cart.php"; ?>  
<?php
 $ct=new cart();
 $fm=new format();
?>  
<?php
    if(isset($_GET['delid'])){
     $id=$_GET['delid'];
     $time=$_GET['time'];
     $price=$_GET['price'];
     $delshift=$ct->proshiftdel($id,$time,$price);
    }
?>     
<div class="sidebar_right">
    <div class="sr_title">
       Inbox <span style="text-align: center; margin-left: 350px;  color: green;"><?php if(isset($delshift)){ echo $delshift;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table">
        <table id="table_id" class="table">
        <thead>
        	<tr style="background:#8F8F8F;">
                <th width="2%">Sl</th>
	        	<th width="20%">Date &amp; Time</th>
	        	<th width="25%">Product</th>
                <th width="3%">Id</th>
                <th width="15%">Code</th>
                <th width="5%">Quantity</th>
                <th width="5%">Price</th>
                <th width="5%">Address</th>
                <th width="10%">Name</th>
                <th width="10%">Action</th>
        	</tr>
            </thead>
            <tbody>
            <?php
                $getorder=$ct->getallshiftpro();
                if($getorder){
                    $i=1;
                    while ($result=$getorder->fetch_assoc()) {
                        ?>
                         <tr>
                            <td><?php echo $i++; ?></td>
                             <td><?php echo $fm->formatdate($result["dat"] ); ?></td>
                            <td><?php echo $result['productname']; ?></td>
                            <td><?php echo $result['customerid']; ?></td>
                            <td><?php echo $result['productcode']; ?></td>
                            <td><?php echo $result['quantity']; ?></td>
                            <td><?php echo $result['price']; ?></td>
                            <td><a href="customer.php?cmrid=<?php echo $result['customerid']; ?>"> View Details</a></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><a onclick='return confirm("Are you sure delete this?");' href="?delid=<?php echo $result['customerid']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['dat']; ?>">Remove</a></td>
                                
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