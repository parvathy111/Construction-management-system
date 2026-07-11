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
        .booking {
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
height: 30px;
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
    <h1 style="margin-left:650px">MY BOOKING</h1>
        <table style="margin-left:260px">
            <tr>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">BOOKING ID</th>
                <!-- <th style="border: 1px solid black;border-collapse:collapse;padding:10px;">item</th> -->
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">PROPERTY</th>
                <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm;">STATUS</th>
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

                $select=mysqli_query($dbcon,"select * from booking where id=$id");
                $s = mysqli_fetch_array($select);
                $pid=$s['propertyid'];
                $update=mysqli_query($dbcon,"Update property set property_status='for sale' where id=$pid");
        
                $res=$dbcon->query("delete from booking where id='$id'");
            }

            $res = $dbcon->query("select * from booking where client_id=$clientid");
            if ($res->num_rows > 0)
             {
                while ($r = mysqli_fetch_array($res)) 
                {
                    $id = $r['id'];
                $pid=$r['propertyid'];
               $property=$dbcon->query("select * from property where id=$pid");
               if($property)
               {
                $rw=mysqli_fetch_array($property);
                 $img=$rw['photo'];
               }
                
                    echo "<tr>
        
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['id'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'><img src='uploads/$img' style='width:20rem'></td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['approval'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'><form action='' method='post'><button type='submit' name='delete' value='$id' id='dlbt'>CANCEL BOOKING</button></form></td>  
        </tr>";
                }
            }
            ?>
        </table>
