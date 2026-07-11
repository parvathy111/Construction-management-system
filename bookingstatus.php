<?php
 include "connection.php";
 $od=$_POST['pid'];
if(!empty($_POST['check'])){

foreach($_POST['check'] as $selected)
{
$update="Update booking set approval='$selected' where propertyid=$od";
  $data=mysqli_query($dbcon,$update);
  if($data)
  {
  $r=1;
  }
}
if($r==1)
{
  header("refresh:.1;url=viewbookingstaff.php");
}
}

?>