<?php

header("Content-Type: text/html; charset=UTF-8");

error_reporting(E_ALL);

ini_set("display_errors", 1);

	require_once 'config.php';
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);


	$num = $_POST["num"];
	$title = $_POST["title"]

	$response = mysqli_prepare($con, "DELETE FROM note WHERE num = ? AND title = ?");
	mysqli_stmt_bind_param($response, "is",$num,$title);
	mysqli_stmt_execute($response);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);
?>	