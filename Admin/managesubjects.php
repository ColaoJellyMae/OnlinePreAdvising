<?php
    session_start();
    include("../includes/config.php");

    if (isset($_POST['add_subject']))
    {
        $SubjectCode=mysqli_real_escape_string($connection,$_POST['subjectcode']);
        $Description=mysqli_real_escape_string($connection,$_POST['description']);
        $Lec=mysqli_real_escape_string($connection,$_POST['lec']);
        $Lab=mysqli_real_escape_string($connection,$_POST['lab']);
        $Units=$Lec+$Lab;
        $Prereq=mysqli_real_escape_string($connection,$_POST['prereq']);
        if($Prereq ==""){
            $Prereq = "NONE";
        }
        $Semester=mysqli_real_escape_string($connection,$_POST['semester']);
        $Yearlevel=mysqli_real_escape_string($connection,$_POST['yearlevel']);
        $CurrCode=mysqli_real_escape_string($connection,$_POST['curr_code']);
     
        $getcurrid = mysqli_query($connection, "SELECT * from tblcurriculum where curr_code='$CurrCode'");

        if(mysqli_num_rows($getcurrid) > 0){
            $fa_c = mysqli_fetch_array($getcurrid);
            $curr_id = $fa_c['id']; //store cuuriculum id
        }

        echo $Yearlevel;

        $sql="INSERT INTO `tblsubject`(`curr_id_fk`, `subject_code`,`description`, `lec`, `lab`, `units`,`prerequisite`, `semester`, `yearlevel`) VALUES ($curr_id,'$SubjectCode','$Description',$Lec,$Lab,$Units,'$Prereq','$Semester','$Yearlevel')";
    
        if(mysqli_query($connection,$sql))
        {   
            $_SESSION['subjects_alert_message'] = "added";
            header("location: admin-subjects.php");            
        }
        else
        {
            echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
        }
        
    }
    if (isset($_POST['delete_sub']))
	{
		$id=$_POST['subjectid'];

		$sql="DELETE FROM tblsubject WHERE subjectid='$id'";
		
		if(mysqli_query($connection, $sql))
		{
			$_SESSION['subjects_alert_message'] = "deleted";
			header("location:admin-subjects.php");
		} else {
			echo "ERROR: Could not able to execute $sql. " .mysqli_error($connection);
		}
	}
    