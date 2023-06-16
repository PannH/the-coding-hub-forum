<?php

   // Suppression des cookies de connexion
   setcookie("id", null, -1, "/");
   setcookie("username", null, -1, "/");
   setcookie("email", null, -1, "/");

   // Redirection vers la page d'accueil
   header("Location: ../pages/home.php");

?>