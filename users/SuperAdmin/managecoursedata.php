<?php
    session_start();
    $link=mysqli_connect("localhost","root","","db2");

	if($link===false)
	{
		die("ERROR: Could not connect." .mysqli_connect_error());
	}

	else
	{
	 	if (isset($_POST['addcourse']))
		{
			$CourseID=mysqli_real_escape_string($link,$_POST['id']);
			$CourseShort=mysqli_real_escape_string($link,$_POST['courseshort']);
			$CourseName=mysqli_real_escape_string($link,$_POST['course']);
			$Yearlevels=mysqli_real_escape_string($link,$_POST['yearlevels']);
			$CollegeID=mysqli_real_escape_string($link,$_POST['collegeid']);

			$sql="INSERT INTO tblcourse (id,courseshort,course,yearlevels,collegeid)
			VALUES('$CourseID','$CourseShort','$CourseName',$Yearlevels,'$CollegeID')";
				
			if(mysqli_query($link,$sql))
			{
				echo '<script>alert("Data is successfully added!")</script>';
			}
			else
			{
				echo "ERROR:Could not be able to execute $sql. " .msqli_error($link);
			}
		}
		else if (isset($_POST['updatecourse'])){
            
            $CourseID=mysqli_real_escape_string($link,$_POST['id']);
			$CourseShort=mysqli_real_escape_string($link,$_POST['courseshort']);
			$CourseName=mysqli_real_escape_string($link,$_POST['course']);
			$Yearlevels=mysqli_real_escape_string($link,$_POST['yearlevels']);
			$CollegeID=mysqli_real_escape_string($link,$_POST['collegeid']);

			 // Attempt update query execution
			 $sql = "UPDATE tblcourse SET courseshort='$CourseShort',course='$CourseName',yearlevels='$Yearlevels',collegeid='$CollegeID' WHERE id='$CourseID'";
				
            if(mysqli_query($link, $sql)){
                echo "Course Data is Successfully Updated";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
		else if (isset($_POST['delete']))
		{
			$id=$_POST['id'];

			$sql="DELETE FROM tblcourse WHERE id='$id'";
			
			if(mysqli_query($link, $sql)){
                echo '<script>alert("Data is successfully deleted!")</script>';
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
		}
	}
	mysqli_close($link);
	header("location:superadmin-courses.php"); 
?>

