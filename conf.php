<?php
// mysql example
function connectionDB(){
	$servername = "localhost";
	$username = "admin";
	$password = "admin";
	$dbname = "stockvn";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	return $conn;
}

?>
