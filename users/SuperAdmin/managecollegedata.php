<?php
session_start();
$link=mysqli_connect("localhost","root","","db2");

	if($link===false)
	{
		die("ERROR: Could not connect." .mysqli_connect_error());
	}

	else
	{
	 	if (isset($_POST['add']))
		{
			$CollegeID=mysqli_real_escape_string($link,$_POST['id']);
			$CollegeShort=mysqli_real_escape_string($link,$_POST['collegeshort']);
			$CollegeName=mysqli_real_escape_string($link,$_POST['collegename']);
			$CollegeSeal=mysqli_real_escape_string($link,$_FILES["seal"]['name']);
			
			/*
			if(file_exists("../upload/" .$_FILES["seal"]["name"]))
			{
				$store = $_FILES["seal"]["name"];
				$_SESSION['status'] = "Image already existed.'.$store.'";
				header("location:superadmin-departments.php"); 
			}
			else
			{
				*/
				$sql="INSERT INTO tblcollege (id,collegeshort,college,seal)
				VALUES('$CollegeID','$CollegeShort','$CollegeName','$CollegeSeal')";
					
				if(mysqli_query($link,$sql))
				{
					move_uploaded_file($_FILES["seal"]["tmp_name"],"../upload/".$_FILES["seal"]["name"]);
					$_SESSION['status'] = "College Department Successfully Updated";
					$_SESSION['status_code'] = "success";		
				}
				else
				{
					$_SESSION['status'] = "Failed to add College Department.";
					$_SESSION['status_code'] = "error";
				}
			//}
		}
		else if (isset($_POST['update'])){
			
			$CollegeID=mysqli_real_escape_string($link,$_POST['id']);
			$CollegeShort=mysqli_real_escape_string($link,$_POST['collegeshort']);
			$CollegeName=mysqli_real_escape_string($link,$_POST['collegename']);
			$CollegeSeal=mysqli_real_escape_string($link,$_POST['collegeseal']);

			// Attempt update query execution
			$sql = "UPDATE tblcollege SET collegeshort='$CollegeShort',college='$CollegeName',seal='$CollegeSeal'  WHERE id= '$CollegeID'";
				
			if(mysqli_query($link, $sql)){
				echo '<script>alert("Data is successfully updated!")</script>';
			} else {
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
		}
		else if (isset($_POST['delete']))
		{
			$id=$_POST['id'];

			$sql="DELETE FROM tblcollege WHERE id='$id'";
			
			if(mysqli_query($link, $sql)){
				echo '<script>alert("Data is successfully deleted!")</script>';
			} else {
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
		}
	}
	mysqli_close($link);
	header("location:superadmin-departments.php"); 
?>

