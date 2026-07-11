<?php
 include "connection.php";
 $od=$_POST['appid'];
if(!empty($_POST['check'])){

foreach($_POST['check'] as $selected)
{
$update="Update appointment set appointment_status='$selected' where appointment_id=$od";
  $data=mysqli_query($dbcon,$update);
  if($data)
  {
  $r=1;
  }
}
if($r==1)
{
  header("refresh:.1;url=viewappointmentsstaff.php");
}
}

?>