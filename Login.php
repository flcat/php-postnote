<?php
	header("Content-Type: text/html; charset=UTF-8");

	require_once 'config.php';
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

	$email = $_POST["email"];
	$password = $_POST["password"];

	$statement = mysqli_prepare($con, "SELECT * FROM member WHERE email = ? AND password = ?" );
	mysqli_stmt_bind_param($statement, "ss", $email, $password);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $email, $name, $nick);

		$response = array();
		$response["success"] = false;

		while(mysqli_stmt_fetch($statement)){
			$response["success"] = true;
			$response["email"] = $email;
			$response["name"] = $name;
			$response["nick"] = $nick;
		}

		echo json_encode($response);
?>