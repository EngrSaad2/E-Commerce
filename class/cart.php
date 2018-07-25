<?php
class cart{
 	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
 	public function addtocart($quentity,$productid){
 		$quentity=$this->fm->valid($quentity); 
 		$quentity=mysqli_real_escape_string($this->db->link,$_POST["quentity"]);
    	$productid=mysqli_real_escape_string($this->db->link,$productid);
    	$sid      =session_id();
    	$squery="SELECT * FROM tbl_product WHERE productid='$productid'";
    	$result=$this->db->select($squery)->fetch_assoc();
     	$productname=$result['productname'];
    	$productcode=$result['productcode'];
    	$productprice=$result['productprice'];
    	$image=$result['fontimg'];
    	$chquery="SELECT * FROM tbl_cart WHERE productid='$productid' AND sid='$sid'";
    	$getcartp=$this->db->select($chquery);
    	if($getcartp){
    		?>
    			<script>alert("Product Already Added!");</script>
    		<?php
    	}
    	else{
	    	$query="INSERT INTO tbl_cart(sid,productid,productname,price,quantity,image,productcode) VALUES('$sid','$productid','$productname','$productprice','$quentity','$image','$productcode')";
		      $insertcart=$this->db->insert($query);
		      if($insertcart){
		      	header("Location:cart.php");
		      	}
		      	else{
		      		header("Location:404.php");
		      	}
		}
 	}
 	public function getcartpro(){
 		$sid=session_id();
 		$query="SELECT * FROM tbl_cart WHERE sid='$sid'";
 		$result=$this->db->select($query);
      	return $result;
 	}
 	public function updatecart($quentity,$cartid){
 		$quentity=$this->fm->valid($quentity);
 		$cartid=$this->fm->valid($cartid); 
 		$quentity=mysqli_real_escape_string($this->db->link,$_POST["quentity"]);
    	$cartid=mysqli_real_escape_string($this->db->link,$_POST["cartid"]);
    	if(empty($quentity)){
              $error='<span style="color:red;">Field Can Not Be Empty</span>';
              return $error;
          }
          else{
            $query="UPDATE tbl_cart SET 
              quantity='$quentity'
              WHERE cartid='$cartid'";
              $update=$this->db->update($query);
              if($update){
              	header("Location:cart.php");
              }
          }
 	}
  public function delcartbyid($delcart){
    $delcart=mysqli_real_escape_string($this->db->link,$delcart);
      $query="DELETE FROM tbl_cart WHERE cartid='$delcart'";
      $delete=$this->db->delete($query);
      if($delete){
        header("Location:cart.php");
      }
  }
  public function checkcart(){
    $sid=session_id();
    $query="SELECT * FROM tbl_cart WHERE sid='$sid'";
    $result=$this->db->select($query);
    return $result;
  }
  public function delcartdata(){
    $sid=session_id();
    $query="DELETE FROM tbl_cart WHERE sid='$sid'";
    $result=$this->db->select($query);
    return $result;
  }
  public function orderinsert($cid){
     $sid=session_id();
     $i=1;
     while($i<=4){
      $ordercode=rand();
      $i++;
     }
    
    $query="SELECT * FROM tbl_cart WHERE sid='$sid'";
    $getpro=$this->db->select($query);
    if($getpro){
      while($result=$getpro->fetch_assoc()) {
        $productid=$result['productid'];
        $productname=$result['productname'];
        $quantity=$result['quantity'];
        $price=$result['price']*$quantity;
        $image=$result['image'];
        $productid=$result['productid'];
        $productcode=$result['productcode'];
        $query="INSERT INTO tbl_order(customerid,productname,productid,quantity,price,productcode,image,ordercode) VALUES('$cid','$productname','$productid','$quantity','$price','$productcode','$image','$ordercode')";
          $insertorder =$this->db->insert($query);
          
           $query="UPDATE tbl_product SET
            count=count+1 WHERE  productid='$productid'";
           $update=$this->db->update($query);
         
      }
    }

  }
  /*
  public function payableamount($cid){
    date_default_timezone_set("Asia/Dhaka"); 
    $query="SELECT * FROM tbl_order WHERE customerid='$cid' AND dat= NOW()";
    $result=$this->db->select($query);
    return $result;
  }*/
  public function getorderpro($cid){
    $query="SELECT * FROM tbl_order WHERE customerid='$cid' AND (status='0' OR status='1') ORDER BY dat DESC";
    $result=$this->db->select($query);
    return $result;
  }
  /*public function delorderbyid($delorder){
    $delorder=mysqli_real_escape_string($this->db->link,$delorder);
      $query="DELETE FROM tbl_order WHERE orderid='$delorder'";
      $delete=$this->db->delete($query);
      if($delete){
        header("Location:orderdetails.php");
      }
  }*/
  public function uporderbyid($confrim){
    $confrim=mysqli_real_escape_string($this->db->link,$confrim);
    $query="UPDATE tbl_order SET
            status='2' WHERE  orderid='$confrim'";
     $update=$this->db->update($query);
      if($update){
        header("Location:orderdetails.php");
      }
  }
  public function checkorder($cid){
    $query="SELECT * FROM tbl_order WHERE customerid='$cid' AND (status='0' OR status='1') ";
    $result=$this->db->select($query);
    return $result;
  }
   public function getallorderpro(){
    $query="SELECT * FROM tbl_order WHERE status='0'  ORDER BY dat DESC ";
    $result=$this->db->select($query);
    return $result;
  }
   public function getallshiftpro(){
    $query="SELECT * FROM tbl_order WHERE status='1' OR status='2' ORDER BY dat DESC";
    $result=$this->db->select($query);
    return $result;
  }
  public function proshift($id,$time,$price,$dename){
      $id=mysqli_real_escape_string($this->db->link,$id);
      $time=mysqli_real_escape_string($this->db->link,$time);
      $price=mysqli_real_escape_string($this->db->link,$price);
      $dename=mysqli_real_escape_string($this->db->link,$dename);
      $query="UPDATE tbl_order SET 
              status='1',name='$dename' WHERE customerid='$id' AND dat='$time' AND price='$price'";
              $update=$this->db->update($query);
              if($update){
                $success='<span style="color:green;"> Update Successfully</span>';
                return $success;
              }
  }
   public function proshiftdel($id,$time,$price){
      $id=mysqli_real_escape_string($this->db->link,$id);
      $time=mysqli_real_escape_string($this->db->link,$time);
      $price=mysqli_real_escape_string($this->db->link,$price);
       $query="DELETE FROM tbl_order WHERE customerid='$id' AND dat='$time' AND price='$price'";
      $delete=$this->db->delete($query);
      if($delete){
        $success='<span style="color:green;"> Delete Successfully</span>';
                return $success;
      }
  }
 }
?>