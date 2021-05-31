<?php
	if (isset($_POST['logout']))
	{
		
		$access = 1;
        //update access
        header("location:../signin/universal-signin.php");
	}
?>
	