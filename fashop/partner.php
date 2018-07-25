<?php include "inc/header.php"; ?>
<?php include_once "../class/partner.php"; ?>
<?php
    $partner=new partner();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $insertpartner=$partner->insertpartner($_FILES);
    } 
?>
<?php include "inc/sidebarleft.php"; ?>           
<div class="sidebar_right">
    <div class="sr_title">
       Category  <span style="text-align: center; margin-left: 300px;"><?php if(isset($insertpartner)){echo $insertpartner;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST" enctype="multipart/form-data"> 
            <table class="table">
            	<!-- <tr>
                    <td>Partner Name<span style="padding:0px; margin-left:50px;"><input type="text" name="name" placeholder="Type your partnername " id="form"  class="form-control" /></span></td>
                </tr> -->
                <tr>
                    <td>Partner Image<span style="padding:0px; margin-left:50px;"><input type="file" name="file" placeholder="Type your brandname" id="form"  class="form-control" /></span></td>
                </tr>
                </tr>
                 <tr>
                    <td><span style="padding:0px; margin-left:130px; "><input type="submit" name="submit" value="Save" id="form"  class="form-control" required /></span></td>
                </tr>
            </table>
        </form>
    </div>
    </div>
</div>

 <?php include"inc/footer.php"; ?>