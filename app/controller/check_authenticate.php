<?php 
	// if $_SESSION['user'] is empty, then the user is not logged, so redirect
	if (empty($_SESSION['user'])) {
		header('Location: ../');
	}