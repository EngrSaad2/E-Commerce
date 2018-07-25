<?php
 class category{
 	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
 	public function insertcat($category,$cattype){
 		$category=$this->fm->valid($category);
    $cattype=$this->fm->valid($cattype);
 		$category=mysqli_real_escape_string($this->db->link,$_POST["category"]);
    $cattype=mysqli_real_escape_string($this->db->link,ucwords($_POST["cattype"]));
 		 if(empty($category)||empty($cattype)){
                    $error='<span style="color:red;">Field Can Not Be Empty</span>';
                    return $error;
                }
                else{
                	$chequery="SELECT * FROM tbl_category WHERE catname='$category' AND cattype='$cattype'";
                   $getcat=$this->db->select($chequery);
                  if($getcat){
                     $error='<span style="color:red;">This category already exits</span>';
                     return $error;
                  }
                  else{
                  	  $query="INSERT INTO tbl_category(catname,cattype) VALUES('$category','$cattype')";
                      $insertcat=$this->db->insert($query);
                      if($insertcat){
                      	$success='<span style="color:green;">Category Insert Successfully</span>';
                        return $success;
                      }
                  }
                }            
 	      }
    public function getallcat(){
      $query="SELECT * FROM tbl_category ORDER BY catid DESC";
      $result=$this->db->select($query);
      return $result;
    }
    public function getcatbyid($catid){
       $query="SELECT * FROM tbl_category WHERE catid='$catid'";
      $result=$this->db->select($query);
      return $result;
    }
    public function updatecat($category,$cattype,$catid){
      $category=$this->fm->valid($category);
      $cattype=$this->fm->valid($cattype);
      $category=mysqli_real_escape_string($this->db->link,$_POST["category"]);
      $cattype=mysqli_real_escape_string($this->db->link,ucwords($_POST["cattype"]));
     $catid=mysqli_real_escape_string($this->db->link,$catid);
     if(empty($category)){
              $error='<span style="color:red;">Field Can Not Be Empty</span>';
              return $error;
          }
          else{
            $query="UPDATE tbl_category SET 
              catname='$category',
              cattype='$cattype' WHERE catid='$catid'";
              $update=$this->db->update($query);
              if($update){
                $success='<span style="color:green;">Category Update Successfully</span>';
                return $success;
              }
          }
    }

    public function delcatbyid($catid){
      $catid=mysqli_real_escape_string($this->db->link,$catid);
      $query="DELETE FROM tbl_category WHERE catid='$catid'";
      $delete=$this->db->delete($query);
      if($delete){
        $success='<span style="color:green;">Cart Delete Successfully</span>';
        return $success;
      }
    }
    public function getcatmen(){
       $query="SELECT * FROM tbl_category WHERE cattype='Men' ORDER BY catname ";
      $result=$this->db->select($query);
      return $result;
    }
     public function getcatwmen(){
       $query="SELECT * FROM tbl_category WHERE cattype='Women' ORDER BY catname";
      $result=$this->db->select($query);
      return $result;
    }
     public function getcatmenu(){
       $query="SELECT * FROM tbl_category  ORDER BY catname DESC";
      $result=$this->db->select($query);
      return $result;
    }
     public function getcatmenuf(){
       $query="SELECT * FROM tbl_category  ORDER BY catname DESC LIMIT 5";
      $result=$this->db->select($query);
      return $result;
    }
 }