<?php

	require('connection.php');

	$ids = $_POST['id'];
	$first = $_POST['firstname'];
	$last = $_POST['lastname'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$sqlUpdate = "UPDATE tbl_accounts SET firstname = '$first', lastname = '$last', username = '$user', 
		password = '$pass' WHERE id = $ids";

	mysqli_query($link, $sqlUpdate) or die(mysqli_error($link));
	mysqli_close($link);

	echo "<script>alert('The account data has been updated.')</script>";
	echo "<script>window.location.assign('accounts.php')</script>";

?>