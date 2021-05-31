<?php
	session_start();
	include("../includes/config.php");

	if (isset($_POST['submit-request']))
	{
			$firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
			$lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
			$contact = mysqli_real_escape_string($connection,$_POST['contact']);
			$email = mysqli_real_escape_string($connection,$_POST['email']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$status = mysqli_real_escape_string($connection,$_POST['status']);
			$department = mysqli_real_escape_string($connection,$_POST['department']);
			$coursecode = mysqli_real_escape_string($connection,$_POST['coursecode']);
			$yearlevel = mysqli_real_escape_string($connection,$_POST['yearlevel']);
			$adviser_email = mysqli_real_escape_string($connection,$_POST['adviser_email']);


			$name = $firstname." ".$lastname;
			$extension ="@wmsu.edu.ph";
			//email with extension 
			$student_email = $email.$extension;
			$usertype = "Student";

			//get college id
			$check_college = mysqli_query($connection,"SELECT * FROM tblcollege WHERE college='$department'");
			if(mysqli_num_rows($check_college) > 0){
				$fa_col = mysqli_fetch_array($check_college);
				$collegeid = $fa_col['id'];
			}

			//get course id
			$check_course = mysqli_query($connection,"SELECT * FROM tblcourse WHERE coursecode='$coursecode'");
			if(mysqli_num_rows($check_course) > 0){
				$fa_c = mysqli_fetch_array($check_course);
				$courseid = $fa_c['id'];
			}

			//password length
			$pass_len = strlen($password);
			if($pass_len < 8){
				$_SESSION['request_alert_message'] = "pass_len_error";
				header("location: staff-request.php");
			 }
			 else{	
				//get admin id
				$getadviser_id = "SELECT * FROM tbluser WHERE email='$adviser_email'";

				$myData = mysqli_query($connection,$getadviser_id);
				while($get = mysqli_fetch_array($myData)) { 
					$adviserid = $get['id'];
				}

				$check_email = mysqli_query($connection,"SELECT * from tbluser WHERE email='$email'");

				if(mysqli_num_rows($check_email) > 0){
					$_SESSION['adviser_alert_message'] = "emailexisted";
					header("location: staff-request.php");
				}

				$sectioncode = $coursecode.$yearlevel;
		
				$sql_a ="INSERT INTO `tblrequest_account`(`firstname`, `lastname`,`contact`, `email`, `password`, `req_usertype`,`college_id_fk`,`course_id_fk`,`yearlevel`,`user_id_fk`) VALUES ('$firstname', '$lastname','$contact','$email','$password','$usertype','$collegeid','$courseid','$yearlevel','$adviserid')";
			
				if(mysqli_query($connection,$sql_a)){
					$_SESSION['request_alert_message'] = "req_submitted";
					header("location: student-request.php");
				}
				else{
					$_SESSION['request_alert_message'] = "req_sub_failed";
					echo "ERROR:Could not be able to execute $sql_a. " .mysqli_error($connection);    
				}  
			}
	}
?>