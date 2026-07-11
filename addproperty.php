<?php
   error_reporting(E_ERROR | E_PARSE);
   $con = new mysqli("localhost", "root", "", "project");
if(isset($_POST['add']))
{
$name=$_POST['name'];
$price=$_POST['price'];
$cat=$_POST['cat'];
$place=$_POST['place'];
$image=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
$newimage=time().$image;
move_uploaded_file($tmp,"uploads/".$newimage);

$con = new mysqli("localhost", "root", "", "project");
$ins=$con->query("INSERT INTO `property`(`name`, `price`, `photo`, `category`, `place`,`property_status`)VALUES('$name','$price','$newimage','$cat','$place','for sale')");
header("refresh:.1;url=manageproperty.php");
}
 ?>