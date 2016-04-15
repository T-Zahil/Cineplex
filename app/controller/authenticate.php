<?php

	if (isset($_POST["connection"]) && (empty($_POST['login']))) {
    
	    // Retrieve inputs
	    $username = $_POST['username'];
	    $password = hash('sha256', SALT . $_POST['password_login']); // Hash + Salt
	    // SQL query
	    $prepare  = $_PDO->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
	    $prepare->bindValue('username', $username);
	    $prepare->execute();
	    $user = $prepare->fetch();
	    // Test password
	    if ($user->password == $password) {
	        // Update session
	        $_SESSION['user'] = array(
	            'id' => $user->id,
	            'username' => $user->username
	        );
	        // If it's ok, redirect to the homepage
	        header('Location: ../Cineplex/home');
	    } else {
	        $error = true;
	    }
	}
