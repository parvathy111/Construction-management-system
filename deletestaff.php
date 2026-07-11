<?php
// include "connection.php";
$dbcon=mysqli_connect("localhost","root","","project");
if(!$dbcon) 
{
    echo"Connection failed!";
}

$uid=$_GET['staff_id'];

$sql1="Select*From Staff,tbl_login Where tbl_login.Login_id=$uid AND Staff.Login_id=$uid";

$data1=mysqli_query($dbcon,$sql1);

if($data1)
{
    $row=mysqli_fetch_array($data1);

    if(mysqli_num_rows($data1)>0)
    {
         $sql2="Delete From Staff Where Login_id=$uid";
         $sql3="Delete From tbl_login Where Login_id=$uid ";
         $data2=mysqli_query($dbcon,$sql2);
         $data3=mysqli_query($dbcon,$sql3);
        if($data2&&$data3)
         {
            
        echo "Successfully deleted";
        header("refresh:1;url=managestaff.php");
        }
         else
        {
    echo "Sorry Try Later";
      header("refresh:1;url=managestaff.php");
  }
    }
}
else
{
echo "Sorry Try Again";
  header("refresh:1;url=managestaff.php");
}
?>