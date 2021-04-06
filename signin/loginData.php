<?php
   session_start();
   include("../includes/config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection,$_POST['username']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']);
   
      
      $sql = "SELECT * FROM tblusers WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($connection,$sql);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if(mysqli_num_rows($result) == 1){

      	$con = mysqli_fetch_array($result);

         $_SESSION['login_user'] = $myusername;
         $_SESSION['userid'] = $con['id'];
         $_SESSION['username'] = $con['username'];
         $_SESSION['password'] = $con['password'];
         $_SESSION['usertype'] = $con['usertype'];
         $_SESSION['collegeid']= $con['collegeid'];
         $_SESSION['status'] = $con['status'];


         if($con['usertype'] == "Superadmin"){
            header("refresh: 0; url= ../users/SuperAdmin/superadmin-homepage.php");
         }else if($con['usertype'] == "Admin"){
         	header("refresh: 0; url= ../users/Admin/admin-homepage.php");
         }else if($con['usertype'] == "Adviser"){
            header("refresh: 0; url= ../users/Adviser/adviser-homepage.php");
         }else if($con['usertype'] == "Student"){
         	header("refresh: 0; url= ../users/Student/student-i.php");
         }
         else 
         {
            $_SESSION['error_login'] = "Invalid Username or Password , Please check!";       
            header("refresh: 0; url= ../signin/universal-signin.php");
         }
      }
      else 
      {
         $_SESSION['error_login'] = "Invalid Username or Password , Please check!";       
         header("refresh: 0; url= ../signin/universal-signin.php");
      }
   }
?>