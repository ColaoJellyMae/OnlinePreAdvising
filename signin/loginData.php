<?php
   session_start();
   include("../includes/config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      // email and password sent from form 
      
      $myemail = mysqli_real_escape_string($connection,$_POST['email']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']);
   
      
      $sql = "SELECT * FROM tbluser WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($connection,$sql);
      
         // If result matched $myemail and $mypassword, table row must be 1 row
         
         if(mysqli_num_rows($result) == 1){

            $con = mysqli_fetch_array($result);

            $_SESSION['login_user'] = $myemail;
            $_SESSION['id'] = $con['id'];
            $userid= $con['id'];
            $_SESSION['college_id_fk'] = $con['college_id_fk'];
            $_SESSION['usertype'] = $con['usertype'];
            $_SESSION['firstname'] = $con['firstname'];
            $_SESSION['lastname'] = $con['lastname'];
            $_SESSION['email'] = $con['email'];
            $_SESSION['password'] = $con['password'];
            $_SESSION['login_message'] = "success";

            $select_email = mysqli_query($connection,"SELECT * FROM tbluser WHERE email='$myemail'");

            while($fa = mysqli_fetch_array($select_email))
            {
               $getuser_id = $fa['id'];
               $user_email = $fa['email'];
            }

            $check_submission_grades_status = "SELECT * FROM tblstudent_grades_sub WHERE student_id_fk = '$getuser_id'";
            $getresult = mysqli_query($connection,$check_submission_grades_status);
            if(mysqli_num_rows($getresult) == 1){

               $fa_g = mysqli_fetch_array($getresult);

               $idgrad = $fa_g['id'];
               $grades_status = $fa_g['submission_status'];
               $_SESSION['submission_status'] = $fa_g['submission_status'];

            $check_submission_grades = mysqli_query($connection,"SELECT * FROM tblstudent_grades_sub WHERE id = '$idgrad'");
            while($getgrad = mysqli_fetch_array($check_submission_grades))
            {
               $getgrad_id = $getgrad['id'];
               $getgrad_sub = $getgrad['submission_status'];
               $_SESSION['submission_status'] = $getgrad['submission_status'];
            }
         }
         
            $check_submission_subjects_status = "SELECT * FROM tblstudent_subject_sub WHERE student_id_fk = '$getuser_id'";
            $getsresult = mysqli_query($connection,$check_submission_subjects_status);
            if(mysqli_num_rows($getsresult) == 1){

                $fa_s = mysqli_fetch_array($getsresult);

                $idsub = $fa_s['id'];
                $subjects_status = $fa_s['submission_status'];
                $_SESSION['submission_status'] = $fa_s['submission_status'];
      
            $check_submission_subjects = mysqli_query($connection,"SELECT * FROM tblstudent_subject_sub WHERE id = '$idsub'");
            while($getsub = mysqli_fetch_array($check_submission_subjects))
            {
               $getid_sub = $getsub['id'];
               $getsubj_sub = $getsub['submission_status'];
               $_SESSION['submission_status'] = $getsub['submission_status'];
            }
         }
            
            if($con['usertype'] == "Superadmin"){
               header("refresh: 0; url= ../Superadmin/superadmin-dashboard.php");
            }else if($con['usertype'] == "Admin"){
               header("refresh: 0; url= ../Admin/admin-dashboard.php");
            }else if($con['usertype'] == "Adviser"){
               header("refresh: 0; url= ../Adviser/adviser-dashboard.php");            
            }else if($con['usertype'] == "Student" && $getgrad_sub == "Pending"){
               header("refresh: 0; url= ../Student/student-ii.php");
            }else{
               header("refresh: 0; url= ../Student/student-i.php");
            }
         }
         else 
         {
            $_SESSION['login_message'] = "error";      
            header("refresh: 0; url= ../signin/universal-signin.php");
         }
      }
?>