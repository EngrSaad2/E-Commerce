<?php
 class partner{
 	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
  public function insertpartner($file){
   /* $partnername=$this->fm->valid($data['name']);
    $partnername=mysqli_real_escape_string($this->db->link,$data['name']);*/
    $file=$_FILES["file"];
            $permited=array('jpg','jpeg','png','gif');
            $file_name= $file["name"];
            $file_size=$file["size"];
            $file_tmp=$file["tmp_name"];
            $file_error=$file["error"];
            $div=explode('.', $file_name);
            $file_ext=strtolower(end($div));
                  if(in_array($file_ext, $permited)){
                     if($file_error===0){
                      if($file_size<=2097152){
                        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
                          $uploaded_image="partner/".$unique_image;
                            if(move_uploaded_file($file_tmp, $uploaded_image)){
                               $query="INSERT INTO tbl_partner(image) VALUES('$uploaded_image')";
                             $insertpartner=$this->db->insert($query);
                                if($insertpartner){
                                  $success='<span style="color:green;">Partner Insert Successfully</span>';
                                  return $success;
                                }
                            }
                      }
                      else{
                        $error= "File size must be excately 2 MB";
                      }
                     }
                     else{
                      $error= "There are some error";
                     }
                  }
              else{
                      $error="You can upload only:-".implode(',', $permited);
                  }
                 
            } 

public function insertsub($data){
    $subemail=$this->fm->valid($data['email']);
    $subemail=mysqli_real_escape_string($this->db->link,$data['email']);
    $chquery="SELECT * FROM tbl_subscribe WHERE email='$subemail'";
      $getemail=$this->db->select($chquery);
      if($getemail){
        ?>
          <script>alert("Already Subscribe!");</script>
        <?php
      }
      else{
        $query="INSERT INTO tbl_subscribe(email) VALUES('$subemail')";
         $insertsub=$this->db->insert($query);
          if($insertsub){
            ?>
            <script>alert("Subscribe Successfully");</script>
            <?php
           /* $success='<span style="color:green;">Subscribe Successfully</span>';
            return $success;*/
          }
    }
}

    public function getallpartner(){
      $query="SELECT * FROM tbl_partner";
      $result=$this->db->select($query);
      return $result;
    }

 }