<?php
    session_start();
    include("../includes/config.php");

	$user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tblusers WHERE email = '$user_check'");

    if (isset($_POST['add']))
    {
        $CMO=mysqli_real_escape_string($connection,$_POST['CMO']);
        $BR=mysqli_real_escape_string($connection,$_POST['BoardResolution']);
        $SYfrom=mysqli_real_escape_string($connection,$_POST['SYfrom']);
        $SYto=mysqli_real_escape_string($connection,$_POST['SYto']);
        $CourseCode=mysqli_real_escape_string($connection,$_POST['coursecode']);
		$OtherDetails=mysqli_real_escape_string($connection,$_POST['otherdetails']);
        $effectiveSY = $SYfrom." - ". $SYto;

        //get course code and display in the curriculum table
        $getcourse = mysqli_query($connection,"SELECT * FROM tblcourse WHERE coursecode='$CourseCode'");
        
        if(mysqli_num_rows($getcourse) > 0){
            $get = mysqli_fetch_array($getcourse);
            $CourseID =$get['id'];
        }
        
        $getcurr = "SELECT * FROM tblcurriculum WHERE course_id_fk='$CourseID'";
        $getresult = mysqli_query($connection,$getcurr);


        $curr_code = $CourseCode."(".$effectiveSY.")";

        $check_curr = mysqli_query($connection,"SELECT * FROM tblcurriculum WHERE curr_code = '$curr_code'"); 

        if(mysqli_num_rows($check_curr) > 0){
            $_SESSION['curriculum_alert_message'] = "curriculumexisted";
            header("location:admin-curriculum.php");
        }
        else{
            $sql="INSERT INTO `tblcurriculum`(`curr_code`, `cmo`, `board_reso`, `effectiveSY`,`other_details`, `course_id_fk`) VALUES ('$curr_code','$CMO','$BR','$effectiveSY','$OtherDetails',$CourseID)";
        
            if(mysqli_query($connection,$sql))
            {
                $_SESSION['curriculum_alert_message'] = "added";
                header("location:admin-curriculum.php");                   
            }
            else
            {
                echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
            }
        }
        
    }
    else if (isset($_POST['edit_curr']))
    {
        $CurrID = mysqli_real_escape_string($connection,$_POST['id']);
        $CMO=mysqli_real_escape_string($connection,$_POST['CMO']);
        $BR=mysqli_real_escape_string($connection,$_POST['BoardResolution']);
        $SYfrom=mysqli_real_escape_string($connection,$_POST['SYfrom']);
        $SYto=mysqli_real_escape_string($connection,$_POST['SYto']);
        $Course=mysqli_real_escape_string($connection,$_POST['course']);
        $effectiveSY = $SYfrom." - ". $SYto;

        $check_course = mysqli_query($connection,"SELECT * FROM tblcourse WHERE course = '$Course'");
        
        if(mysqli_num_rows($check_course) > 0 ){
            $fa_c = mysqli_fetch_array($check_course);
            $CourseID = $fa_c['id'];
        }
        
        //get course id in the curriculum table
        $getcurr = "SELECT * FROM tblcurriculum WHERE course_id_fk='$CourseID'";
        $getresult = mysqli_query($connection,$getcurr);
        
        //get course id in the curriculum table
        if( $getcol = mysqli_fetch_array($getresult)){
            $getcourseid = $getcol['course_id_fk'];
        }

        //get course code and display in the curriculum table
        $getcc = "SELECT * FROM tblcourse WHERE id='$getcourseid'";
        $getcoursecode = mysqli_query($connection,$getcc);
        
        if( $getcoll = mysqli_fetch_array($getcoursecode)){
            $coursecode = $getcoll['coursecode'];
        }

        $curr_code = $coursecode."(".$effectiveSY.")";

        $check_curr = mysqli_query($connection,"SELECT * FROM tblcurriculum WHERE curr_code = '$curr_code'"); 

        if(mysqli_num_rows($check_curr) > 0){
            $_SESSION['curriculum_alert_message'] = "curriculumexisted";
            header("location:admin-curriculum.php");
        }
        else{

            $get = "UPDATE `tblcurriculum` SET `id`=$CurrID,`curr_code`='$curr_code',`cmo`='$CMO',`board_reso`='$BR',`effectiveSY`='$effectiveSY',`course_id_fk`=$CourseID";
            
        
            if(mysqli_query($connection,$get))
            {
                $_SESSION['curriculum_alert_message'] = "updated";
                header("location:admin-curriculum.php");                   
            }
            else
            {
                echo "ERROR:Could not be able to execute $get. " .mysqli_error($connection);
            }   
        }
    }
		
	else if (isset($_POST['delete_curr']))
	{
		$id=$_POST['id'];

		$sql="DELETE FROM tblcurriculum WHERE id='$id'";
		
		if(mysqli_query($connection, $sql))
		{
			$_SESSION['curriculum_alert_message'] = "deleted";
			header("location:admin-curriculum.php");
		} else {
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
		}
	}
	mysqli_close($connection);
?>