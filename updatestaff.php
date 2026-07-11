
<html>
    <head><title>Updatestaff</title>
    <style>
      body{
        margin:0;

        padding:0;
      }
      *{
        color:black;
      }
      a{
        text-decoration:none;
      }
      div a.back:hover{
background-color: rgb(228, 221, 235);
}
label{
            margin-left: 55px;
            font-size:80%;
}

table{
  width:100%;
}

input[type="submit"]{
  margin-left:20px;
  border-radius:5px;
  padding:10px;
  background-color:brown;
}

  input{
            padding-top: 10px;
            padding-bottom: 10px;
            width:90%;
            margin-left: 10px;
            background-color:  brown;
            border: none;
            margin-bottom:10px;
            text-align: middle;
            
            text-align:center;
            border-radius:4px;
            margin-top:2px;
        }
        input[readonly]
{
  border:none;
    background:lightgrey;
}
input[type="text"]:focus{
  border: 1px solid rgb(237, 155, 240);
}
input[type="button"]:hover{
  border: 1px solid rgb(237, 155, 240);
}
input[type="text"]:focus{
  outline:none;
}
input[type="submit"]:hover{
  border: 1px solid rgb(237, 155, 240);
}
fieldset {
  display:block;
  margin-left: 500px;
  margin-right: 300px;
  margin-top: 80px;
  border-radius: 10px;
  background-color: white;
  padding: 45px 85px;
  filter: brightness(8px);
  border:none;
  position: absolute;
  top: 5%;
}
 .main
    {
    padding:345px;
      background:url("image/interior8.jpg");
     background-size: cover;
     object-fit:cover;
     filter: blur(5px);
    background-position: center;
    background-repeat: no-repeat;
    }
    span
    {
        color:red;
    }

    </style>
  </head>
    <body>
          <header style="display:flex;background-color:brown;padding-bottom: 20px;">
        <div style="display:block;background-color: brown;margin-left: 30px;margin-top: 20px;color:orange;"><a class="back" href="managestaff.php" style="padding: 10px 16px;">BACK</a></div>
    </header>
    <div class="main"></div><fieldset>     <center><h1> UPDATE STAFF DETAILS</h1></center>
        <?php
          include "connection.php";
          $uid=$_GET['staff_id'];
          
          $sql="Select*From tbl_login,staff Where tbl_login.Login_id=$uid AND staff.Login_id=$uid";
          $data=mysqli_query($dbcon,$sql);
          if($data)
          {
            
            if(mysqli_num_rows($data)>0)
            {
              
          ?><div>
              <table>
                  <?php $row=mysqli_fetch_array($data)
                  
                ?>
                
                  <form action="" method="post">
                  <tr><td><label>STAFF TYPE<span>*</span></label><br><input type="text"  value="<?php echo $row['Staff_type'];?>" name="stype" ></td>
                  <td><label>STAFF POST<span>*</span></label><br><input type="text"  value="<?php echo $row['Staff_post'];?>" name="spost"></td></tr>
                  <tr><td><label>STAFF ID<span>*</span></label><br><input type="text"  value="<?php echo $row['Staff_id'];?>" name="stid" readonly></td>
                  <td><label>GENDER<span>*</span></label><br><input type="text" value="<?php echo $row['Gender'];?>" name="sgndr" readonly></td></tr>
                  <tr><td><label>AGE<span>*</span></label><br><input type="text" value="<?php echo $row['Age'];?>" name="sage" readonly></td>
                  <td><label>SALARY<span>*</span></label><br><input type="text" value="<?php echo $row['Salary'];?>" name="sslry" ></td></tr>
                  <tr><td><label>JOINING DATE<span>*</span></label><br><input type="text"  value="<?php echo $row['Date_of_joining'];?>" name="date" readonly></td>
                  <td><label>LOGIN ID<span>*</span></label><br><input type="text" value="<?php echo $row['Login_id'];?>" name="semail" readonly></td></tr>
                  <tr><td><label>ADDRESS<span>*</span></label><br><input type="text" value="<?php echo $row['address'];?>" name="semail" readonly></td>
                  <td><label>PLACE OF WORK<span>*</span></label><br><input type="text"  value="<?php echo $row['place_of_work'];?>" name="plcw"></td></tr>
                  <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                  <td colspan="2"><input type="submit" value="Update" name="update"></a></td>
                <form></tr>
              
              </table></div>
            </filedset>
           <?php
if(isset($_POST['update']))
{
$stp=$_POST['stype'];
$stt=$_POST['spost'];
$sts=$_POST['sslry'];
$plcw=$_POST['plcw'];
$sql1="Select*From staff Where Login_id=$uid";
$data1=mysqli_query($dbcon,$sql1);
if($data1)
{
    
   if(mysqli_num_rows($data1)>0)
    {
        $sql2="Update staff Set Staff_post='$stp',Staff_type='$stt',Salary=$sts,place_of_work='$plcw' Where Login_id=$uid";
        $data2=mysqli_query($dbcon,$sql2);
        if($data2)
        {
     
         echo "<center><i><b>Successfully Updated</b></i></center>";
         header("refresh:.1;url=managestaff.php");
        }
    }
    else
    {
     echo "<center><i><b>Sorry Try Again</b></i></center>";
    header("refresh:1;url=updatestaff.php");
}
}
else
{
    echo "<center><i><b>Sorry Try Again</b></i></center>";
header("refresh:1;url=updatestaff.php");
}
}
   }
            else
            echo "<center><i><b>No matching records</b></i></center>";
          }
?>
</body>
</html>