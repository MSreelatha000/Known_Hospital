<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'login_db1');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $user_email = mysqli_real_escape_string($db, $_POST['user_email']);
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  //$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user_email)) { array_push($errors, "User_email is required"); }
  if (empty($user_name)) { array_push($errors, "user_name is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  
 /*if ($password_1 != $password_2) {
     array_push($errors, "The two passwords do not match");
  }*/

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_email='$user_email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_email'] === $user_email) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (user_email, user_name, password) 
  			  VALUES('$user_email', '$user_name', '$password_1')";
  	mysqli_query($db, $query);
  	$_SESSION['user_email'] = $user_email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: loginsignup.php');
  }
}



//User Login



if (isset($_POST['login'])) {
  $user_email = mysqli_real_escape_string($db, $_POST['user_email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($user_email)) {
  	array_push($errors, "User_email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM users WHERE user_email='$user_email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['user_email'] = $user_email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
