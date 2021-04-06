<?php
    session_start();
    $link=mysqli_connect("localhost","root","","db");

	if($link===false)
	{
		die("ERROR: Could not connect." .mysqli_connect_error());
	}

	else
	{
	 	if (isset($_POST['add']))
		{
			$SubjectID=mysqli_real_escape_string($link,$_POST['id']);
            $SubjectCode=mysqli_real_escape_string($link,$_POST['subjectcode']);
            $SubjectTitle=mysqli_real_escape_string($link,$_POST['title']);$Lec=mysqli_real_escape_string($link,$_POST['lec']);
            $Lab=mysqli_real_escape_string($link,$_POST['lab']);
            $Units=mysqli_real_escape_string($link,$_POST['units']);
            $SubjectType=mysqli_real_escape_string($link,$_POST['subjecttype']);
            $Prereq=mysqli_real_escape_string($link,$_POST['prerequisite']);
            $Semester=mysqli_real_escape_string($link,$_POST['semester']);
            $Course=mysqli_real_escape_string($link,$_POST['course']);
            $Yearlevel=mysqli_real_escape_string($link,$_POST['yearlevel']);
            $CurriculumID=mysqli_real_escape_string($link,$_POST['curriculumid']);
        

			$sql="INSERT INTO tblcurriculum (id,subjectcode,title,lec,lab,units,subjecttype,prerequisite,semester,course,yearlevel,CurriculumID)VALUES('$SubjectID','$CMO','$BR','$SYfrom','$SYto','$Course','$College','$CurriculumID'')";
       
                if(mysqli_query($link,$sql))
                {
                    $_SESSION['curriculum'] = $CurriculumID;
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