<?php
$host="localhost";
$database = "db_learn";   
$user = "root" ;
$password= "";
$conn = mysqli_connect($host, $user, $password, $database);         
if(!$conn)
{
	die("Connection Failed:".mysqli_connect_error());
}
?>
