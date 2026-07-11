<html>
    <head><title>view client</title>
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
  height:40px;
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
  height:40px;
}
td{
  background-color: rgb(228, 220, 228);
  border:1px solid white;
  text-align:center;
}
input[type="checkbox"]
{
  margin-left:20px;
  accent-color: blue;
}
input[type="checkbox"][readonly] {
  pointer-events: none;
}

    </style>
  </head>
    <body>
          <header style="display:flex;background-color:black;padding-bottom: 20px;">
        <div style="display:block;background-color:black;margin-left: 30px;margin-top: 20px;"><a class="back" href="staffdashboard.html" style="padding: 10px 16px;color:orange">BACK</a></div>
    </header>
        <center><h1 style="color:orange">APPOINTMENT DETAILS</h1></center>
        <!-- <a href="addstaff.html"><input type="button" value="ADD" style="padding:10px 50px;margin-left: 50px;color:black"></a><br><br> -->

        <?php
        $dbcon=mysqli_connect("localhost","root","","project");
        error_reporting(0);
        if(!$dbcon) 
        {
           echo"Connection failed!";
        }
          $sql="Select * from appointment where appointment.appointment_id";
          $data=mysqli_query($dbcon,$sql);
          if ($data)
          { 
             if (mysqli_num_rows($data) > 0)  
            {
              
             ?>
             <div>
              <table>
                <tr>
                <th>APPOINTMENT DATE</th>
                <th>APPOINTMENT TIME</th>
                <th>PLACE</th>
                <th>ADDITIONAL MESSAGE</th>
                <th>APPOINTMENT ID</th>
                <th>CLIENT ID</th>
                <th>STATUS</th>
                <!-- <th colspan="2">EDIT</th> -->
                </tr>
                  <?php While($row=mysqli_fetch_array($data))
                  {
                    $os=$row['appointment_status'];
                ?>
                <tr>
                  <form action="appointmentstatus.php" method="post">
                  <td><input type="text" value="<?php echo $row['appointment_date'];?>" name="dte" readonly></td>
                  <td><input type="text" value="<?php echo $row['appointment_time'];?>" name="tme" readonly></td>
                  <td><input type="text" value="<?php echo $row['place'];?>" name="plc" readonly></td>
                  <td><input type="text" value="<?php echo $row['additional_message'];?>" name="admsg" readonly></td>
                  <td><input type="text" value="<?php echo $row['appointment_id'];?>" name="appid" readonly></td>
                  <td><input type="text" value="<?php echo $row['Client_id'];?>" name="cid" readonly></td>
                  <td><table><tr><td>Reject</td><td>Grant</td></tr><tr><td><input type="checkbox" name="check[]" onclick="submit()" value="Rejected"
                <?php if($os=='Rejected')
                {
                  ?>
                checked readonly
                <?php
              }
              ?> ></td><td><input type="checkbox" name="check[]" onclick="submit()" value="Granted"
                <?php 
                if($os=='Granted')
                {
                  ?>
                checked readonly 
                <?php
              }
              ?> ></td>
              </tr></table></form></td>
                
                 </tr>
                  <?php } ?> 
                  </table></div>
                  <?php
              }  
              else
              echo"no record added";
            }
          
            ?>
               
               <script>
        function submit() {
            let form = document.getElementById("form");
            form.submit();
            alert("Data stored in database!");
        }

    </script>




    </body>
</html>
                