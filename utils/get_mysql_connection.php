<?php

   // Création d'une connexion à la base de données
   $database_credentials = include("../config/database_credentials.php");
   $mysql_connection = mysqli_connect($database_credentials["host"], $database_credentials["user"], $database_credentials["password"], $database_credentials["database"]);

   // Retourne la connexion
   return $mysql_connection;

?>