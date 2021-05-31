<?php
    include("../includes/config.php");
    
if (isset($_POST['save']))
  {
      $email=$_POST['email'];
      $password=$_POST['password'];

      $querys="UPDATE tbluser SET password='$password' WHERE email='$email'";

  if(mysqli_query($connection, $querys)){
      header("refresh: 0; url= admin-myprofile.php");
  }else{
      echo "an error occured".$connection->error;
  }
}
?>