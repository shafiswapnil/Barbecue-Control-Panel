<?php
require_once("connect.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// creating array for json response
$response = array();

if(isset($_GET["id"])) {
	$id = $_GET["id"];

	$result = mysqli_query($con, "SELECT * FROM controls WHERE id = '$id'");

	if(!empty($result)) {
		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_array($result);

			$io = array();
			// $io['id'] = $data['id'];
			$io['motorL'] = $data['motorL'];
			$io['motorR'] = $data['motorR'];
			$io['spray1'] = $data['spray1'];
			$io['spray2'] = $data['spray2'];
			$io['spray3'] = $data['spray3'];

			$response['success'] = 1;
			$response['controls'] = array();
			array_push($response["controls"], $io);

			echo json_encode($response);
		} else{
			$response["success"] = 0;
			$response["message"] = "No rows were effected!";

			echo json_encode($response);
		}
	} else{
		$response["success"] = 0;
		$response["message"] = "No rows were effected!";

		echo json_encode($response);
	}
} else{
	$response["success"] = 0;
	$response["message"] = "Parameter(s) are missing. Please check the request";

	echo json_encode($response);
}

$con -> close();

?>
