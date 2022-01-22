<?php
 class product{
 	public $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new database();
 		$this->fm=new format();
 	}
 	public function insertproduct($data,$file){
 		$productname=$this->fm->valid($data['productname']);
 		$productcode=$this->fm->valid($data['productcode']);
 		$productsize=$this->fm->valid($data['productsize']);
 		$productprice=$this->fm->valid($data['productprice']);
 		$productcat=$this->fm->valid($data['productcat']);
 		$productbrand=$this->fm->valid($data['productbrand']);
 		$description=$this->fm->valid($data['description']);
 		$fecture=$this->fm->valid($data['fecture']);
 		$productname=mysqli_real_escape_string($this->db->link,$data['productname']);
 		$productcode=mysqli_real_escape_string($this->db->link,$data['productcode']);
 		$productsize=mysqli_real_escape_string($this->db->link,$data['productsize']);
 		$productprice=mysqli_real_escape_string($this->db->link,$data['productprice']);
 		$productcat=mysqli_real_escape_string($this->db->link,$data['productcat']);
 		$productbrand=mysqli_real_escape_string($this->db->link,$data['productbrand']);
 		$description=mysqli_real_escape_string($this->db->link,$data['description']);
 		$fecture=mysqli_real_escape_string($this->db->link,$data['fecture']);
    $squery="SELECT * FROM tbl_category WHERE catid='$productcat'";
    $result=$this->db->select($squery)->fetch_assoc();
    $cattype=$result['cattype'];
            $permited=array('jpg','jpeg','png','gif');
            $file_name=	$file["fontimg"]["name"];
            $file_size=$file["fontimg"]["size"];
            $file_tmp=$file["fontimg"]["tmp_name"];
            $file_error=$file["fontimg"]["error"];
            $div=explode('.', $file_name);
            $file_ext=strtolower(end($div));
                  if(in_array($file_ext, $permited)){
                  	 if($file_error===0){
                  	 	if($file_size<=2097152){
                  	 		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
                          $uploaded_image="image/".$unique_image;
                            if(move_uploaded_file($file_tmp, $uploaded_image)){
                               $query="INSERT INTO tbl_product(productname,productcode,productsize,productprice,description,type,catid,cattype,brandid,fontimg) VALUES('$productname','$productcode','$productsize','$productprice','$description','$fecture','$productcat','$cattype','$productbrand','$uploaded_image')";
                             $insertproduct=$this->db->insert($query);
                                if($insertproduct){
                                  $success='<span style="color:green;">Product Insert Successfully</span>';
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
    $query="SELECT p.*,c.catname,b.brandname FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catid=c.catid AND p.brandid=b.brandid ORDER BY p.productid DESC";
      /*$query="SELECT tbl_product.*,tbl_category.catname,tbl_brand.brandname FROM tbl_product
      INNER JOIN tbl_category 
      ON tbl_product.catid=tbl_category.catid
      INNER JOIN tbl_brand 
      ON tbl_product.brandid=tbl_brand.brandid
       ORDER BY tbl_product.productid DESC";*/
      $result=$this->db->select($query);
      return $result;
    }
     public function getprobyid($productid){
       $query="SELECT p.*,c.catname,b.brandname FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catid=c.catid AND p.brandid=b.brandid AND p.productid='$productid'";
      /* $query="SELECT * FROM tbl_product WHERE productid='$productid'";*/
      $result=$this->db->select($query);
      return $result;
    }
    public function updateproduct($data,$file,$productid){
    $productname=$this->fm->valid($data['productname']);
    $productcode=$this->fm->valid($data['productcode']);
    $productsize=$this->fm->valid($data['productsize']);
    $productprice=$this->fm->valid($data['productprice']);
    $productcat=$this->fm->valid($data['productcat']);
    $productbrand=$this->fm->valid($data['productbrand']);
    $description=$this->fm->valid($data['description']);
    $fecture=$this->fm->valid($data['fecture']);
    $productname=mysqli_real_escape_string($this->db->link,$data['productname']);
    $productcode=mysqli_real_escape_string($this->db->link,$data['productcode']);
    $productsize=mysqli_real_escape_string($this->db->link,$data['productsize']);
    $productprice=mysqli_real_escape_string($this->db->link,$data['productprice']);
    $productcat=mysqli_real_escape_string($this->db->link,$data['productcat']);
    $productbrand=mysqli_real_escape_string($this->db->link,$data['productbrand']);
    $description=mysqli_real_escape_string($this->db->link,$data['description']);
    $fecture=mysqli_real_escape_string($this->db->link,$data['fecture']);
    $squery="SELECT * FROM tbl_category WHERE catid='$productcat'";
    $result=$this->db->select($squery)->fetch_assoc();
    $cattype=$result['cattype'];
            $permited=array('jpg','jpeg','png','gif');
            $file_name=  $file["fontimg"]["name"];
            $file_size=$file["fontimg"]["size"];
            $file_tmp=$file["fontimg"]["tmp_name"];
            $file_error=$file["fontimg"]["error"];
            $div=explode('.', $file_name);
            $file_ext=strtolower(end($div));

            if(!empty($file_name)){

                  if(in_array($file_ext, $permited)){
                     if($file_error===0){
                      if($file_size<=2097152){
                        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
                          $uploaded_image="image/".$unique_image;
                            if(move_uploaded_file($file_tmp, $uploaded_image)){
                               $query="UPDATE tbl_product SET
                                productname='$productname',
                                productcode='$productcode',
                                productsize='$productsize',
                                productprice='$productprice',
                                description='$description',
                                type        ='$fecture',
                                catid     ='$productcat',
                                cattype   ='$cattype',
                                brandid   ='$productbrand',
                                fontimg   ='$uploaded_image'
                                WHERE productid='$productid'";
                               $updateproduct=$this->db->update($query);
                                  if($updateproduct){
                                    $success='<span style="color:green;">Product Update Successfully</span>';
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
                else{
                   $query="UPDATE tbl_product SET
                productname='$productname',
                productcode='$productcode',
                productsize='$productsize',
                productprice='$productprice',
                description='$description',
                type        ='$fecture',
                catid     ='$productcat',
                cattype   ='$cattype',
                brandid   ='$productbrand'
                WHERE productid='$productid'";
               $updateproduct=$this->db->update($query);
                  if($updateproduct){
                    $success='<span style="color:green;">Product Update Successfully</span>';
                    return $success;
                  }
                }
    }
    public function delproductbyid($productid){
       $productid=mysqli_real_escape_string($this->db->link,$productid);
        $query="SELECT * FROM tbl_product WHERE productid='$productid'";
        $getdata=$this->db->select($query);
        if($getdata){
          while($delimg=$getdata->fetch_assoc()){
            $dilink=$delimg['fontimg'];
            unlink($dilink);
          }
        }
      $query="DELETE FROM tbl_product WHERE productid='$productid'";
      $delete=$this->db->delete($query);
      if($delete){
        $success='<span style="color:green;">Product Delete Successfully</span>';
        return $success;
      }
    }
     public function getfproduct(){
       $query="SELECT * FROM tbl_product WHERE type='0' ORDER BY productid DESC LIMIT 24";
      $result=$this->db->select($query);
      return $result;
    }
     public function getrproduct(){
       $query="SELECT * FROM tbl_product ORDER BY rand() LIMIT 4 ";
      $result=$this->db->select($query);
      return $result;
    }
     public function getrelpro($catid){
       $query="SELECT * FROM tbl_product WHERE catid='$catid' ORDER BY rand() LIMIT 6 ";
      $result=$this->db->select($query);
      return $result;
    }
     public function getbrandpro($productid){
       $query="SELECT p.*,b.brandname FROM tbl_product as p,tbl_brand as b WHERE  p.brandid=b.brandid AND p.brandid='$productid'";
      /* $query="SELECT * FROM tbl_product WHERE productid='$productid'";*/
      $result=$this->db->select($query);
      return $result;
    }
     public function getcatpro($productid){
       $query="SELECT p.*,c.catname FROM tbl_product as p,tbl_category as c WHERE p.catid=c.catid  AND p.catid='$productid'";
      /* $query="SELECT * FROM tbl_product WHERE productid='$productid'";*/
      $result=$this->db->select($query);
      return $result;
    }
     public function getkproduct(){
       $query="SELECT p.*,c.catname FROM tbl_product as p,tbl_category as c WHERE p.catid=c.catid  AND p.cattype='Kids' ORDER BY rand() DESC LIMIT 18";
      $result=$this->db->select($query);
      return $result;
    }
    public function getgiftproduct(){
       $query="SELECT p.*,c.catname FROM tbl_product as p,tbl_category as c WHERE p.catid=c.catid  AND p.cattype='Gift' ORDER BY rand() LIMIT 18";
      $result=$this->db->select($query);
      return $result;
    }
     public function getactivepro(){
    $query="SELECT p.*,c.catname,b.brandname FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catid=c.catid AND p.brandid=b.brandid AND p.catid='11' ORDER BY rand() LIMIT 4";
      $result=$this->db->select($query);
      return $result;
    }
     public function getblazers(){
      $query="SELECT p.*,c.catname,b.brandname FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catid=c.catid AND p.brandid=b.brandid AND p.catid='12' ORDER BY rand() LIMIT 4";
      $result=$this->db->select($query);
      return $result;
    }
     public function getsunglass(){
      $query="SELECT p.*,c.catname,b.brandname FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catid=c.catid AND p.brandid=b.brandid AND p.catid='13' ORDER BY rand() LIMIT 4";
      $result=$this->db->select($query);
      return $result;
    }
    public function getkids(){
      $query="SELECT p.*,c.catname,b.brandname FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catid=c.catid AND p.brandid=b.brandid AND p.catid='14' ORDER BY rand() LIMIT 4";
      $result=$this->db->select($query);
      return $result;
    }
    public function getpoloshirt(){
      $query="SELECT p.*,c.catname,b.brandname FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catid=c.catid AND p.brandid=b.brandid AND p.catid='15' ORDER BY rand() LIMIT 4";
      $result=$this->db->select($query);
      return $result;
    }
     public function getsproduct($search){
       $query="SELECT * FROM tbl_product WHERE productname LIKE '%$search%' OR productcode like '%$search%' LIMIT 18";
      $result=$this->db->select($query);
      return $result;
    }
     public function getproductprice($minvalue,$maxvalue){
       $maxvalue=$this->fm->valid($maxvalue);
      $minvalue=$this->fm->valid($minvalue);
      $maxvalue=mysqli_real_escape_string($this->db->link,$maxvalue);
      $minvalue=mysqli_real_escape_string($this->db->link,$minvalue);
       $query="SELECT * FROM tbl_product WHERE productprice BETWEEN '$minvalue' AND '$maxvalue'  LIMIT 27";
      $result=$this->db->select($query);
      return $result;
    }
 } 
