<?php
 class brand{
 	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
 	public function insertbrand($brandname){
 		$brandname=$this->fm->valid($brandname);
 		 $brandname=mysqli_real_escape_string($this->db->link,$_POST["brandname"]);
 		 if(empty($brandname)){
                    $error='<span style="color:red;">Field Can Not Be Empty</span>';
                    return $error;
                }
                else{
                	$chequery="SELECT * FROM tbl_brand WHERE brandname='$brandname'";
                   $getbrand=$this->db->select($chequery);
                  if($getbrand){
                     $error='<span style="color:red;">This Brand already exits</span>';
                     return $error;
                  }
                  else{
                  	  $query="INSERT INTO tbl_brand(brandname) VALUES('$brandname')";
                      $insertbrand=$this->db->insert($query);
                      if($insertbrand){
                      	$success='<span style="color:green;">Brandname Insert Successfully</span>';
                        return $success;
                      }
                  }
                }            
 	      }
   public function getallbrand(){
      $query="SELECT * FROM tbl_brand ORDER BY brandid DESC";
      $result=$this->db->select($query);
      return $result;
    }
    
    public function getbrandbyid($brandid){
       $query="SELECT * FROM tbl_brand WHERE brandid='$brandid'";
      $result=$this->db->select($query);
      return $result;
    }
    public function updatebrand($brandname,$brandid){
      $brandname=$this->fm->valid($brandname);
     $brandname=mysqli_real_escape_string($this->db->link,$_POST["brandname"]);
     $brandid=mysqli_real_escape_string($this->db->link,$brandid);
     if(empty($brandname)){
              $error='<span style="color:red;">Field Can Not Be Empty</span>';
              return $error;
          }
          else{
            $query="UPDATE tbl_brand SET 
              brandname='$brandname' WHERE brandid='$brandid'";
              $update=$this->db->update($query);
              if($update){
                $success='<span style="color:green;">Brandname Update Successfully</span>';
                return $success;
              }
          }
    }

    public function delbrandbyid($brandid){
      $brandid=mysqli_real_escape_string($this->db->link,$brandid);
      $query="DELETE FROM tbl_brand WHERE brandid='$brandid'";
      $delete=$this->db->delete($query);
      if($delete){
        $success='<span style="color:green;">Brand Delete Successfully</span>';
        return $success;
      }
    }
    public function getbrand(){
      $query="SELECT * FROM tbl_brand ORDER BY brandname DESC";
      $result=$this->db->select($query);
      return $result;
    }
 }