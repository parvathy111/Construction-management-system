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
    .property{
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
width:80px;
}
      
    </style>
  </body>
</html>

<header>
<?php
 include "nav.html";
 ?>
</header>
  
<?php 
// include'nav.php' 
?>

<div style="background-color:white;color:black;font:bolder;font-size:150%;">
<div style="display:flex;gap:10px;padding:10px;margin-left:650px">
<h3>OUR PROJECTS</h3>


</div>
    <!-- <table style="border-collapse:collapse;"> -->
        <table style="margin-left:50px">
        <tr>
            <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:2cm">id</th>
            <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">name</th>
            <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">price</th>
            <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">category</th>
            <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:5cm">place</th>
            <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:8cm">image</th>
            <th style="border: 1px solid black;border-collapse:collapse;padding:10px;width:2cm"></th>
        </tr>


        <?php
        include "connection.php";
      session_start();
        if (isset($_POST['book'])) {
            $pid = $_POST['book'];
$uid=$_SESSION['User_id'];   
$select="select*from tbl_client where tbl_client.login_id=$uid";
    $client=mysqli_query($dbcon,$select);
    if($client)
    {
        $row=mysqli_fetch_array($client);
        $clientid=$row['client_id'];

    }
    $id=0;
    $btime=date("H:i:s");
    $bdate=date("y-m-d");

            $query= "INSERT INTO booking VALUES ('$id','$clientid','$pid','requested','$btime','$bdate') ";
            $res=mysqli_query($dbcon,$query);
            if($res)
            {
              $update=mysqli_query($dbcon,"Update property set property_status='booked' where id=$pid");
                header("location:mybooking.php");
            }
        }

        $res = $dbcon->query("select * from property where property_status='for sale' ");
        if ($res->num_rows > 0) {
            while ($r = mysqli_fetch_array($res)) {
                $id = $r['id'];
                $img = $r['photo'];

                echo "<tr>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['id'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['name'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['price'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['category'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>" . $r['place'] . "</td>
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'><img src='uploads/$img' style='width:20rem'></td>
        
        <td style='border: 1px solid black;border-collapse:collapse;padding:10px;'>
        <form action='' method='post' ><button type='submit' name='book' value='$id' id='dlbt';>book</button></form></td>
      
    </tr>";
            }
        }
        ?>
    </table>
</div>
<?php 
// include'footer.php' 
?>
