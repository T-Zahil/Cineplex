<?php 

   require 'config/config.php';
   include 'app/controller/register.php';
   include 'app/controller/authenticate.php';

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
      <link rel="stylesheet" href="../src/fonts/font_import.css">
      <link rel="stylesheet" href="../src/css/reset.css">
      <link rel="stylesheet" href="../src/css/home_style.css">

   </head>
   <body class="homepage">
      <nav>

         <div class="logo">
            <a href="../home"><img src="../src/img/logo-cineplex.svg" alt="Logo de Cinéplex"></a>
         </div>

         <div class="status_bar">
            <h1>Bienvenue, <span><?= $_SESSION['user']['username'];?></span></h1>
            <a href="../logout">
               <div class="connection_button"><img src="../src/img/circle.svg" alt="Déconnexion"></div>
            </a>
         </div>

         <div class="clear"></div>

      </nav>

      <section class="movie_promotion">

         <div class="text-movie">
            <h3>Ce soir, découvrez</h3>
            <h1>FAST &amp; FURIOUS 5</h1>
            <p>Depuis que Brian et Mia Toretto ont extirpé Dom des mains de la justice, ils ont dû franchir de nombreuses frontières pour échapper aux autorités. Retirés à Rio, ils sont contraints de monter un dernier coup pour se faire blanchir et recouvrer leur liberté.</p>

            <div class="third_information">
               <div class="hour">20:55</div>
            </div>

         </div>

         <div class="overlay"></div>
         <div class="picture-bg"></div>

      </section>

      <section class="schedule-tv">

         <header class="container">
            <div class="left">
               <h1>PROGRAMMES CINEPLEX</h1>
               <h2>Les films qui vont bientôt commencer dans nos salles Cinéplex</h2>
            </div>
            <div class="clear"></div>
         </header>

         <div class="container schedule">
            <div class="movies"></div>
         </div>

         <div class="focus-movie hide">

            <div class="wrapper">

               <header>
                  <h3 class="genres"></h3>
                  <h1 class="title"></h1>
                  <h4 class="actors"></h4>
               </header>

               <div class="synopsis">
                  <div class="poster"></div>
                  <p></p>
               </div>

               <div class="score_synopsis"><strong class="radial-score" data-duration="3"></strong></div>

               <div class="clear"></div>
            </div>

            <div class="overlay"></div>
            <div class="background_movie"></div>

         </div>

         </div>

      </section>

      <section class="rooms">

         <header class="container">
            <h1>SALLES CINEPLEX</h1>
            <h2>Partagez vos fous rires, vos larmes avec l’ensemble de la communauté</h2>
         </header>

         <div class="container nav-rooms">
            <h4 class="join focus">Rejoindre</h4>
            <h4 class="create">Créer</h4>
            <div class="line"></div>
         </div>

         <div class="container container-rooms list-rooms">
            <div class="expand">Plus de salles</div>
         </div>

         <div class="container container-rooms create-rooms">

            <h5>CINEPLEX ID SALLE </h5>
            <p class="sub">Chercher tout d'abord un film puis renseignez la chaîne et l'heure de début</p>
            <div class="left">

               <form action="#" method="post" onclick="return false" class="research">
                  <p class="input-container">
                     <input type="textbox" class="focus movieResearch" name="searchMovie" placeholder="FILM">
                  </p>
                  <p class="input-container submit">
                     <input type="submit" name="searchMovie" value="CHERCHER UN FILM" class="submitResearch">
                  </p>
               </form>

               <form action="#" method="post" onclick="return false" class="getmovie hide">
                  <p class="input-container">
                     <input type="text" class="movieSelected focus" placeholder="FILM">
                  </p>
                  <p class="input-container channel">
                     <input type="text" name="tvchanel" placeholder="CHAINE">
                  </p>
                  <p class="when">Début</p>
                  <p class="input-container date hour-start">
                     <input type="number" name="h" value="20">
                  </p>
                  <span>:</span>
                  <p class="input-container date min-start">
                     <input type="number" name="m" value="50">
                  </p>
                  <p class="when">Fin</p>
                  <p class="input-container date hour-end">
                     <input type="number" name="h_end" value="23">
                  </p>
                  <span>:</span>
                  <p class="input-container date min-end">
                     <input type="number" name="m_end" value="00">
                  </p>
               </form>

            </div>

            <div class="right">
               <h5>Résultats de la recherche :</h5>
               <div class="results"></div>
            </div>

         </div>
      </section>

      <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <footer>

         <div class="cineplex-credits">

            <div class="logo">
               <img class="cineplex-logo" src="../src/img/logo-cineplex.svg" alt="Logo de Cineplex">
            </div>
            <div class="legal_section">
               <a href="#">Conditions générales d'utilisation</a>
               <span>|</span>
               <a href="#">Politique privée</a>
            </div>

         </div>

         <div class="sponsor">
            <a href="https://www.themoviedb.org/"><img class="logo_tmdb" src="../src/img/logo_tmdb.png" alt="Logo de TMDb"></a>
         </div>

      </footer>

      <script src="../src/js/jquery.min.js"></script>
      <script src="../src/js/jquery.lazyload.min.js"></script>
      <script src="../src/js/main.js"></script>
      <script src="../src/js/movie.js"></script>
      <script src="../src/js/createRoom.js"></script>
      
   </body>
</html>