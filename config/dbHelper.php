<?php
function dbConnect(){
	include("dbConfig.php");
	static $conn;
		
	if($conn == null){
		$conn = new mysqli($dbHost,$dbUser,$password,$dbName);
	}
	if($conn->connect_error){
		return false;
	}
	return $conn;
}
?>