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
      <link rel="stylesheet" href="../src/css/404-style.css">
   </head>
   <body>

      <nav>
         <div class="logo">
            <img src="../src/img/logo-cineplex.svg" alt="Logo de Cinéplex">
         </div>
         <div class="status_bar">
            <h1>Bienvenue, <span><?= $_SESSION['user']['username']; ?></span></h1>
            <a href="../logout">
               <div class="connection_button"><img src="../src/img/circle.svg" alt="Déconnexion"></div>
            </a>
         </div>
         <div class="clear"></div>
      </nav>

      <section class="schedule-tv">

         <header class="container">
            <div class="left">
               <h1>Hum... <?= $_SESSION['user']['username']; ?> ?</h1>
               <h2>On dirait que vous avez trouvé un de nos films intimes...</h2>
            </div>
         </header>

         <div class="focus-movie" style="margin-top:4rem;">
            <div class="wrapper">
               <header>
                  <h3>Sensuel</h3>
                  <h1>404 Nuances de Grey</h1>
                  <h4>2016 - Suong Kévin Tan, Laurence Rouge, Clément Vion, Thomas Sanlis, Simon Schreiber</h4>
               </header>
               <div class="synopsis">
                  <div class="poster"><img src="../src/img/371396.jpg" alt="Affiche de Raiponce"></div>
                  <p>L'histoire d'une romance passionnelle, et sexuelle, entre un jeune homme riche amateur de femmes, et une étudiante vierge de 404 ans.</p>
               </div>
               <div class="clear"></div>
            </div>

            <div class="overlay"></div>

            <div class="background_movie"></div>

         </div>

         <a href="../home">
            <div class="button_404">Entrer dans la salle intime</div>
         </a>
         </div>

      </section>
      <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
      <footer style="position:absolute;bottom:0;">

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
   </body>
</html>