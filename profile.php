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

        }
li a:hover {
  background-color: rgb(243, 243, 243);
}
img{
    width:250px;
    height:250px;
}
.profile {
  background-color: #ecf1ef;
}
input{
  border:none;
}
textarea{
  border:none;
}
table{
          
           text-align: left;
           vertical-align:middle;
        }
        label{
          margin:50px 10px;
        }
        input{
          padding:10px 10px;
        }
                input:focus{
   outline: none;
}
input[type="button"]
{
  width:50%;
  border-radius: 5px;
  padding:20px 5px;
  background-color: orange;
}
.button:hover{
border:1px solid orange;
}
 .main
    {
    padding: 500px;
    background:url("image/interior4.jpg");
     background-size: cover;
     object-fit:cover;
     filter: blur(5px);
    background-position: center;
    background-repeat: no-repeat;
    }
    .section2{
      position: absolute;
      top: 15%;
      left:32%;
      border-radius:15px;
      background:white;
      width:500px;
      padding:15px;
    }
      </style>
</head>
<body>
      
      <header style="display:flex;background-color:black;padding-bottom: 20px;">
        <div style="display:block;background-color:black;margin-left: 30px;margin-top: 20px;"><a class="back" href="staffdashboard.html" style="padding: 10px 16px;color:orange">BACK</a></div>
    
       
   </header>
   <div class="main"></div>
 <center>
    </section>
    <section class="section2">
      <div class="cardsection">
        <div class="imagecontainer">
          <img src="image/user.png" alt="">
        </div>
        <h1>Hi <?php echo $_SESSION['Name'];?> <br><br>Your Profile Is Here !!!</h1>
        <?php 
        $id=$_SESSION['User_id'];
         //$dbcon=mysqli_connect("localhost","root","","project");

        $sql="Select*From tbl_login Where Login_id=$id";
        $data=mysqli_query($dbcon,$sql);
        if($data)
        {
          if(mysqli_num_rows($data)>0)
          {
            $row=mysqli_fetch_array($data);
            ?>
            <div>
              <table>
                <tr>
                  <th><label>Name</label></th>
                  <td><input type="text" value="<?php echo $row['Name'];?>" name="name" readonly></td>
                </tr>
                <tr>
                  <th><label>User Name</label></th>
                  <td><input type="text" value="<?php echo $row['Login_username'];?>" name="uname" readonly></td>
                </tr>
                <tr>
                  <th><label>Password</label></th>
                  <td><input type="text" value="<?php echo $row['Login_password'];?>" name="Password" readonly></td>
                </tr>
                <tr>
                  <th><label>Email</label></th>
                  <td><input type="text" value="<?php echo $row['Email'];?>" name="email" readonly></td>
                </tr>
                <tr>
                  <th><label>Contact</label></th>
                  <td><input type="text"  value="<?php echo $row['Contact'];?>" name="contact" readonly></textarea></td>
                </tr>
              </table><br>
              <a href="updateprofile.php" ><input class="button" type="button" value="UPDATE PROFILE" name="upadate"></a> 
            </div>
<?php
          }
          else
           echo "sorry try again";
        }
        ?>

</section>
 </center>
</body>
</html>