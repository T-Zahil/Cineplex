<?php 
   require 'config/config.php';
   include 'app/controller/register.php';
   include 'app/controller/authenticate.php';

   // is user is already connected, go to the homepage
    if (!empty($_SESSION['user'])) {
        header('Location: ./home');
    }
   
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cinéplex - Vos films en duplex</title>
    <meta name="description" content="Découvrez une nouvelle expérience sociale avec Cinéplex. Partagez vos émotions en temps réel avec la communauté pendant le visionnage des films à la télévision.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="stylesheet" href="src/fonts/font_import.css">
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="src/css/main.css">
</head>
<body>
    <div class="left-part">
        <h1>Souriez, vous êtes en duplex</h1>
        <h2>Partagez toutes vos réactions en direct avec la communauté CINÉPLEX</h2>
    </div>
    <div class="right-part">
        <div class="logo">
            <img src="src/img/logo-cineplex.svg" alt="Logo de Cineplex">
        </div>
        <div class="info_div">
            <p>Rejoignez l’expérience Cinéplex</p>
        </div>
        <form method="post">
            <input type="text" name="login" placeholder="Votre nom de compte (ID Cinéplex)" value="">
            <input type="email" name="email" placeholder="Votre adresse e-mail" value="">
            <input type="password" name="password" placeholder="Votre mot de passe" value="">
            <input type="password" name="password_confirm" placeholder="Confirmez votre mot de passe" value="">
            <input type="submit" name="submit" value="GO >">
        </form>
        <div class="info_div">
            <p>Déjà membre ? Connectez-vous</p>
        </div>
        <form method="post">
            <input type="text" name="username" id="username" placeholder="Votre ID Cinéplex" value="">
            <input type="password" name="password_login" id="password" placeholder="Votre mot de passe" value="">
            <input type="submit" name="connection" value="GO >">
        </form>
        <div class="lost-password">
            <p>Vous avez perdu vos identifiants ?</p>
            <a href="#">Cliquez-ici pour les retrouver</a>
        </div>
        <?php 
            // Display all notifications messages
            if($succes) {
                echo '<div class="status">';
                echo '<h1>Notification</h1>';
                echo '<p>Votre compte a bien été créé !</p>';
                echo '<p>Vous pouvez maintenant vous connecter.</p>';
                echo '</div>';
            }
            if($userAlready) {
                echo '<div class="errors">';
                echo '<h1>Notification</h1>';
                echo '<p>Ce nom d\'utilisateur est déjà utilisé !</p>';
                echo '<p>Merci d\'en choisir un autre.</p>';
                echo '</div>';
            }
            if($specialChar) {
                echo '<div class="errors">';
                echo '<h1>Notification</h1>';
                echo '<p>Merci de ne pas utiliser de caractères spéciaux !</p>';
                echo '<p>Veuillez réessayer.</p>';
                echo '</div>';
            }
            if($wrongConfirm) {
                echo '<div class="errors">';
                echo '<h1>Notification</h1>';
                echo '<p>Vos mots de passe ne correspondent pas !</p>';
                echo '<p>Veuillez réessayer.</p>';
                echo '</div>';
            }
            if($error) {
                echo '<div class="errors">';
                echo '<h1>Notification</h1>';
                echo '<p>Vos identifiants sont incorrects !</p>';
                echo '<p>Veuillez réessayer.</p>';
                echo '</div>';
            }
        ?>
    </div>
    <div class="clear"></div>
    <div class="layoutBackground">
        <div class="overlay"></div>
        <div class="background">
            <img class="lazy" data-original="src/img/background-poster.jpg" alt="Posters de films en fond">
        </div>
    </div>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<script src="src/js/jquery.min.js"></script>
<script src="src/js/jquery.lazyload.min.js"></script>
<script src="src/js/main.js"></script>
</body>
</html>
