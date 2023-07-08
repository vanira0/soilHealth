<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'riya', 'l4nL7!.64(ZYBarg', 'soil_analysis_system');

    // check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>