<?php

include('staffregister.php');	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOG-IN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
<section>
	<div class="container">
		<div class="user signinbox">
			<div class="imgbox"><img src="staff1.png"></div>
			<div class="formbox">
				<form action="" method="post" enctype="multipart/form-data">
					<h2>Sign In</h2>
					<input type="text" name="email" placeholder="Hospital email">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="some" value="Login">
					<p class="signup">Don't have an account ?<a href="#" onclick="toggleForm();">Sign Up</a></p>
					<p><a href="forgot.html">Forgot password</a></p>
					<p><a href="index.html">Home</a></p>
				</form>
		</div>	
	</div>
		<div class="user signupbox">
			<div class="formbox">
				<form action="" method="post" enctype="multipart/form-data">
					<h2>Create an account</h2>
					<input type="text" name="hospital_name" placeholder="Hospital Name">
					<input type="email" name="email" placeholder=" Hospital Email">
					<input type="password" name="password_1" placeholder=" Create Password">
					<input type="password" name="" placeholder=" Confirm Password">
					<input type="address" name="address" placeholder="enter address">
					<input type="text" name="specalist_1" placeholder="specalist type">
                         <input type="text" name="specalist_2" placeholder="specalist type">
                         <input type="text" name="specalist_3" placeholder="specalist type">
                         
                
					<input type="submit" name="sign" value="Sign Up">
					<p class="signup">Already have an account ?<a href="#" onclick="toggleForm();">Sign In</a></p>
					<p><a href="index.php">Home</a></p>
				</form>
		</div>	
		<div class="imgbox"><img src="staff.png"></div>
	</div>
</div>
</section>
<script type="text/javascript">
	function toggleForm() {
		var container = document.querySelector('.container');
		container.classList.toggle('active')
	}
</script>
</body>
</html>
