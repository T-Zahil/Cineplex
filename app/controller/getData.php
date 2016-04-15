<?php 

	require '../../config/config.php';

  	$res = $_PDO ->query('SELECT time_position,count(*) as nbHype FROM movies WHERE id="'.$_GET["id"].'" GROUP BY time_position');
  	
  	echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));