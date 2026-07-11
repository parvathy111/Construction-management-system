<?php
include "connection.php";
if(isset($_POST['register']))
{
    $usname=$_POST['username'];
    $psswd=$_POST['password'];
    $rpsswd=$_POST['reenterpassword'];
    if($psswd===$rpsswd)
    {
        if((strlen($psswd)>=5) && (strpbrk($psswd,"!#$.,:;()@")!=false))
        {
         $query=mysqli_query($dbcon,"SELECT * FROM tbl_Login WHERE Login_username='$usname'");
         
         if(mysqli_num_rows($query)==0)
         {
           $sql4="select * from tbl_Login";
           $data3=mysqli_query($dbcon,$sql4);
           if($data3)
           {
            $uid=mysqli_num_rows($data3);
           }
           $uid=$uid+1;
           $utype="user";
           $uname=$_POST['name'];
           $uemail=$_POST['email'];
           $ucntct=$_POST['address'];
           $gender=$_POST['gender'];
           $ph=$_POST['phonenumber'];
           
           $sql="Insert into tbl_Login values($uid,'$usname','$psswd','$utype','$uname','$uemail','$ph')";
           
           $data=mysqli_query($dbcon,$sql);
          
           if($data)
           {
            
            $query=mysqli_query($dbcon,"SELECT*FROM tbl_Login WHERE Login_username='$usname'");
            if(mysqli_num_rows($query)==1)
            {
                
               $row=mysqli_fetch_array($query); 
               if($row)
               {
                $csuid=$row['Login_id'];
                $csid=0;
                $sql="Insert into tbl_Client values ($csid,'$ucntct','$gender',$csuid)";
                $data=mysqli_query($dbcon,$sql);
                if($data)
                {
                    $success = true;
                    echo"<center><i><b>Successfully Rgistered Please Login Now</b></i></center>";
                    header("refresh:1;url=login.html");
                }
               }    
             }
            }
        }
        else
        {
            echo "<b>The username <i>".$usname."</i> is already taken. Please use another.</b>";
            header("refresh:1;url=register.html");
        }
          
        }
       else
       {
        echo "<center><i><b>Your password is not strong enough. Please use another.</b></i></center>";
         header("refresh:1;url=register.html");
       }
          
    }
    else
    {
      echo "<center><i><b>Your passwords did not match.<b></i></center>";
       header("refresh:1;url=register.html");
    }
        
}

?>