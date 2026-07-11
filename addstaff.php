<?php
// include "connection.php";
$dbcon=mysqli_connect("localhost","root","","project");
if(!$dbcon) 
{
    echo"Connection failed!";
}
if(isset($_POST['add']))

{
    $usname=$_POST['username'];
    $psswd=$_POST['password'];
    $rpsswd=$_POST['re-enterpassword'];
    if($psswd==$rpsswd)
    {
     
        if((strlen($psswd)>=5) && (strpbrk($psswd,"!#$.,:;()@")!=false))
        {
         $query=mysqli_query($dbcon,"SELECT*FROM tbl_login WHERE Login_Username='$usname'");
         
         if(mysqli_num_rows($query)==0)
         {
            $sql4="select*from tbl_Login";
           $data3=mysqli_query($dbcon,$sql4);
           if($data3)
           {
            $uid=mysqli_num_rows($data3);
           }
           $uid+=4;
           $sname=$_POST['staffname'];
           $psswd=$_POST['password'];
                      $uemail=$_POST['EmailID'];
           $ucntct=$_POST['ContactAddress'];
           $roll="staff";

           
           $sql="Insert into tbl_login values($uid,'$usname','$psswd','$roll','$sname','$uemail','$ucntct')";
           
           $data=mysqli_query($dbcon,$sql);
           
           if($data)
           {

            $query=mysqli_query($dbcon,"SELECT*FROM tbl_login WHERE Login_username='$usname'");
            if(mysqli_num_rows($query)==1)
            {
                
               $row=mysqli_fetch_array($query); 
               if($row)
               {
                $stuid=$row['Login_id'];
                $stid=0;
                $stype=$_POST['stafftype'];
                $spost=$_POST['staffpost'];
                $gender=$_POST['staffgender'];
                $age=$_POST['staffage'];
                $salry=$_POST['staffsalary'];
                $dj=$_POST['doj'];
                $addr=$_POST['address'];
                $plcw=$_POST['placew'];

                $sql="Insert into staff values ('$stype','$spost',$stid,'$gender',$age,$salry,'$dj',$stuid,'$addr','$plcw')";
                $data=mysqli_query($dbcon,$sql);
                if($data)
                {
                    $success = true;
                    echo"<b>Successfully Added</b>";
                    header("refresh:1;url=managestaff.php");
                }
               }    
             }
            }
        }
        else
        {
            echo "<b>The username <i>".$usname."</i> is already taken. Please use another.</b>";
            header("refresh:1;url=addstaff.html");
        }
          
        }
       else
       {
         echo "<b>Your password is not strong enough. Please use another.</b>";
         header("refresh:1;url=addstaff.html");
       }
          
    }
    else
    {
       echo "<b>Your passwords did not match.<b>";
       header("refresh:1;url=addstaff.html");
    }
        
}

?>