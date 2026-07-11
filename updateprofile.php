<?php
session_start();
include "connection.php";
?>
<html>
    <head><title></title>
      <style>
        *{
            color: rgb(97, 95, 95);
        }
        body{
          margin:0;
          padding:0;
          margin-bottom:50px;
        }
        a{
          text-decoration:none;
        }
        
.back:hover {
  background-color: rgb(243, 243, 243);
}
  img{
    width:250px;
    height:250px;
  }
input{
 border:1px solid orange;
}
textarea{
  border:none;
}
table{
          
           text-align: left;
           vertical-align:middle;
        }
        label{
          margin:50px 50px;
        }
        input{
          padding:10px 10px;
        }
                input:focus{
   outline: none;
}
input[type="submit"]
{
  width:20%;
  border-radius: 5px;
  padding:15px 10px;
  background-color: orange;
  border:none;
  margin-left: 50px;
}

.button:hover{
border:1px solid rgb(255, 160, 239);
}
      </style>
</head>
<body>
   <header style="display:flex;background-color:black;padding-bottom: 20px;">
        <div style="display:block; margin-left: 30px;margin-top: 20px;"><a class="back" href="profile.php" style="padding: 10px 16px;color: orange;">BACK</a></div>
    </header>
 <center>
    </section>
    <section class="section2">
      <div class="cardsection">
        <div class="imagecontainer">
          <img src="image/user.png" alt="" style="margin-top:30px;">
        </div>
        <h1>Hi <?php echo $_SESSION['Name'];?> <br><br>Your Profile Is Here !!!</h1>
        <?php 
        $id=$_SESSION["User_id"];
        $sql="Select*From tbl_login Where Login_id=$id";
        $data=mysqli_query($dbcon,$sql);
        if($data)
        {
          if(mysqli_num_rows($data)>0)
          {
            $row=mysqli_fetch_array($data);
            ?>
            <div>
              <table><form action="" method="POST">
                <tr>
                  <th><label>Name</label></th>
                  <td><input type="text" value="<?php echo $row['Name'];?>" name="name" ></td>
                </tr>
                <tr>
                  <th><label>User Name</label></th>
                  <td><input type="text" value="<?php echo $row['Login_username'];?>" name="uname" ></td>
                </tr>
                <tr>
                  <th><label>Password</label></th>
                  <td><input type="password" value="<?php echo $row['Login_password'];?>" name="Password"></td>
                </tr>
                <tr>
                  <th><label>Re-Enter Password</label></th>
                  <td><input type="password" value="<?php echo $row['Login_password'];?>" name="rPassword"></td>
                </tr>
                <tr>
                  <th><label>Email</label></th>
                  <td><input type="email" value="<?php echo $row['Email'];?>" name="email" ></td>
                </tr>
                <tr>
                  <th><label>Contact</label></th>
                  <td><input type="text"  value="<?php echo $row['Contact'];?>" name="contact" ></td>
                </tr>
              </table><br>
              <input type="submit" class="button" value="UPDATE" name="update" style="color:black"></form> 
            </div>
            </section>
 </center>
<?php
if(isset($_POST['update']))
{
  
  $name=$_POST['name'];
  $psswd=$_POST['Password'];
  $rpsswd=$_POST['rPassword'];
  $email=$_POST['email'];
  $cntct=$_POST['contact'];
  $usnm=$_POST['uname'];
  if($psswd===$rpsswd)
    {
        if((strlen($psswd)>=5) && (strpbrk($psswd,"!#$.,:;()@")!=false))
        {
         $query=mysqli_query($dbcon,"SELECT*FROM tbl_login WHERE Login_username='$usnm' AND Login_id!=$id");
         
         if(mysqli_num_rows($query)==0)
         {
          $sql="Update tbl_login Set Login_username='$usnm',Name='$name',Login_password='$psswd',Email='$email',Contact='$cntct' Where Login_id=$id";
           
           $data=mysqli_query($dbcon,$sql);
           
           if($data)
           {
           $_SESSION['Name']=$name;
           
            echo"<center><i><b>Your Profile Is Success fully Updated</b></i></center>";
            header("refresh:1;url=profile.php");
            
         }
       }
        else
        {
            echo "<b>The username <i>".$usname."</i> is already taken. Please use another.</b>";
            header("refresh:1;url=updateprofile.php");
        }
      }
       else
       {
        echo "<center><i><b>Your password is not strong enough. Please use another.</b></i></center>";
         header("refresh:1;url=updateprofile.php");
       }
      }
      else
    {
      echo "<center><i><b>Your passwords did not match.<b></i></center>";
      header("refresh:1;url=updateprofile.php");
    }
        
}
          }
          else
           echo "sorry try again";
        }
        ?>


</body>
</html>