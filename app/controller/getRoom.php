<?php 

	require_once ($_SERVER['DOCUMENT_ROOT'].'/Cineplex/config/config.php');

	$id = $_POST['id'];

	$query = $_PDO->query("SELECT * FROM rooms WHERE id='$id'");
	$room = $query->fetchAll();

	echo json_encode($room);