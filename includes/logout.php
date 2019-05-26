<?php
	session_start();
	if (isset($_SESSION['ROLE'])) {
		session_unset();
		session_destroy();
		header('Location: ../');
	}
	else{
		header('Location: ../links/');
	}
?>