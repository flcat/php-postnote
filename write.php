<?php
	header("Content-Type: text/html; charset=UTF-8");
	
	require_once 'config.php';
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

	$num = $_POST["num"];
	$email = $_POST["email"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$mUri = $_POST["mUri"];
	$mThumbUri = $_POST["mThumbUri"];
	$date = $_POST["date"];
	$slat = $_POST["slat"];
	$slng = $_POST["slng"];
	//$adress = $_POST["adress"];

	$statement = mysqli_prepare($con, "INSERT INTO note VALUES (?,?,?,?,?,?,?,?,?)");
	mysqli_stmt_bind_param($statement, "issssssss", $num, $email, $title, $content, $mUri, $mThumbUri, $date, $slat, $slng);
	mysqli_stmt_execute($statement);

		$response = array();
		$response["success"] = true;

		echo json_encode($response);
?>