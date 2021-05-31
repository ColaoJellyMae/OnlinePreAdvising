<?php
    session_start();
    include("../includes/config.php");



    if (isset($_POST['getidbtn'])){
                     
        $CurrID=mysqli_real_escape_string($connection,$_POST['id']);
        
        $_SESSION['currid'] =$CurrID;
        header("location: admin-subjects.php"); 
    }

	mysqli_close($connection);
?>