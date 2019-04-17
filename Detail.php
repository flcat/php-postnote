<?php
	header("Content-Type: text/html; charset=UTF-8");

	require_once 'config.php';
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

	$num = $_GET["num"];
	$email = $_GET["email"];
	$title = $_GET["title"];
	$content = $_GET["content"];
	$mUri = $_GET["mUri"];
	$lat = $_GET["lat"];
	$lng = $_GET["lng"];
	$result = mysqli_query($con, "SELECT * FROM note WHERE num = ?");
	mysqli_stmt_bind_param($statement, "i", $num);
	mysqli_execute($statement);
	$response = array();

	while($row = mysqli_fetch_array($result)){
		array_push($response, array("num"=>$row[0], "email"=>$row[1], "title"=>$row[2], "content"=>$row[3],"mUri"=>$row[4], "date"=>$row[6], "lat"=>$row[7], "lng"=>$row[8]));
	}
	//echo "<pre>"; print_r($response); echo '</pre>';
	echo json_encode(array("response"=>$response));
	mysqli_close($con);
?>