<?php
	if (isset($_POST['submit'])) {
		require_once 'conn.php';
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM accounts WHERE accountUsername = '$username' AND accountPassword = '$password' LIMIT 1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$id = $row['accountNumber'];
			
			$sql = "SELECT * FROM accountsgeninfo WHERE id = '$id' LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			session_start();
			$_SESSION['FNAME'] = $row['accountFNAME'];
			$_SESSION['LNAME'] = $row['accountLNAME'];
			$_SESSION['ROLE'] = $row['accountROLE'];

			header("Location: ../links/");
		}
		else{
			header("Location: ../index.php?err");
		}
	}
	else if (isset($_POST['searchsubmit'])) {
		echo json_encode(array('success' => false));
	}
?>