<?php 

	require_once ($_SERVER['DOCUMENT_ROOT'].'/Cineplex/config/config.php');

	//We want only 6 pictures
	$query = $_PDO->query("SELECT * FROM rooms LIMIT 6");
	$room = $query->fetchAll();
	$i = 0;

	foreach ($room as $row) {
		$i++;
		$type 		= $row->type;
		$idMovie	= $row->idMovie;

		//return the html code
		echo '<div movieType= '.$type.' movieId='.$idMovie.' class="moviePoster moviePoster-'.$i.'""></div>';
	}