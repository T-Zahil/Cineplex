<?php 
  define('IN_ENV', true);

  session_start();
      if(($_SESSION['room']==null) || (isset($_SESSION['room']))) {
        $_SESSION['room']=$_GET['room'];
      }

   // routing
   $q = !empty($_GET['q']) ? $_GET['q'] : '';
   
   $get = trim($q, '/'); // remove the '/'
   
   if($get === '')
   {
     $page = 'accueil';
   }
   else if($get === 'messenger')
   {
    require 'chat.php';
    exit();
   }
   else if($get === 'home')
   {
    $page = 'homepage';
   }
   else if($get === 'getReasearch')
   {
    include 'app/controller/getReaserch.php';
    die();
   }
    else if($get === 'logout')
   {
     unset($_SESSION['user']);
     header('Location: ../');
   }
   else
   {
     $page = '404';
   }
   
   // Includes
   include 'app/view/pages/'.$page.'.php';
   $page_content = ob_get_clean();
   echo $page_content;
