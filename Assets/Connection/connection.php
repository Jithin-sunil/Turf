<?php
$server="localhost";
$user="root";
$password="";
$db="db_turfscheduler";
$con=mysqli_connect($server,$user,$password,$db);
if(!$con)
{
	echo"Connection failed";
}
?>