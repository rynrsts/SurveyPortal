<?php

	require('connection.php');

	$ids = $_POST['id'];
	$topic = $_POST['topic'];
	$questions = $_POST['questions'];
	$choices = $_POST['choices'];

	$sqlUpdate = "UPDATE tbl_topics SET topic = '$topic', questions = '$questions', choices = '$choices' WHERE id = $ids";

	mysqli_query($link, $sqlUpdate) or die(mysqli_error($link));
	mysqli_close($link);

	echo "<script>alert('The topic has been updated.')</script>";
	echo "<script>window.location.assign('survey_topics.php')</script>";

?>