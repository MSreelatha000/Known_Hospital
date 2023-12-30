<?php

function check_login($con)
{
	if(isset($_SESSION['user_email']))
	{
		$email= $_SESSION['user_email'];
		$query ="select * from users where user_email=$ 'email' limit 1";

		$result = my_sqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{	
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;

		}
	}
	header("Location : loginsignup.php");

}
