<html>
    <head><title>Managestaff</title>
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
background-color: grey;
}
div{
width:100%;
}
table{
  width:100%;

}
input[type="text"]{
  width:100px;
  text-align:center;
  background-color: rgb(228, 220, 228);
}
input[type="button"]{
  margin-left:9px;
  border-radius:5px;
  padding:10px;
  background-color:orange;
}
input{
  border:none;
}
input[type="button"]:hover{
  border: 1px solid white;
}
input[type="text"]:focus{
  outline:none;
}th{
  background-color: rgb(165, 159, 165);
  border:1px solid white;
}
td{
  background-color: rgb(228, 220, 228);
  border:1px solid white;
}


    </style>
  </head>
    <body>
          <header style="display:flex;background-color:black;padding-bottom: 20px;">
        <div style="display:block;background-color:black;margin-left: 30px;margin-top: 20px;"><a class="back" href="admindashboard.html" style="padding: 10px 16px;color:orange">BACK</a></div>
    </header>
        <center><h1 style="color:black">STAFF DETAILS</h1></center>
        <a href="addstaff.html"><input type="button" value="ADD" style="padding:10px 50px;margin-left: 50px;color:black"></a><br><br>

        <?php
        $dbcon=mysqli_connect("localhost","root","","project");
        if(!$dbcon) 
        {
           echo"Connection failed!";
        }
          $sql="Select * from tbl_login,staff Where tbl_login.Login_id=staff.Login_id";
          $data=mysqli_query($dbcon,$sql);
          if ($data)
          { 
             if (mysqli_num_rows($data) > 0)  
            {
             ?>
             <div>
              <table>
                <tr>
                <th>STAFF NAME</th>
                <th>STAFF POST</th>
                <th>STAFF TYPE</th>
                <th>GENDER</th>
                <th>AGE</th>
                <th>JOINING DATE</th>
                <th>SALARY</th>
                <th>E-MAIL</th>
                <th>CONTACT</th>
                <th>PLACE</th>
                <th colspan="2">EDIT</th>
                </tr>
                  <?php While($row=mysqli_fetch_array($data))
                  {
                ?>
                <tr>
                  <form action="" method="post">
                  <td><input type="text" value="<?php echo $row['Name'];?>" name="sname" readonly></td>
                  <td><input type="text" value="<?php echo $row['Staff_post'];?>" name="spost" readonly></td>
                  <td><input type="text" value="<?php echo $row['Staff_type'];?>" name="stype" readonly></td>
                  <td><input type="text" value="<?php echo $row['Gender'];?>" name="sgndr" readonly></td>
                  <td><input type="text" value="<?php echo $row['Age'];?>" name="sage" readonly></td>
                  <td><input type="text" value="<?php echo $row['Date_of_joining'];?>" name="sdoj" readonly></td>
                  <td><input type="text" value="<?php echo $row['Salary'];?>" name="sslry" readonly></td>
                  <td><input type="text" value="<?php echo $row['Email'];?>" name="semail" readonly></td>
                  <td><input type="text" value="<?php echo $row['Contact'];?>" name="scntct" readonly></td>
                  <td><input type="text" value="<?php echo $row['place_of_work'];?>" name="plcw" readonly></td>
                  <td> <a href="deletestaff.php?staff_id=<?php echo $row['Login_id']?>"><input type="button" name="delete" value="DETELE"></td>
                  <td> <a href="updatestaff.php?staff_id=<?php echo $row['Login_id']?>"><input type="button" name="update" value="UPDATE"></td>
                  </form></tr>
                  <?php
                  } 
              }  
              else
              echo"no record added";
            }
            ?>
               
               </table></div>
                