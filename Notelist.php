<?php
header("Content-Type: text/html; charset=UTF-8");

error_reporting(E_ALL);

ini_set("display_errors", 1);

	require_once 'config.php';
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

	$email = $_GET["email"];
	$result = mysqli_query($con, "SELECT * FROM note WHERE email = '$email' ORDER BY num ASC");

	
	$response = array();

	while($row = mysqli_fetch_array($result)){
		array_push($response, array("num"=>$row[0], "email"=>$row[1], "title"=>$row[2], "content"=>$row[3], "mUri"=>$row[4],"mThumbUri"=>$row[5], "date"=>$row[6], "lat"=>$row[7], "lng"=>$row[8]));
	}

	echo json_encode(array("response"=>$response));
	mysqli_close($con);
?>