<?php
   include('database.php');
   session_start();
   
   $user_check = $_SESSION['save'];
   
   $ses_sql = mysqli_query($db,"select user_email from users where username = '$user_name' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
