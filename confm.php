<?php
// mysql example
function connectionDB(){
	$servername = "148.72.232.142";
	$username = "cuongtm2012";
	$password = "Cuongtm2012$";
	$dbname = "stockvn";
	$port = "3306";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	return $conn;
}

?>
