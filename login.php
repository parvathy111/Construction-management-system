<?php
session_start(); 
include "connection.php";
if(isset($_POST['Login']))
{   
    $uname=$_POST['email'];
    $psswd=$_POST['Password'];
    $sql="Select*from tbl_Login where Login_username='$uname' AND Login_password='$psswd'";
    $data=mysqli_query($dbcon,$sql);
    if($data)
    { 
        if(mysqli_num_rows($data)==1)
        {
            $row=mysqli_fetch_array($data);
            if($row['Login_username']==$uname&&$row['Login_password']==$psswd) 
            {
            
                $_SESSION['User_name']=$row['Login_username'];
                $_SESSION['Name']=$row['Name'];
                $_SESSION['User_id']=$row['Login_id'];
                if($row['Login_role']=='admin')
                {
                    header("Location:admindashboard.html");
                }
                if($row['Login_role']=='user')
                {
                    header("Location:home.php");
                }
                if($row['Login_role']=='staff')
                {
                    header("Location:staffdashboard.html");
                }
               exit();
            }
           else
           {
               header("Location:login.html?error=Incorect User name or password"); 
               exit();
           }
        }
        else
        {   
            header("Location:login.html?error=Incorect User name or password");
            exit();
        }
    }
   
}
?>