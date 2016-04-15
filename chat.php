<?php 
   require '../Cineplex/config/config.php';
   require '../Cineplex/app/controller/check_authenticate.php';

   $room = $_SESSION['room'];

   $req = $_PDO->query("SELECT COUNT(DISTINCT Pseudo) FROM message WHERE ID ='$room'")->fetchColumn();
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../src/css/chat.css"/>
      <link rel="stylesheet" href="../src/fonts/font_import.css"/>
       <link rel="stylesheet" href="../src/css/progress-style.css">
      <title>CinePlex</title>
   </head>
   <body>
	<div class="loader">
        <div class="container">
            <div class="logo">
                <img src="../src/img/logo-cineplex.svg" alt="Logo de Cineplex">
            </div>
            <h1>Nettoyage des chaises en cours...</h1>
        </div>
        <div class="dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
   <div class="main">

      <div class="left-part">

         <div class="chat-infos">
            <div class="room-infos">
               <p class="room-num">CINEPLEX SALLE N° <?= $_SESSION['room']?> -</p>
               <p class="room-movie"></p>
               <p class="movie-state">Le film a déjà commencé. Bonne séance !</p>
            </div>

            <div class="users-infos">
               <p class="users-online"><?php echo $req; ?> utilisateurs connectés</p>
               <p class="movie-time">00:34:12</p>
               <p class="reacts">14 réactions enregistrées</p>
            </div>
         </div>

          
            <div class="timeline">
                <div class="results"></div>
                 

            </div>
            <div class="cursor"></div>
            <div class="hype" onclick="if (start==true){hype();}"; ><img src="../src/img/hype_button.png"/></div>
               
           



         <div id="body" class="chat">
            <table>
               <tr>
                  <td class="titre_style">Vous êtes connecté en tant que : <span id="titre"><?= $_SESSION['user']['username'];?></span></td>
               </tr>
               <tr>
                  <td class="messenger">
                     <div id="chat_aff"></div>
                  </td>
               </tr>
               <tr>
                  <td class="msg"valign="top">
                     <div id="form2">
                        <input id="message" type="text" maxlength="250" placeholder="Partagez vos réactions (Respectez les spectateurs, pas de spoiler !)." />
                        <button id="submit">Envoyer</button>
                     </div>
                  </td>
               </tr>
            </table>
         </div>
      </div>



      <div class="right-part">
      
      <div class="logo">
         <img src="../src/img/logo-cineplex.svg" alt="">

      </div>

      <div class="film-info">
         <div class="poster"></div>
         <h3 class="title"></h3>
         <p class="actors"></p>
         <p class="synopsis"></p>
         
      </div>

      <a href="../home">
		 <div class="exit">
         <img src="../src/img/prise.png" alt="">
         <p>quitter la salle</p>
         </div>
	  </a>

   </div>
   <div class="clear"></div>


   <script type="text/javascript">
      var room = <?php echo $_GET['room']?>;
   </script>
   </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   <script type="text/javascript" src="../src/js/control.js"></script> 
   <script type="text/javascript" src="../src/js/progressBar.js"></script> 
   <script src="../src/js/chat.js"></script>
   <script src="../src/js/movie.js"></script>
</html>