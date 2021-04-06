<?php 
 $connection=mysqli_connect("localhost","root","","db2");

 if($connection === false){
 	die("ERROR: COULD NOT CONNECT." .mysqli_connect_error());
 }
?>