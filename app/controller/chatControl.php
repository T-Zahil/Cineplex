<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . '/Cineplex/app/model/chatModel.php');
	$bdd = bdd();

	if (isset($_GET['name']) AND isset($_GET['message'])) {
		// send the message to the chat
	    ajout_message($_PDO, $_GET['name'], $_GET['message'], $room);
	} else {
		//else, delete messages
	    expire_message($_PDO);
	    $message = message($bdd);
	    require_once($_SERVER['DOCUMENT_ROOT'] . '/Cineplex/app/view/partials/chatView.php');
	}