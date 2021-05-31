<?php
session_start();
include("includes/config.php");

	if (isset($_POST['add-student']))
	{
		$CollegeCode=mysqli_real_escape_string($connection,$_POST['collegecode']);
		$CollegeName=mysqli_real_escape_string($connection,$_POST['collegename']);
		$target = "upload/".basename($_FILES['image']['name']);

		echo $CollegeCode;
		echo $CollegeName;


		/*college-table*/
		$image=$_FILES['image']['name'];

		$check_collegename="SELECT * FROM tblcollege WHERE college='$CollegeName'";
		$check_collegecode="SELECT * FROM tblcollege WHERE collegecode='$CollegeCode'";

		$check_collegename_run = mysqli_query($connection,$check_collegename);
		$check_collegecode_run = mysqli_query($connection,$check_collegecode);

		if(mysqli_num_rows($check_collegename_run) > 0)
		{
			$_SESSION['college_alert_message'] = "collegeexisted";
			header("location:superadmin-departments.php");
		}
		else if(mysqli_num_rows($check_collegecode_run) > 0)
		{
			$_SESSION['college_alert_message'] = "collegecodeexisted";
			header("location:superadmin-departments.php");
		}
		else if(file_exists("upload/" .$_FILES["image"]["name"]))
		{
			$_SESSION['college_alert_message'] = "sealexisted";
			header("location:superadmin-departments.php");
		}
		else
		{
			$query="INSERT INTO tblcollege (collegecode,college,seal)
			VALUES('$CollegeCode','$CollegeName','$image')";
			$query_run = mysqli_query($connection,$query);
			

			if($query_run)
			{
				move_uploaded_file($_FILES['image']['tmp_name'], $target);
				$_SESSION['college_alert_message'] = "added";
				header("location:superadmin-departments.php"); 
	
			}
			else
			{
				$_SESSION['college_alert_message'] = "error";
				header("location:superadmin-departments.php");
			}
		
		}
	}
	else if (isset($_POST['update_college']))
	{
		$CollegeID=mysqli_real_escape_string($connection,$_POST['id']);
		$CollegeCode=mysqli_real_escape_string($connection,$_POST['collegecode']);
		$CollegeName=mysqli_real_escape_string($connection,$_POST['collegename']);
		$pic = "upload/".basename($_FILES['image']['name']);

		/*college-table*/
		$image=$_FILES['image']['name'];

		$selectdata = "SELECT * FROM tblcollege WHERE id=$CollegeID";
		$selectdata_run = mysqli_query($connection,$selectdata);

		foreach($selectdata_run as $fa_row)
		{
			if($image == NULL || file_exists("upload/" .$_FILES["image"]["name"])){
				//message user that seal image is already existed
				$image_data = $fa_row['seal'];
			}
			else{
				//update new seal and delete old seal
				unlink("./images/" .$fa_row['seal']);
				$image_data = $image;
			}
		}
		
		// Attempt update query execution
		$query = "UPDATE `tblcollege` SET `collegecode`= '$CollegeCode',`college`='$CollegeName',`seal`='$image_data' WHERE `id`=$CollegeID";
		$que_run = mysqli_query($connection,$query);

		if($que_run)
		{
			if(file_exists("./images/" .$_FILES["image"]["name"])){
				//message user that seal image is already existed
				$_SESSION['college_alert_message'] = "existed";
				header("location:superadmin-departments.php");
			}
			else{
				//update new seal and delete old seal
				move_uploaded_file($_FILES['image']['tmp_name'], $pic);

				unlink("./images/" .$que_run['seal']);
				$_SESSION['college_alert_message'] = "updated";
				header("location:superadmin-departments.php");
			} 

		}
		else
		{
			$_SESSION['college_alert_message'] = "error";
			header("location:superadmin-departments.php");
		}
		

	}
	else if (isset($_POST['delete_college']))
	{
		$id=$_POST['id'];

		$selectdata = "SELECT * FROM tblcollege WHERE id='$id'";
		$selectdata_run = mysqli_query($connection,$selectdata);

		foreach($selectdata_run as $fa_row)
		{
			unlink("./images/" .$fa_row['seal']);
			$image_data = $image;
		}
		
		$query="DELETE FROM tblcollege WHERE id='$id'";
		$del = mysqli_query($connection, $query);

		if($del){
			unlink("./images/" .$del['seal']);
			$_SESSION['college_alert_message'] = "deleted";
			header("location:superadmin-departments.php"); 
		} else {
			$_SESSION['college_alert_message'] = "error";
			header("location:superadmin-departments.php");
		}
	}
	mysqli_close($connection);
?>

