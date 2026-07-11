<!DOCTYPE html>

<html>

<head>
	<title>silver stone</title>

	<style>
		* {
			margin: 0;
			padding: 0;
			
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
		.home {
        background-color: grey;
		padding:10px;
		}
		
		.box-main {
			display: flex;
			justify-content: center;
			align-items: center;
			color: black;
			max-width: 80%;
			margin: auto;
			height: 200%;
		}

		.firsthalf {
			max-width: 100%;
			display: flex;
			flex-direction: column;
			justify-content: center;
                        height: 200%;
                        margin-bottom: 60px;
		}

		.text-big {
			
			font-weight: bold;
			font-size: 35px; 
		
		}

		.text-small {
			font-size: 20px;
		}

		.btn {
			padding: 30px 20px;
			margin: 7px 0;
			border: 2px solid white;
			border-radius: 10px;
			background: none;
			color: white;
			cursor: pointer;
		}

		.btn-sm {
			padding: 6px 10px;
			vertical-align: middle;
		}

		.section {
			height: 400px;
			display: flex;
			align-items: center;
			justify-content: center;
			max-width: 100%;
			margin: auto;
		}

		

		.text-footer {
			text-align: center;
			padding: 30px;
			font-family: 'Ubuntu', sans-serif;
			display: flex;
			justify-content: center;
			color: white;
                        
                         
		}

		.container{
			position:relative;

		}

		.centered{
			position:absolute;
			top:150px;
			left:25%;
			
		}
	</style>
</head>

<body>

	<header>
		<?php
		 include "nav.html";
		 ?>
			</header>
	<center>
	<div class="container">
	<img src= "image/interior5.jpg" style = "width:100%;background-attachment:fixed;background-size:cover;background-repeat:no-repeat;">
	<p class="centered" ><font color="white"  style="font-size:300%;text-shadow:1px 1px 1px black;"> Hi Client!</font><br><font color="white"  style="font-size:480%;text-shadow:2px 1px 3px black; font-family: 'Piazzolla', serif; ">Welcome To Silver Stone</font><br>
	<font color="white"  style="font-size:200%;text-shadow:1px 1px 1px black;"> Find your forever home in the best place. We will build your<br> perfect home with our experience... </font>
     </p></div>
	</center>
	<footer><div class="background">
		<!-- <img src="icons.png" alt="icon" style="width:8%;margin-bottom: 20px;margin-left: 700px;margin-top: -10px;"> -->
		<p class="text-footer">
		Copyright 2022-Construction Silver Stone.All rights are reserved
		</p></div>
	</footer>
	
</body>
</html>
