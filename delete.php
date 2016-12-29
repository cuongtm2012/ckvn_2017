<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

require_once('conf.php');
$conn = connectionDB();

// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) )

{

// get id value

$id = $_GET['id'];

// delete the entry
$sql = "DELETE FROM `tbl_danhmuc` WHERE mack= '$id'";

$result = $conn->query($sql);

$conn->close();

header("Location: danhmuc.php");	
}
?>