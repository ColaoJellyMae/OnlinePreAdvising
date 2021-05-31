<?php
    session_start();
	include("../includes/config.php");

	if (isset($_POST['add_course']))
	{
		$CourseCode=mysqli_real_escape_string($connection,$_POST['coursecode']);
		$CourseName=mysqli_real_escape_string($connection,$_POST['coursename']);
		$College=mysqli_real_escape_string($connection,$_POST['college']);


		$get_collegeid="SELECT * FROM tblcollege WHERE college='$College'";
		$get_collegeid_run= mysqli_query($connection,$get_collegeid);

		if(mysqli_num_rows($get_collegeid_run) > 0)
		{
			$fa_c = mysqli_fetch_array($get_collegeid_run);
			$CollegeID = $fa_c['id'];
		}

		$check_coursename="SELECT * FROM tblcourse WHERE course='$CourseName'";
		$check_coursecode="SELECT * FROM tblcourse WHERE coursecode='$CourseCode'";

		$check_coursename_run = mysqli_query($connection,$check_coursename);
		$check_coursecode_run = mysqli_query($connection,$check_coursecode);

		if(mysqli_num_rows($check_coursename_run) > 0)
		{
			echo '<script>alert("Course already existed!")</script>';
			header("location:superadmin-courses.php");
		}
		else if(mysqli_num_rows($check_coursecode_run) > 0)
		{
			echo '<script>alert("Course Code already existed!")</script>';
			header("location:superadmin-courses.php");
		}
		else
		{
			$sql="INSERT INTO `tblcourse`(`coursecode`, `course`,`college_id_fk`) VALUES ('$CourseCode','$CourseName','$CollegeID')";

			if(mysqli_query($connection,$sql))
			{
				echo "<script>alert('Course Successfully Added')</script>";
				header("location:superadmin-courses.php");
			}
			else
			{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
			}
		}
	}
	else if (isset($_POST['edit_course'])){
		
		$CourseID=mysqli_real_escape_string($connection,$_POST['id']);
		$CourseCode=mysqli_real_escape_string($connection,$_POST['coursecode']);
		$CourseName=mysqli_real_escape_string($connection,$_POST['coursename']);
		$College=mysqli_real_escape_string($connection,$_POST['college']);
		
		echo $College;
		echo $CourseName;
	    echo $CourseCode;
	    echo $CourseID;
		
// 		$get_collegeid="SELECT * FROM tblcollege WHERE college='$College'";
// 		$get_collegeid_run= mysqli_query($connection,$get_collegeid);

// 		if(mysqli_num_rows($get_collegeid_run) > 0)
// 		{
// 			$fa_c = mysqli_fetch_array($get_collegeid_run);
// 			$CollegeID = $fa_c['id'];
// 		}

// 		// Attempt update query execution
// 		$sql = "UPDATE `tblcourse` SET `coursecode`='$CourseCode',`course`='$CourseName',`college_id_fk`=$CollegeID WHERE `id`='$CourseID'";
		
// 		if(mysqli_query($connection, $sql)){
// 			echo "<script>alert('Course Successfully Updated')</script>";
// 			header("location:superadmin-courses.php");
// 		} else {
// 			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
// 		}
		
	}
	else if (isset($_POST['delete_course']))
	{
		$id=$_POST['id'];

		$sql="DELETE FROM tblcourse WHERE id='$id'";
		
		if(mysqli_query($connection, $sql))
		{
			$_SESSION['course_alert_message'] = "deleted";
			header("location:superadmin-courses.php");
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
		}
	}
	mysqli_close($connection); 
?>

