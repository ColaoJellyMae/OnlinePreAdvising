<?php
   include('../../config/config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connection,"select id from account where username = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['id'];
   
   if(!isset($_SESSION['login_user'])){
      header("refresh: 0; url ../WEBSITE/signin/universal-signin.php");
      die();
   }
?>