<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'login_db1');

// REGISTER USER
if (isset($_POST['sign'])) {
  // receive all input values from the form
  $hospital_name = mysqli_real_escape_string($db, $_POST['hospital_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $specalist_1 = mysqli_real_escape_string($db, $_POST['specalist_1']);
  $specalist_2 = mysqli_real_escape_string($db, $_POST['specalist_2']);
  $specalist_3 = mysqli_real_escape_string($db, $_POST['specalist_3']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($hospital_name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($specalist_1)) { array_push($errors, "specalist_1 is required"); }
  
 // if ($password_1 != $password_2) {
//	array_push($errors, "The two passwords do not match");
 // }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM staffs WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }

  //  if ($user['email'] === $email) {
    //  array_push($errors, "email already exists");
    //}
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO staffs (hospital_name, email, password,address,specalist_1,specalist_2,specalist_3) 
  			  VALUES('$hospital_name', '$email', '$password_1','$address','$specalist_1','$specalist_2','$specalist_3')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: staff.php');
  }
}


//User Login



if (isset($_POST['some'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Hospital_email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM staffs WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: update.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
