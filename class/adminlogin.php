<?php
 session::checklogin(); 

?>
<?php
 class adminlogin{
 	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
 	public function adminlogin($adminuser,$adminpassword){
 			$adminuser=$this->fm->valid($adminuser);
   			$adminpassword=$this->fm->valid($adminpassword);
		   	$adminuser=mysqli_real_escape_string($this->db->link,$adminuser);
		   	$adminpassword=mysqli_real_escape_string($this->db->link,$adminpassword);
		   	if (empty($adminuser)||empty($adminpassword)) {
		   		$error="Username Or Password Must Not Be Empty";
		   		return $error;
		   	}
		   	else{
		   			$query="SELECT * FROM tbl_admin WHERE user='$adminuser' AND password='$adminpassword'";
   					$result=$this->db->select($query);
   					if($result!=false){
   						$value=$result->fetch_assoc();
			   			session::set("adminlogin",true);
			   			session::set("adminuser",$value['user']);
			   			session::set("adminuserid",$value['id']);
			   			session::set("adminusername",$value['name']);
			   			header("Location:index.php");
			   		}
			   		else{
			   			$error="Username Or Password Did Not Match";
		   				return $error;
			   		}
		   	}
 	}
 }
?>