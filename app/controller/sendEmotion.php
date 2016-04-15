<?php

	require '../../config/config.php';

	$data = array(
	    'id' => $_GET["id"],
	    'name' => $_GET["movie"],
	    'h' => $_GET["h"],
	    'm' => $_GET["m"],
	    's' => $_GET["s"],
	    'total_sec' => $_GET['totalSec'],
	    'time_position' => $_GET['positionSec']
	);

	$prepare = $_PDO->prepare('INSERT INTO movies (id,name,h,m,s,total_sec,time_position) VALUES (:id,:name,:h,:m,:s,:total_sec,:time_position)');

	$exec = $prepare->execute($data);

	echo true;




