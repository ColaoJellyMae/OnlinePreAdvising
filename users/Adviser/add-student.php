<?php
	include "../../includes/connection.php";

	$username = "";
	$firstname = "";
	$lastname = "";
	$email = "";
	$password = "";
	$department = "";
	$course = "";
	$year = "";
	$status = "";
	$type = "student";

	if($connection===false)
	{
		die("ERROR: Could not connect." .mysqli_connect_error());
	}

	else
	{
	 	if (isset($_POST['add']))
		{
			$fullname = mysqli_real_escape_string($connection,$_POST['name']);
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$department = "Institute of Computer Studies";
			$status = "1";
			$student = "Student";

				$sql="INSERT INTO tbluser (username,password,usertype,college,status)VALUES('$username','$password','$student','$department','$status')";
		
                	if(mysqli_query($connection,$sql))
                	{
                    	echo '<script>alert("Data is successfully added!")</script>';
                	}
                	else
                	{
                    	echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
                }
        }
        if (isset($_POST['add']))
		{
			$firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
			$lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$email = mysqli_real_escape_string($connection,$_POST['email']);
			$department = "Institute of Computer Studies";
			$course = mysqli_real_escape_string($connection,$_POST['course']);
			$year = mysqli_real_escape_string($connection,$_POST['yearS']);

			$sql_s="INSERT INTO tbluser_details (username,firstname,lastname,email,college,course,year)VALUES('$username','$firstname','$lastname','$email','$department','$course','$year')";
		
                if(mysqli_query($connection,$sql_s))
                {
                    echo '<script>alert("Data is successfully added!")</script>';
                }
                else
                {
                    echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
                }
        }
        if (isset($_POST['delete']))
		{
			$userid=$_POST['userid'];

			$sql="DELETE FROM tbluser_details WHERE userid='$userid'";
			
			if(mysqli_query($connection, $sql)){
				echo '<script>alert("Data is successfully deleted!")</script>';
			} else {
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
			}
		}

		if (isset($_POST['delete']))
		{
			$userid=$_POST['userid'];

			$sql="DELETE FROM tbluser WHERE userid='$userid'";
			
			if(mysqli_query($connection, $sql)){
				echo '<script>alert("Data is successfully deleted!")</script>';
			} else {
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
			}
		}
		
	}
	mysqli_close($connection);
	header("location:adviser-student-lists.php"); 

?>