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
            $CMO=mysqli_real_escape_string($link,$_POST['CMO']);
            $BR=mysqli_real_escape_string($link,$_POST['BoardResolution']);$SYfrom=mysqli_real_escape_string($link,$_POST['SYfrom']);
            $SYto=mysqli_real_escape_string($link,$_POST['SYto']);
            $CourseID=mysqli_real_escape_string($link,$_POST['courseid']);

            
            $que = "SELECT * FROM tblcourse WHERE courseid='$CourseID'";
            $getresult = mysqli_query($connection,$que);
            
            // If result matched $myusername and $mypassword, table row must be 1 row
              
            if(mysqli_num_rows($getresult) == 1){
      
                $getcol = mysqli_fetch_array($getresult);
                $_SESSION['collegeid'] = $getcol['collegeid'];
            }

            $CollegeID=$_SESSION['collegeid'];

			$sql="INSERT INTO tblcurriculum (id,CMO,BoardResolution,effectiveSYfrom,effectiveSYto,courseid,collegeid)VALUES('$CurriculumID','$CMO','$BR','$SYfrom','$SYto','$CourseID','$CollegeID')";
       
                if(mysqli_query($link,$sql))
                {
                    $_SESSION['curriculumid'] = $CurriculumID;
                    echo '<script>alert("Data is successfully added!")</script>';                   
                }
                else
                {
                    echo "ERROR:Could not be able to execute $sql. " .msqli_error($link);
                }
            
        }
		
	}
	mysqli_close($link);
	header("location:admin-curriculum.php"); 
?>