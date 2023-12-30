<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'login_db1');

// REGISTER USER
if (isset($_POST['update'])) {
  // receive all input values from the form
  $email= mysqli_real_escape_string($db, $_POST['email']);
  $doctor_availability = mysqli_real_escape_string($db, $_POST['doctor_availability']);
  $appointment = mysqli_real_escape_string($db, $_POST['appointment']);
  $beds= mysqli_real_escape_string($db, $_POST['beds']);
  //$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($doctor_availability)) { array_push($errors, "doctor_availability is required"); }
  if (empty($appointment)) { array_push($errors, "appointments is required"); }
  if (empty($beds)) { array_push($errors, "beds required"); }
  
 /*if ($password_1 != $password_2) {
     array_push($errors, "The two passwords do not match");
  }*/

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM staffs WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
   if ($user['email'] === $email) {
      $query = "UPDATE staffs set doctor_availability = '$doctor_availability' WHERE email='$email'";
  	  mysqli_query($db, $query);
  	  $query = "UPDATE staffs set appointment = '$appointment' WHERE email='$email'";
  	  mysqli_query($db, $query);
  	  $query = "UPDATE staffs set beds = '$beds' WHERE email='$email'";
  	  mysqli_query($db, $query);
  	  
  }
  	//$_SESSION['user_email'] = $user_email;
  	//$_SESSION['success'] = "You are now logged in";
    }
  
    echo "updated succesfully";
 
  	
  	header('location: update.php');
  

}

//<?--$sql = "SELECT * FROM staffs ORDER BY id DESC ";
//$get = $mysqli->query($sql);
//$mysqli->close(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		
		<form action="" method="post" enctype="multipart/form-data">
			<div style="font-size: 20px;margin: 10px;color: white;">Update</div>
			<label for="email"><b>Hospital Email</b></label>
			<input id="text" type="email" name="email"><br><br>
			<label for="email"><b>docor availability</b></label>
			<input id="text" type="text" name="doctor_availability"><br><br>
			<label for="Appointment"><b>Appointments booked</b></label>
			<input id="random_num" type="random_num" name="appointment"><br><br>
			<label for="beds"><b>Available Beds</b></label>
			<input type="random_num" name="beds" placeholder="no.of beds"><br><br>
			
			<input type="submit" name="update" value="Update">
			
		</form>
	</div>
</body>

</html>