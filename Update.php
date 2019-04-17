<?php
	header("Content-Type: text/html; charset=UTF-8");

	require_once 'config.php';
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

	$email = $_POST["email"];
	$title = $_POST["title"];

	$statement = mysqli_prepare($con, "SELECT * FROM note WHERE email = ? AND title = ?" );
	mysqli_stmt_bind_param($statement, "ss", $email, $title);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $email, $title, $content, $date, $mUri, $slat, $slng);

		$response = array();
		$response["success"] = false;

		while(mysqli_stmt_fetch($statement)){
			$response["success"] = true;
			$response["email"] = $email;
			$response["title"] = $title;
			$response["content"] = $content;
			$response["date"] = $date;
			$response["mUri"] = $mUri;
			$response["slat"] = $slat;
			$response["slng"] = $slng;
		}

		echo json_encode($response);
?>