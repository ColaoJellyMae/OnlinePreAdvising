<?php
    session_start();
    include("../includes/config.php");


	 	if (isset($_POST['add_adviser']))
		{
            $Firstname=mysqli_real_escape_string($connection,$_POST['firstname']);
            $Lastname=mysqli_real_escape_string($connection,$_POST['lastname']);
            $Contact=mysqli_real_escape_string($connection,$_POST['contact']);
            $Email=mysqli_real_escape_string($connection,$_POST['email']);
            $Password=mysqli_real_escape_string($connection,$_POST['password']);
            $Usertype="Adviser";
            
            // $assigned = 1;
            $CollegeID = $_SESSION['college_id_fk'];

            $Extension = "@wmsu.edu.ph";
            $adviser_email = $Email.$Extension;

    
            if(mysqli_num_rows($adviser_emaill) > 0){
                $_SESSION['adviser_alert_message'] = "existed";
                header("location: admin-advisers.php"); 
            }
            else{
                //  //update college as already assigned to an admin
                //  $updatesection = mysqli_query($connection,"UPDATE tblsection SET adviser_exist = 1 WHERE id=$CollegeID");
                $sql="INSERT INTO `tbluser`(`firstname`, `lastname`,`contact`,`email`, `password`, `usertype`,`college_id_fk`) VALUES ('$Firstname','$Lastname',$Contact,'$adviser_email','$Password','$Usertype',$CollegeID)";
            
                if(mysqli_query($connection,$sql))
                {
                    $_SESSION['adviser_alert_message'] = "added";
                    header("location: admin-advisers.php"); 
                }
                else
                {
                    echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
                }
            }
        }
        else if (isset($_POST['update_adviser'])){
                     
			$AdminID=mysqli_real_escape_string($connection,$_POST['id']);
            $Email=mysqli_real_escape_string($connection,$_POST['email']);
            $Password=mysqli_real_escape_string($connection,$_POST['password']);
            $Contact=mysqli_real_escape_string($connection,$_POST['contact']);
            $CollegeID=mysqli_real_escape_string($connection,$_POST['collegeid']);
            $Yearlevel=mysqli_real_escape_string($connection,$_POST['yearlevel']);

			 // Attempt update query execution
			 $sql = "UPDATE tbluser SET email='$email',password='$Password',contact='$Contact',collegeid='$CollegeID' WHERE id='$AdminID' yearlevel=$Yearlevel";
				
            if(mysqli_query($connection, $sql)){
                header("location:admin-advisers.php"); 
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            }
        }

        else if (isset($_POST['delete_adviser_account']))
        {
            $id=$_POST['id'];

            $sql="DELETE FROM tbluser WHERE id='$id'";
            
            if(mysqli_query($connection, $sql))
            {
                $_SESSION['adviser_alert_message'] = "deleted";
                header("location:admin-advisers.php");
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            }
        }

        else if (isset($_POST['approve_adviser_request']))
        {
            $Firstname=mysqli_real_escape_string($connection,$_POST['firstname']);
            $Lastname=mysqli_real_escape_string($connection,$_POST['lastname']);
            $Email=mysqli_real_escape_string($connection,$_POST['email']);
            $Password=mysqli_real_escape_string($connection,$_POST['password']);
            $Usertype=mysqli_real_escape_string($connection,$_POST['usertype']);
            $CollegeID=mysqli_real_escape_string($connection,$_POST['collegeid']);
            
            // //update college as already assigned to an admin
            // $updatecollege =mysqli_query($connection,"UPDATE tblsection SET adviser_exist = 1 WHERE id=$CollegeID");

            $check_course = mysqli_query($connection , "SELECT * from tblcourse WHERE coursecode= '$CourseCode'");

            if(mysqli_num_rows($check_course) > 0){
                $fa_c = mysqli_fetch_array($check_course);
                $CourseID = $fa_c['id'];
            }

           $sql="INSERT INTO `tbluser`(`firstname`, `lastname`, `email`, `password`, `usertype`,`college_id_fk`) VALUES ('$Firstname','$Lastname','$Email','$Password','$Usertype',$CollegeID)";

            $id=$_POST['id'];

		    $sql2="DELETE FROM tblrequest_account WHERE id='$id'";
            mysqli_query($connection,$sql2);

            if(mysqli_query($connection,$sql))
            {
                $_SESSION['adviser_alert_message'] = "approved";
                header("location: admin-advisers.php"); 
            }
            else
            {
                echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
            }
        }

	mysqli_close($connection);
?>