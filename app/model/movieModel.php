<?php 

	require_once ($_SERVER['DOCUMENT_ROOT'].'/Cineplex/config/config.php');


	$query = $_PDO->query("SELECT * FROM rooms");
	$room = $query->fetchAll();
	$i =0;

	foreach ($room as $row) {
		$i++;
		$name 		= $row->nameMovie;
		$channel 	= $row->channel;
		$idMovie	= $row->idMovie;
		if($row->type=='movie') {
			$type	= 'film';
		} else {
			$type 	= 'série';
		}
		
		echo '<div class="rooms movie-'.$i.'"><div class="number">'.$i.'</div><div class="picture"></div><div class="title">'.$name.'</div><span class="hidden">'.$idMovie.'</span><div class="channel">Chaîne : <span>'.$channel.'</span></div><div class="genre">Genre : <span>'.$type.'</span></div><div class="room-hour">Heure : <span>20:55</span></div><div class="number-users"><img src="../src/img/people.png" alt="" class="picto"><span class="numbers">7</span></div></div>';
	}