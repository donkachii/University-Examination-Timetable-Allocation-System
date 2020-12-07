<?php
session_start();
error_reporting(0);
include "config/dbconfig.php"; 

if(isset($_POST['addfaculty'])){
    $name = $_POST['name'];

    $sqli = "INSERT INTO tbl_faculty (name) VALUES ('$name')";
    //$conn = new databaseconfig();
    $res = $conn->query($sqli);
	if ($res) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);


}

?>