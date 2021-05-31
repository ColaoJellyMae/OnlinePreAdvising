<?php
    session_start();
    include("../includes/config.php");

    if(isset($_POST['submit-grade']))
    {

        $StudentID = $_SESSION['id'];
		$gf = $_FILES['grades_file']['name'];  
        $sub_status = "Pending";  

        $grades_query = "INSERT INTO `tblstudent_grades_sub`(`grades_filename`, `student_id_fk`,`submission_status`) VALUES ('$gf',$StudentID,'$sub_status')";

        if(mysqli_query($connection,$grades_query ))
        {
            $_SESSION['student_alert_message'] = "added";
            header("location: student-ii.php");
        }
        else
        {
            echo "ERROR:Could not be able to execute $grades_query. " .mysqli_error($connection);
        }
       
    }
?>