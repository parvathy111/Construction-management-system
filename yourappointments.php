<html>
    <body>
<style>
    body{
        margin:0;

        padding:0;
      }
      .navbar {
			display: flex;
			align-items: center;
			justify-content: center;
			top: 0px;
			cursor: pointer;
			overflow: hidden;
			
		}

		.background {
			background:black;
			background-blend-mode: darken;
			background-size: 100%;
			/* background: transparent; */
		}

		.nav-list {
			width: 100%;
			display: flex;
			align-items: center;
			
		}

		.logo {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.logo img {
			width: 140px;
			margin-left:1px ;
		}

		.nav-list li {
			list-style: none;
			padding: 15px 30px;
		}

		.nav-list li a {
			text-decoration: none;
			color: orange;
		}

		.nav-list li a:hover {
			color: grey;
		}

		.rightnav {
			width: 10%;
			text-align: right;
		}
        .appointment {
        background-color: grey;
		padding:10px;
		}
      th{
  background-color: orange;
  border:1px solid white;
}
button{
background-color:orange ;
border-radius: 5px;
height: 40px;
width:130px;
margin-left:30px
}
</style>
</body>
</html>
<header>
<?php
 include "nav.html";
 ?>
        </header>
    <h1 style="margin-left:650px">MY APPOINTMENT</h1>
        <table style="margin-left:140px">
            <tr>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">ID</th>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">APPOINTMENT DATE</th>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">APPOINTMENT TIME</th>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">PLACE</th>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">APPOINTMENT STATUS</th>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">EDIT</th>
            </tr>


            <?php
               include "connection.php";
               session_start();
                
         $uid=$_SESSION['User_id'];   
         $select="select*from tbl_client where tbl_client.login_id=$uid";
             $client=mysqli_query($dbcon,$select);
             if($client)
             {
                 $row=mysqli_fetch_array($client);
                 $clientid=$row['client_id'];
         
             }
             if(isset($_POST['delete']))
            {
                $id=$_POST['delete'];
                $res=$dbcon->query("delete from appointment where appointment_id='$id'");
            
}
            $res = $dbcon->query("select * from appointment where client_id='$clientid'");
            if ($res->num_rows > 0)
             {
                while ($r = mysqli_fetch_array($res)) 
                {
                    $id = $r['appointment_id'];
                
                    echo "<tr>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['appointment_id'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['appointment_date'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>".$r['appointment_time']."</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['place'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['appointment_status'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'><form action='' method='post'><button type='submit' name='delete' value='$id' id='dlbt'>CANCEL APPOINTMENT</button></form></td>  
        </tr>";
                }
            }
            ?>
        </table>
