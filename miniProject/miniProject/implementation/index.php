<?php

include('functions.php');
session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Known Hospital</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
	<link rel="shortcut icon" href="knownhospital.jpg"/>
	
</head>
<body>
<nav>
	<a href="index.html" class="logo">

		<img src="knownhospital.jpg"/>
    <p class="name" style="margin-top:-50px;margin-left:60px;font-size: 25px;">Known Hospital</p>

	</a>
<input type="checkbox" class="menu-btn" name="" id="menu-btn"/>
<label class="menu-icon" for="menu-btn">
	<span class="nav-icon"></span>
</label>
<ul class="menu">

	<li><a href="#">Home</a></li>
	<li><a href="hospital.php">Hospitals</a></li>
	<li><a href="bt/index.html">about</a></li>
	<li><a href="contact.html">Contact-Us</a></li>
	<li> <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"> Login/Signup</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="loginsignup.php">Patient</a>
    <a href="staff.php">Hospital</a>
    
    
  </div>
</div> </li>
		
</ul>

<div class="search">
	<input type="text" name="" placeholder="search"/>
	<i class="fas fa-search"></i>

</div>
</nav>
<p>Hello welcone to the Know Hospital</p>
<p>please login if we are not the user of this site. Later you can take appoinment</p>

<!-------------------------->


<script type="text/javascript">
	function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>	
</body>
</html>
