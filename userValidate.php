<?php
		require_once 'config.php';
		$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);	

		$email = $_POST["email"];
		$statement = mysqli_prepare($con, "SELECT * FROM member WHERE email = ?");
		mysqli_stmt_bind_param($statement, "s", $email);
		mysqli_stmt_execute($statement);
		mysqli_stmt_store_result($statement);
		mysqli_stmt_bind_result($statement, $email);

		$response = array();
		$response["success"] = true;

		while(mysqli_stmt_fetch($statement)){
			$response["success"] = false;
			$response["email"] = $email;
		}

		echo json_encode($response);
		?>