<?php
	$conn = mysqli_connect("localhost","crmx10h7_crm","localcrm","crmx10h7_crm");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	else{
		return $conn;
	}
?>