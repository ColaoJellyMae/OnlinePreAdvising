<?php
	include "../includes/config.php";

	$username = "";
	$firstname = "";
	$lastname = "";
	$email = "";
	$password = "";
	$department = "";
	$course = "";
	$year = "";
	$status = "";
	$type = "Adviser";

	if($connection===false)
	{
		die("ERROR: Could not connect." .mysqli_connect_error());
	}

	else
	{
	 	if (isset($_POST['add']))
		{
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$department = mysqli_real_escape_string($connection,$_POST['department']);
			$adviser = "Adviser";

				$sql="INSERT INTO tbluser (username,password,usertype,college)VALUES('$username','$password','$adviser','$department')";
		
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
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
			$lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
			$email = mysqli_real_escape_string($connection,$_POST['email']);
			$department = mysqli_real_escape_string($connection,$_POST['department']);
			$course = mysqli_real_escape_string($connection,$_POST['course']);
			$year = mysqli_real_escape_string($connection,$_POST['year']);
			$status = "Adviser";


			$sql_a="INSERT INTO tbluser_details (username,firstname,lastname,email,college,course,year,status)VALUES('$username','$firstname','$lastname','$email','$department','$course','$year','$status')";
		
                if(mysqli_query($connection,$sql_a))
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
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
			$lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
			$email = mysqli_real_escape_string($connection,$_POST['email']);
			$department = mysqli_real_escape_string($connection,$_POST['department']);
			$course = mysqli_real_escape_string($connection,$_POST['course']);
			$year = mysqli_real_escape_string($connection,$_POST['year']);


			$sql_s="INSERT INTO tblnotification (accountID,firstname,lastname,email,college,course,year)VALUES('$username','$firstname','$lastname','$email','$department','$course','$year')";
		
                if(mysqli_query($connection,$sql_s))
                {
                    echo '<script>alert("Data is successfully added!")</script>';
                }
                else
                {
                    echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
                }
        }
		
	}
	mysqli_close($connection);
	header("location:staff-request.php"); 

?>