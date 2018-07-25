<?php
 class slider{
 	public $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
 	public function insertslider($data,$file){
 		$productname=$this->fm->valid($data['productname']);
 		$productcode=$this->fm->valid($data['productcode']);
 		$productsize=$this->fm->valid($data['productsize']);
 		$productprice=$this->fm->valid($data['productprice']);
 		$productcat=$this->fm->valid($data['productcat']);
 		$productbrand=$this->fm->valid($data['productbrand']);
    $status=$this->fm->valid($data['status']);
 		$productname=mysqli_real_escape_string($this->db->link,$data['productname']);
 		$productcode=mysqli_real_escape_string($this->db->link,$data['productcode']);
 		$productsize=mysqli_real_escape_string($this->db->link,$data['productsize']);
 		$productprice=mysqli_real_escape_string($this->db->link,$data['productprice']);
 		$productcat=mysqli_real_escape_string($this->db->link,$data['productcat']);
 		$productbrand=mysqli_real_escape_string($this->db->link,$data['productbrand']);
    $status=mysqli_real_escape_string($this->db->link,$data['status']);
    $squery="SELECT * FROM tbl_category WHERE catid='$productcat'";
    $result=$this->db->select($squery)->fetch_assoc();
    $cattype=$result['cattype'];
    $file=$_FILES["file"];
            $permited=array('jpg','jpeg','png','gif');
            $file_name=	$file["name"];
            $file_size=$file["size"];
            $file_tmp=$file["tmp_name"];
            $file_error=$file["error"];
            $div=explode('.', $file_name);
            $file_ext=strtolower(end($div));
                  if(in_array($file_ext, $permited)){
                  	 if($file_error===0){
                  	 	if($file_size<=2097152){
                  	 		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
                          $uploaded_image="slider/".$unique_image;
                            if(move_uploaded_file($file_tmp, $uploaded_image)){
                               $query="INSERT INTO tbl_slider(productname,productcode,productsize,productprice,catid,cattype,brandid,image,status) VALUES('$productname','$productcode','$productsize','$productprice','$productcat','$cattype','$productbrand','$uploaded_image','$status')";
                             $insertproduct=$this->db->insert($query);
                                if($insertproduct){
                                  $success='<span style="color:green;">Slider Insert Successfully</span>';
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
    public function getallproduct(){
    $query="SELECT s.*,c.catname,b.brandname FROM tbl_slider as s,tbl_category as c,tbl_brand as b WHERE s.catid=c.catid AND s.brandid=b.brandid ORDER BY s.sliderid DESC";
      $result=$this->db->select($query);
      return $result;
    }

 public function delsliderbyid($sliderid){
       $sliderid=mysqli_real_escape_string($this->db->link,$sliderid);
        $query="SELECT * FROM tbl_slider WHERE sliderid='$sliderid'";
        $getdata=$this->db->select($query);
        if($getdata){
          while($delimg=$getdata->fetch_assoc()){
            $dilink=$delimg['image'];
            unlink($dilink);
          }
        }
      $query="DELETE FROM tbl_slider WHERE sliderid='$sliderid'";
      $delete=$this->db->delete($query);
      if($delete){
        $success='<span style="color:green;">Slider Delete Successfully</span>';
        return $success;
      }
    }

 public function getsliderbyid($sliderid){
       $query="SELECT s.*,c.catname,b.brandname FROM tbl_slider as s,tbl_category as c,tbl_brand as b WHERE s.catid=c.catid AND s.brandid=b.brandid AND s.sliderid='$sliderid'";
      /* $query="SELECT * FROM tbl_product WHERE productid='$productid'";*/
      $result=$this->db->select($query);
      return $result;
    }
public function updateslider($data,$file,$sliderid){
    $productname=$this->fm->valid($data['productname']);
    $productcode=$this->fm->valid($data['productcode']);
    $productsize=$this->fm->valid($data['productsize']);
    $productprice=$this->fm->valid($data['productprice']);
    $productcat=$this->fm->valid($data['productcat']);
    $productbrand=$this->fm->valid($data['productbrand']);
    $status=$this->fm->valid($data['status']);
    $productname=mysqli_real_escape_string($this->db->link,$data['productname']);
    $productcode=mysqli_real_escape_string($this->db->link,$data['productcode']);
    $productsize=mysqli_real_escape_string($this->db->link,$data['productsize']);
    $productprice=mysqli_real_escape_string($this->db->link,$data['productprice']);
    $productcat=mysqli_real_escape_string($this->db->link,$data['productcat']);
    $productbrand=mysqli_real_escape_string($this->db->link,$data['productbrand']);
    $status=mysqli_real_escape_string($this->db->link,$data['status']);
    $squery="SELECT * FROM tbl_category WHERE catid='$productcat'";
    $result=$this->db->select($squery)->fetch_assoc();
    $cattype=$result['cattype'];
    $file=$_FILES["file"];
            $permited=array('jpg','jpeg','png','gif');
            $file_name= $file["name"];
            $file_size=$file["size"];
            $file_tmp=$file["tmp_name"];
            $file_error=$file["error"];
            $div=explode('.', $file_name);
            $file_ext=strtolower(end($div));
             if(!empty($file_name)){
                  if(in_array($file_ext, $permited)){
                     if($file_error===0){
                      if($file_size<=2097152){
                        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
                          $uploaded_image="slider/".$unique_image;
                            if(move_uploaded_file($file_tmp, $uploaded_image)){
                              $query="UPDATE tbl_slider SET
                                productname='$productname',
                                productcode='$productcode',
                                productsize='$productsize',
                                productprice='$productprice',
                                catid     ='$productcat',
                                cattype   ='$cattype',
                                brandid   ='$productbrand',
                                status   ='$status',
                                image   ='$uploaded_image'
                                WHERE sliderid='$sliderid'";
                               $updateproduct=$this->db->update($query);
                                  if($updateproduct){
                                    $success='<span style="color:green;">Slider Update Successfully</span>';
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
                 
            } /*end of if*/
            else{
                   $query="UPDATE tbl_slider SET
                productname='$productname',
                productcode='$productcode',
                productsize='$productsize',
                productprice='$productprice',
                catid     ='$productcat',
                cattype   ='$cattype',
                status   ='$status',
                brandid   ='$productbrand'
                WHERE sliderid='$sliderid'";
               $updateproduct=$this->db->update($query);
                  if($updateproduct){
                    $success='<span style="color:green;">Slider Update Successfully</span>';
                    return $success;
                  }
                }
             
          }
  public function getsliderf(){
    $query="SELECT s.*,c.catname,b.brandname FROM tbl_slider as s,tbl_category as c,tbl_brand as b WHERE s.catid=c.catid AND s.brandid=b.brandid AND s.status='0' ORDER BY rand() LIMIT 1";
      $result=$this->db->select($query);
      return $result;
    }
    public function getsliders(){
    $query="SELECT s.*,c.catname,b.brandname FROM tbl_slider as s,tbl_category as c,tbl_brand as b WHERE s.catid=c.catid AND s.brandid=b.brandid AND s.status='1' ORDER BY rand() LIMIT 1";
      $result=$this->db->select($query);
      return $result;
    }
    public function getslidert(){
    $query="SELECT s.*,c.catname,b.brandname FROM tbl_slider as s,tbl_category as c,tbl_brand as b WHERE s.catid=c.catid AND s.brandid=b.brandid AND s.status='2' ORDER BY rand() LIMIT 1";
      $result=$this->db->select($query);
      return $result;
    }

 } 