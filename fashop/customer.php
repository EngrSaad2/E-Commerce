<?php include "inc/header.php"; ?>
<?php include "../class/customer.php"; ?>
<?php
	 if(!isset($_GET['cmrid'])|| $_GET['cmrid']==null){
        header("Location:../404.php");
    }
    else{
        $cmrid=$_GET['cmrid'];
    }
?>
	
<?php include "inc/sidebarleft.php"; ?>           
<div class="sidebar_right">
    <div class="sr_title">
       Category  <span style="text-align: center; margin-left: 350px;"><?php if(isset($insertcat)){echo $insertcat;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <table class="table table-striped  table-bordered">
					<?php
						$cmr=new customer();
						$getuserpro=$cmr->getcustomerpro($cmrid);
						if($getuserpro){
							while ($result=$getuserpro->fetch_assoc()) {
								?>
						<tr>
							<td colspan="3" align="center"><h2>Customer Profile</h2></td>
						</tr>
						<tr>
							<td width="20%">Name</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['name']; ?></td>
						</tr>
						<tr>
							<td width="20%">City/Village</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['city']; ?></td>
						</tr>
						<tr>
							<td width="20%">Zilla</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['zilla']; ?></td>
						</tr>
						<tr>
							<td width="20%">Thana</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['thana']; ?></td>
						</tr>
						<tr>
							<td width="20%">Post Office</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['post']; ?></td>
						</tr>
						<tr>
							<td width="20%">Address</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['address']; ?></td>
						</tr>
						<tr>
							<td width="20%">Email</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['email']; ?></td>
						</tr>
						<tr>
							<td width="20%">Mobile</td>
							<td width="5%">:</td>
							<td width="75%"><?php echo $result['mobile']; ?></td>
						</tr>
							<?php
							}
						}
					?>
					</table>
    </div>
    </div>
</div>

 <?php include"inc/footer.php"; ?>