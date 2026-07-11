<html>
    <head>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Appointment Form</title>
        <style>*
       {
			margin: 0;
			padding: 0;
			
		}
           *{
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            color:#FFFFFF;
	  
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
			margin-left:40px ;
		}

		.nav-list li {
			list-style: none;
			padding: 30px 30px;
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
		.contact {
        background-color: grey;
        padding:10px;
		}


     
	body{
		  background:url("image/interior4.jpg");
		  background-size:cover;
		  background-repeat:no-repeat;
                  opacity:0.9;
}
fieldset {
  display: block;
  margin-left: 450px;
  margin-right: 450px;
  margin-top: 50px;
  border-radius: 10px;
  background-color: rgb(42, 44, 44);
  height:550px;
  padding-bottom: 50px;
  
 
}
input,select {
  width:350px;
  padding: 9px 55px;
  margin-left: 50px;
  margin-right: 30px;
  margin-bottom: 30px;
  box-sizing:border-box;
  background-color: rgb(63, 64, 65);
  
}
    </style>
    </head>
    <body>
      <header>
<?php
 include "nav.html";
 ?>
    </header>
            
        <div> 
            <form action="Appointmentsubmit.php" method="post" name="appointment form" >
            <fieldset style="margin-left: 70px;margin-right:730px;padding: 2px 40px;">
              <h1 align="center" style="font-size: 30px;margin-top: 50px;">Appointment Form</h1><br><br>
            <label style="padding-left: 40px;">APPOINTNEMT DATE</label><input type="date" name="appointmentdate" style="width:340px;" min="<?php echo date("Y-m-d"); ?>" ><br><br>
            <label style="padding-left: 40px;">APPOINTMENT TIME</label><input type="time" name="appointmenttime" style="width:340px;"  min="09:30" max="19:30" ><br>
           
             
             <select name="place" placeholder="SELECTED PLACE" style="width:86%">
              <option selected>SELECTED PLACE</option>
              <option value="thiruvanathapuram">thiruvanathapuram</option>
              <option value="kollam">kollam</option>
              <option value="pathanamthitta">pathanamthitta</option>
              <option value="alapuzha">alapuzha</option>
              <option value="eranakuam">eranakuam</option>
              <option value="thrissur">thrissur</option>
              <option value="idukki">idukki</option>
              <option value="kottayam">kottayam</option>
              <option value="palakkad">palakkad</option>
              <option value="kozhikode">kozhikode</option>
              <option value="wayanad">wayanad</option>
              <option value="malappuram">malappuram</option>
              <option value="kannur">kannur</option>
              <option value="kazargod">kazargod</option>
             </select><br><br>
             <input type="text" name="additionalmessage" placeholder="ADDITIONAL MESSAGE" style="width:550px;margin-left: 50px;"><br><br>
            
            <input type="Submit" name="confirm" value="CONFIRM" size="200" style="color: rgb(0, 0, 0);background: #ffffff;border-radius: 10px;margin-left:140px">
            </fieldset></form></div>

            <fieldset style="margin-left: 900px;margin-right:100px;padding: 1px 20px;margin-top: -560px;margin-bottom:60px;background-color:white;opacity:0.9;color:black">
                <h1 align="left" style="font-size: 30px;color:black;margin-top: 50px;">ADDRESS</h1><br>
            Location: 123 Street W, MG Road Kochi, Kerala.<br><br>
            Phone Number:&nbsp
            +91 7438939838,&nbsp
            0484 327708<br><br>
            Email id:&nbsp
            mail@gmail.com<br><br><br><br><br>
            <h1 align="left" style="font-size: 30px;color:black">OPPENING HOURS</h1><br>
            Monday-Friday : 9am - 6pm<br><br>
            Saturday and Sunday : 10am - 4pm<br>
            </fieldset>
     </div>
     <footer style="background-color:black;padding: 30px;margin-top: 100px;"><center><font color="white">Chat Us On Instagram at silver_stone </font> </center>
     </footer>
     </body>
</html>

