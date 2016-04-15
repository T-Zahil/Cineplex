<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . '/Cineplex/config/config.php');

	// convert timestamp
	if (isset($_POST['hourStart']) && isset($_POST['minStart'])) {
	    
	    $h = $_POST['hourStart'];
	    $m = $_POST['minStart'];
	    
	    if ($h >= 0 && $m >= 0 && $h < 24 && $m < 60) {
	        $start = mktime($h , $m, 0, date("n"), date("j"), date("Y"));
	    }
	}

	if (isset($_POST['hourEnd']) && isset($_POST['minEnd'])) {
	    
	    $h_end = $_POST['hourEnd'];
	    $m_end = $_POST['minEnd'];
	    
	    if ($h_end >= 0 && $m_end >= 0 && $m_end < 60 && $h_end < 24) {
	        
	        if (($h_end * 3600 + $m_end * 60) < ($h_end * 3600 + $m_end * 60)) {
	            $day = date("j") + 1;
	            $end = mktime($h_end , $m_end, 0, date("n"), $day, date("Y"));
	        } else {
	            $end = mktime($h_end , $m_end, 0, date("n"), date("j"), date("Y"));
	        }
	    }
	}


	// insert into db
	$pageNumber = $_PDO->query('SELECT max(ID) AS max FROM rooms ');
	$pageNumber = $pageNumber->fetch();
	$pageNumber->max++;


	$query   = "INSERT INTO rooms (ID, type, nameMovie, idMovie, channel) VALUES (" . $pageNumber->max . ",'$_POST[typeMovie]', '$_POST[movie]', '$_POST[idMovie]', '$_POST[channel]')";
	$prepare = $_PDO->exec($query);

	$query   = "INSERT INTO chat (startTime, stopTime, page, movieName) VALUES ('" . $start . "', '" . $end . "', " . $pageNumber->max++ . ", '$_POST[movie]')";
	$prepare = $_PDO->exec($query);

	echo $pageNumber->max;
