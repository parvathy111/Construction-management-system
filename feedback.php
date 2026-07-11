<!DOCTYPE html>
    <html>
    <head>
    <style>
     
    body{
        font-family: 'Open Sans', sans-serif; 
        color:black; font-size:14px;
        background:url("image/interior6.jpg");
        background-size:cover;
		  background-repeat:no-repeat;
margin:0;
padding:0;
        }
    .form_box{
        width:600px; 
        padding:10px;
         background-color:white;
         opacity: 0.9;
        }
    input{
        padding:5px; 
         margin-bottom:5px;
        }
    input[type="submit"]{
        /* border:none; */
          background-color:orange; 
          color:white;
        }
    .heading{
        background-color:orange; 
        color:white;
         height:40px;
          width:100%; 
          line-height:40px; 
          text-align:center;
        }
    .shadow{
      -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
    -moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
    box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
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
        .feedback {
        background-color: grey;
		padding:10px;
		}
      th{
  background-color: orange;
  border:1px solid white;
}
    </style>
    <body>
    <header><?php
 include "nav.html";
 ?>
        </header>
  <center>
     <div class="form_box shadow" style="margin-top:150px;">
     <form method="post" action="">
     <div class="heading">
       Feedback Form 
     </div>
     <br/>
    
     <p >DO YOU ACHIEVE YOUR GOAL?</p>
         <input type="radio" name="quality" value="0"  required> yes &nbsp;&nbsp;
         <input type="radio" name="quality" value="1"  required> partialy&nbsp;&nbsp;
         <input type="radio" name="quality" value="2"  required> no
     <p>Do you have any suggestion for us? </p>
     <textarea name=" suggestion" rows="8" cols="40" required></textarea><br><br>
      <input type="submit" name="submit" value="Submit Form" style="margin-left:30px;width:3cm;"><br><br>
    </form>
     
    <?php
    error_reporting(0);
    $sname=$_POST['name'];
    $q_score = $_POST['quality'];
    $feedback_txt = $_POST['suggestion'];
    $dbcon = mysqli_connect("localhost", "root","", "project");
    session_start();
    $id=$_SESSION['User_id'];
    $sel="select * from tbl_login where Login_id=$id";
    $q=mysqli_query($dbcon,$sel);
    if($q)
    {
      $row=mysqli_fetch_array($q);
      $name=$row['Name'];
    }
    $query ="insert into feedback (name,quality_score, feedback) values ('$name',$q_score, '$feedback_txt')";
    $result = mysqli_query($dbcon,$query);
    if($result)
      echo "<center>Thank you for your feedback. We'll appreciate!</center>";
    else
    die("Something terrible happened. Please try again. ");
    ?>
    </div></center>
    </body>
    </html>