<?php 

	include '../../config/config.php';

  	$res = $_PDO ->query('SELECT * FROM chat WHERE page="'.$_GET["page"].'"');
  	
  	echo json_encode($res->fetch(PDO::FETCH_ASSOC));