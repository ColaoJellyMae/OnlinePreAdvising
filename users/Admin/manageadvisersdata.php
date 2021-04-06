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
            $Username=mysqli_real_escape_string($link,$_POST['username']);
            $Password=mysqli_real_escape_string($link,$_POST['password']);
            $Usertype=mysqli_real_escape_string($link,$_POST['usertype']);
            $CourseID=mysqli_real_escape_string($link,$_POST['courseid']);
            $CollegeID=$_SESSION['collegeid'];
            
            //insert data
            $sql="INSERT INTO tblusers (username,password,usertype,collegeid)VALUES('$Username','$Password','$Usertype','$CollegeID','$CourseID)";
        
            if(mysqli_query($link,$sql))
            {
                echo '<script>alert("Data is successfully added!")</script>';
            }
            else
            {
                echo "ERROR:Could not be able to execute $sql. " .msqli_error($link);
            }
        }
        else if (isset($_POST['update'])){
                     
			$AdminID=mysqli_real_escape_string($link,$_POST['id']);
            $Username=mysqli_real_escape_string($link,$_POST['username']);
            $Password=mysqli_real_escape_string($link,$_POST['password']);
            $CollegeID=mysqli_real_escape_string($link,$_POST['collegeid']);

			 // Attempt update query execution
			 $sql = "UPDATE tblusers SET username='$Username',password='$Password',collegeid='$CollegeID' WHERE id='$AdminID'";
				
            if(mysqli_query($link, $sql)){
                echo "Admin Data is Successfully Updated";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
		
	}
	mysqli_close($link);
	header("location:superadmin-admins.php"); 
?>