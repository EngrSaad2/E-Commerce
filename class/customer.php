<?php
class customer{
 	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
 	public function custoreg($data){
 		$name=$this->fm->valid($data['name']);
 		$city=$this->fm->valid($data['city']);
 		$thana=$this->fm->valid($data['thana']);
 		$email=$this->fm->valid($data['email']);
 		$address=$this->fm->valid($data['address']);
 		$zilla=$this->fm->valid($data['zilla']);
 		$post=$this->fm->valid($data['post']);
 		$mobile=$this->fm->valid($data['mobile']);
    $password=$this->fm->valid($data['password']);
 		$name=mysqli_real_escape_string($this->db->link,$data['name']);
 		$city=mysqli_real_escape_string($this->db->link,$data['city']);
 		$thana=mysqli_real_escape_string($this->db->link,$data['thana']);
 		$email=mysqli_real_escape_string($this->db->link,$data['email']);
 		$address=mysqli_real_escape_string($this->db->link,$data['address']);
 		$zilla=mysqli_real_escape_string($this->db->link,$data['zilla']);
 		$post=mysqli_real_escape_string($this->db->link,$data['post']);
 		$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
    $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
 		$mailquery="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
 		$mailchk=$this->db->select($mailquery);
 		if($mailchk){
 			$error='<span style="color:red;">Email already exits</span>';
            return $error;
 		}
 		else{
 			$query="INSERT INTO tbl_customer(name,city,thana,email,address,zilla,post,mobile,password) VALUES('$name','$city','$thana','$email','$address','$zilla','$post','$mobile','$password')";
 			 $insert=$this->db->insert($query);
              if($insert){
              	$success='<span style="color:green;">Registation Successfully</span>';
                return $success;
              }
 		}
 	}
 	public function custologin($data){
 		$password=$this->fm->valid($data['password']);
 		$email=$this->fm->valid($data['email']);
 		$password=mysqli_real_escape_string($this->db->link,md5($data['password']));
 		$email=mysqli_real_escape_string($this->db->link,$data['email']);
 		if(empty($password)|| empty($email)){
 			$error='<span style="color:red;">Name Or Email Not Be Empty </span>';
            return $error;
 		}
 		$query="SELECT * FROM tbl_customer WHERE password='$password' AND email='$email'";
 		$result=$this->db->select($query);
 		if($result!=false){
 			$value=$result->fetch_assoc();
 			Session::set('cuslogin',true);
 			Session::set('cusid',$value['customerid']);
 			Session::set('cusname',$value['name']);
 			header("Location:index.php");
 		}
 		else{
 			$error='<span style="color:red;">Email Or Password Not Match </span>';
            return $error;
 		}
 	}
 	public function getuserpro($cid){
 		$query="SELECT * FROM tbl_customer WHERE customerid='$cid'";
 		$result=$this->db->select($query);
 		return $result;
 	}
 	public function custoproup($data,$cid){
 		$name=$this->fm->valid($data['name']);
 		$city=$this->fm->valid($data['city']);
 		$thana=$this->fm->valid($data['thana']);
 		$address=$this->fm->valid($data['address']);
 		$zilla=$this->fm->valid($data['zilla']);
 		$post=$this->fm->valid($data['post']);
 		$mobile=$this->fm->valid($data['mobile']);
 		$name=mysqli_real_escape_string($this->db->link,$data['name']);
 		$city=mysqli_real_escape_string($this->db->link,$data['city']);
 		$thana=mysqli_real_escape_string($this->db->link,$data['thana']);
 		$address=mysqli_real_escape_string($this->db->link,$data['address']);
 		$zilla=mysqli_real_escape_string($this->db->link,$data['zilla']);
 		$post=mysqli_real_escape_string($this->db->link,$data['post']);
 		$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
 		$query="UPDATE tbl_customer SET
 			name='$name',
 			city='$city',
 			thana='$thana',
 			mobile='$mobile',
 			address='$address',
 			zilla='$zilla',
 			post='$post'
 			WHERE customerid='$cid'";
			$update=$this->db->update($query);
	      if($update){
	      	$success='<span style="color:green;">Update Your Profile</span>';
	        return $success;
	      }
 	}
  public function getcustomerpro($cmrid){
    $query="SELECT * FROM tbl_customer WHERE customerid='$cmrid'";
    $result=$this->db->select($query);
    return $result;
  }
 }
?>