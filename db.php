<?php
$con = new mysqli("localhost", "root", "","Employee");

if ($con->connect_error) 
{
	die("Connection failed: " . $con->connect_error);
}
// print_r($con);
?>