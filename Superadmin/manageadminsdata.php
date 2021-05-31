<?php
    session_start();
    include("../includes/config.php");

    if (isset($_POST['add_admin']))
    {
        $Firstname=mysqli_real_escape_string($connection,$_POST['firstname']);
        $Lastname=mysqli_real_escape_string($connection,$_POST['lastname']);
        $Email=mysqli_real_escape_string($connection,$_POST['email']);
        $Password=mysqli_real_escape_string($connection,$_POST['password']);
        $College=mysqli_real_escape_string($connection,$_POST['college']); 
        $extension = "@wmsu.edu.ph";
        $Usertype="Admin"; 

        $Email = $Email.$extension;

        //get collegeid
        $check_college= mysqli_query($connection , "SELECT * FROM tblcollege WHERE college='$College'");
        if(mysqli_num_rows($check_college) == 1){
            $fa_c = mysqli_fetch_array($check_college);
            $CollegeID = $fa_c['id'];
        }

        //email validation
        $check_email= mysqli_query($connection , "SELECT * FROM tbluser WHERE email='$Email'");

        if(mysqli_num_rows($check_email) > 0){
           echo '<script>alert("Email already exist!")</script>';
            header("location:superadmin-admins.php");
        }
        else{
            //password validation
            if(strlen($Password) < 8){
                echo '<script>alert("Password must atleast 8 or more characters")</script>';
                header("location:superadmin-admins.php");
            }
            else{
                //insert data
                $sql="INSERT INTO `tbluser`(`firstname`, `lastname`, `email`, `password`, `usertype`, `college_id_fk`) VALUES ('$Firstname','$Lastname','$Email','$Password','$Usertype',$CollegeID)";

                //update college as already assigned to an admin
                $updatecollege =mysqli_query($connection,"UPDATE tblcollege SET admin_exist = 1 WHERE id=$CollegeID");

                if(mysqli_query($connection,$sql))
                {
                    echo '<script>alert("Admin Successfully Added")</script>';
                    header("location:superadmin-admins.php");
                }
                else
                {
                    echo "ERROR:Could not be able to execute $sql. " .mysqli_error($connection);
                }
            } 
        }
    }
    else if (isset($_POST['edit_admin'])){
                    
        $ID=mysqli_real_escape_string($connection,$_POST['id']);
        $Firstname=mysqli_real_escape_string($connection,$_POST['firstname']);
        $Lastname=mysqli_real_escape_string($connection,$_POST['lastname']);
        $Email=mysqli_real_escape_string($connection,$_POST['email']);
        $College=mysqli_real_escape_string($connection,$_POST['college']);

        //get College ID
        $check_college= mysqli_query($connection , "SELECT * FROM tblcollege WHERE college='$College'");
        if(mysqli_num_rows($check_college) > 0){
            $fa_c = mysqli_fetch_array($check_college);
            $CollegeID = $fa_c['id'];
        }
        // Attempt update query execution
        $sql = "UPDATE tbluser SET firstname='$Firstname',lastname='$Lastname',email='$Email',college_id_fk=$CollegeID WHERE id='$ID'";
            
        if(mysqli_query($connection, $sql)){
            $_SESSION['superadmin_alert_message'] = "updated";
            header("location:superadmin-admins.php");
        } else {
            echo "ERROR: Could not able to execute $sql. " .mysqli_error($connection);
    
        }
        
    }
    else if (isset($_POST['delete_admin']))
    {
        $id=$_POST['id'];

        $select_college = "SELECT * FROM tbluser WHERE id=$id";
        $select_college_run = mysqli_query($connection , $select_college);
        
        
		foreach($select_college_run as $fa_row)
		{
			$getcollegeid = $fa_row['college_id_fk'];
		}

        //update college as already assigned to an admin when admin is deleted
        $updatecollege =mysqli_query($connection,"UPDATE tblcollege SET admin_exist=0 WHERE id= '$getcollegeid'");

        $query="DELETE FROM tbluser WHERE id='$id'";

        if(mysqli_query($connection, $query)){
            $_SESSION['superadmin_alert_message'] = "deleted";
            header("location:superadmin-admins.php"); 
        } else {
            $_SESSION['superadmin_alert_message'] = "error";
        }
    }
	mysqli_close($connection);
?>