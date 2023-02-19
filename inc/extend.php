<?php
require_once("connect.php");

$zero = isset($_POST['zero']) ? $_POST['zero'] : "false";

if($zero == "ok"){
	$result = mysqli_query($con, "UPDATE controls SET motorL = 0, motorR = 0, spray1 = 'off', spray2 = 'off', spray3 = 'off' WHERE id = 1");

	if($result) {
		echo "SUCCESS!";
	} else{
		echo "ERROR!";
	}
} else{
	include_once 'error.php';
}

$con -> close();
?>