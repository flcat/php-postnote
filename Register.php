<?php
	header("Content-Type: text/html; charset=UTF-8");
	
	require_once 'config.php';
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);


	$email = $_POST["email"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$nick = $_POST["nick"];

	$statement = mysqli_prepare($con, "INSERT INTO member VALUES (?,?,?,?)");
	mysqli_stmt_bind_param($statement, "ssss", $email, $password, $name, $nick);
	mysqli_stmt_execute($statement);

		$response = array();
		$response["success"] = true;

		echo json_encode($response);
?>