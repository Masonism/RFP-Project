<?php

	echo "HELLO";

	$game = $_POST['varGame'];
	$meet = $_POST['varMeet'];
	$day = $_POST['varDay'];
	$time = $_POST['varTime'];

	$db = mysqli_connect('localhost', 'root', 'P@55w0rd', 'rollforgroup') or die($db);

	$sql = "SELECT Username FROM user";

	echo $sql;

	//if ($game =! 'Default' || $meet != 'Default' || $day != 'Default' || $time != 'Default')
	// {
	//	$sql = $sql + " WHERE "
	// }

	

?>