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


    </style>
  </head>
    <body>
          <header style="display:flex;background-color:black;padding-bottom: 20px;">
        <div style="display:block;background-color:black;margin-left: 30px;margin-top: 20px;"><a class="back" href="admindashboard.html" style="padding: 10px 16px;color:orange">BACK</a></div>
    </header>
        <center><h1 style="color:orange">BOOKING DETAILS</h1></center>
        <!-- <a href="addstaff.html"><input type="button" value="ADD" style="padding:10px 50px;margin-left: 50px;color:black"></a><br><br> -->

        <?php
        $dbcon=mysqli_connect("localhost","root","","project");
        if(!$dbcon) 
        {
           echo"Connection failed!";
        }
          $sql="Select * from booking where booking.id";
          $data=mysqli_query($dbcon,$sql);
          if ($data)
          { 
             if (mysqli_num_rows($data) > 0)  
            {
             ?>
             <div>
              <table>
                <tr>
                <th>ID</th>
                <th>CLIENT ID</th>
                <th>PROPERTY ID</th>
                <th>STATUS</th>
                <th>BOOKING TIME</th>
                <th>BOOKING DATE</th>
                <!-- <th colspan="2">EDIT</th> -->
                </tr>
                  <?php While($row=mysqli_fetch_array($data))
                  {
                ?>
                <tr>
                  <form action="" method="post">
                  <td><input type="text" value="<?php echo $row['id'];?>" name="id" readonly></td>
                  <td><input type="text" value="<?php echo $row['client_id'];?>" name="cid" readonly></td>
                  <td><input type="text" value="<?php echo $row['propertyid'];?>" name="pid" readonly></td>
                  <td><input type="text" value="<?php echo $row['approval'];?>" name="appl" readonly></td>
                  <td><input type="text" value="<?php echo $row['book_time'];?>" name="btme" readonly></td>
                  <td><input type="text" value="<?php echo $row['book_date'];?>" name="bdte" readonly></td>
                  </form></tr>
                  <?php
                  } 
              }  
              else
            
              echo"no record added";
            }
            ?>
               
               </table></div>
                