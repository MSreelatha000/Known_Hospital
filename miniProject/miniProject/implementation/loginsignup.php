<?php

include('register.php');	
	
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
			<div class="imgbox"><img src="user.png"></div>
			<div class="formbox">
				<form action="" method="post" enctype="multipart/form-data">
					<h2>Sign In</h2>
					<input type="email" name="user_email" placeholder="Useremail">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="login" value="Login">
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
					<input type="email" name="user_email" placeholder="User Email">
					<input type="text" name="user_name" placeholder="User Name">
					<input type="password" name="password_1" placeholder="Create Password">
					<input type="password" name=" " placeholder="Confirm Password">
					<input type="submit" name="submit" value="Sign Up">
					<p class="signup">Already have an account ?<a href="#" onclick="toggleForm();">Sign In</a></p>
					<p><a href="index.html">Home</a></p>
				</form>
		</div>	
		<div class="imgbox"><img src="user1.png"></div>
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
