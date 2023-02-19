<?php

// credientials
$user = ""; // username
$pass = ""; // password
$dbname = ""; // db name
$host = ""; // host address

$con = mysqli_connect($host,$user,$pass,$dbname);

// check connection
if ( mysqli_connect_errno() ) {
	echo "Access denied: ", mysqli_connect_error();
	exit();
}

?>