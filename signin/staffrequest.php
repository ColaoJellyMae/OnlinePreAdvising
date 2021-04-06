<?php
$staffid =$_POST['staff-id'];
$first_name=$_POST['first-name'];
$last_name=$_POST['last-name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$department=$_POST['department'];
$course=$_POST['course'];
$year=$_POST['year'];

if(!empty($staffid) || !empty($first_name) || !empty($last_name)||!empty($email)||!empty($pass)||!empty($department)
|| !empty($course) || !empty($year)){
    $host = "localhost";
    $dbUsername ="root";
    $dbpass="";
    $dbname="onlinepreadvising";

    //create connection
    $conn= new mysqli($host.$dbUsername,$dbpass,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    }
    else{
        $SELECT ="SELECT Staffid From staffrequestform Where Staffid = ? Limit 1";
        $INSERT ="INSERT Into staffrequestform(Staffid,staffFirstName,staffLastName,staffEmail,staffPassword,staffDepartment,staffAssignedCourse,staffAssignedYearLevel)
        values(?,?,?,?,?,?,?,?)";

        //Prepare statement
        $stmt=$conn ->prepare($SELECT);
        $stmt ->bind_param("s", $staffid);
        $stmt ->execute();
        $stmt ->bind_result($staffid);
        $stmt ->store_result();
        $rnum = $stmt ->num_rows;

        if ($rnum==0){
            $stmt -> close();

            $stmt =$conn ->prepare($INSERT);
            $stmt ->bind_param("sssssssi", $staffid,$first_name,$last_name,$email,$pass,$department,$course,$year);
            $stmt ->execute();
            echo "Account Requested Successfully";
        }
        else{
            echo "Staff ID already added";
        }

        $stmt -> close();
        $conn ->close();
    }
}
else{
    echo "All fields are Required";
    die();
}

?>