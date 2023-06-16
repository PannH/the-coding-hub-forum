<?php

   include("create_database_tables.php"); 
   
   $mysql_connection = include("get_mysql_connection.php");

   // Récupération des discussions dans la table "chats"
   $select_chats_query = "SELECT * FROM chats";

   $chats = $mysql_connection->query($select_chats_query);

   return $chats;

?>