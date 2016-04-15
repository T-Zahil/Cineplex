<?php

    if (isset($_POST["submit"]) && (empty($_POST["password_login"]))) {
        
        if (isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            
            $login            = trim($_POST["login"]); // trim to delete eventuals spaces
            $password         = trim($_POST["password"]);
            $password_confirm = trim($_POST["password_confirm"]);
            $email            = trim($_POST["email"]);
            $prepare          = $_PDO->prepare('SELECT * FROM users WHERE username = :username'); // prepare the request to check if username exist in db
            $prepare->execute(array(
                'username' => $login
            ));
            $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
            
            $usernameCorrect = preg_match("/^([A-Za-z0-9_]+)$/", $login); // check that there no specials characters
            
            $emailCorrect = preg_match("/@/", $email);
            
            //set the notification variable
            if ($prepare == false) {
                die("Error ! Please try again 1");
            } else if (count($data) > 0) {
                $userAlready = true;
            } else if ($usernameCorrect == 0) {
                $specialChar = true;
            } else if ($emailCorrect == 0) {
                $wrongEmail = true;
            } else if ($password != $password_confirm) {
                $wrongConfirm = true;
            } else {
                $succes = true;
            }
            
            // prepare the request to insert the new user in db
            $result = $_PDO->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $result->execute(array(
                'username' => $login,
                'email' => $email,
                'password' => hash('sha256', SALT . $_POST['password'])
            ));
            
            if ($result == false) {
                die("Error ! Please try again 2");
            }
            
        } else {
            die("Error ! Please try again 3");
        }

    }