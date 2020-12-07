<?php
$server = "localhost";
$user = "root";
$psword = "";
$dbname = "time_tms";
$conn = new mysqli($server, $user, $psword,$dbname) or die('Could not connect!');


/*
class databaseconfig(){
	$server = "localhost";
	$user = "root";
	$psword = "";
	$dbname = "time_tms";


	function createdb(){
		$conn = new mysqli($server, $user, $psword) or die('Could not connect!');

	}
}
*/



?>