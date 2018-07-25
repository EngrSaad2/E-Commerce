<?php include "inc/header.php"; ?>
<?php include "../class/brand.php"; ?>
<?php
    $brand=new brand();
    if(isset($_GET['delbrand'])){
        $brandid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
        $delbrand=$brand->delbrandbyid($brandid);
    }
?>

<?php include "inc/sidebarleft.php"; ?>  
<div class="sidebar_right">
    <div class="sr_title">
       Brand List <span style="text-align: center; margin-left: 350px;"><?php if(isset($delbrand)){echo $delbrand;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table">
        <table id="example" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr style="background:#8F8F8F;">
                <th>Serial NO</th>
                <th>Brand Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $getbrand=$brand->getallbrand();
                if($getbrand){
                    $i=1;
                    while ($result=$getbrand->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $result['brandname']; ?></td>
                            <td><a href="brandedit.php?brandid=<?php echo $result['brandid']; ?>">Edit</a> || <a onclick='return confirm("Are you sure to delete this?");'  href="?delbrand=<?php echo $result['brandid']; ?>"> Delete</a></td>
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