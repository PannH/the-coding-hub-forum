<?php

   include("create_database_tables.php");

   // Récupération des données du formulaire
   $title = str_replace("'", "\'", $_POST["title"]);
   $first_message = str_replace("'", "\'", $_POST["firstMessage"]);

   // Récupération de l'identifiant de l'utilisateur s'il est connecté
   $user_id = $_COOKIE["id"] ?? null;

   // Génération d'un identifiant unique pour la discussion et le premier message
   $chat_id = uniqid();
   $first_message_id = uniqid();

   // Si l'utilisateur n'est pas connecté, on le redirige vers la page de création de discussion avec un message d'erreur
   if (!$user_id) {

      header("Location: ../pages/create_chat.php?message=Erreur: Vous devez être connecté pour créer une discussion.");

   // Si l'utilisateur est connecté, on crée la discussion et le premier message
   } else {

      $mysql_connection = include("get_mysql_connection.php");

      // Création de la discussion et du premier message dans les tables "chats" et "chat_messages"
      $create_chat_query = "INSERT INTO chats (id, title, creator_user_id) VALUES ('$chat_id', '$title', '$user_id')";
      $create_first_message_query = "INSERT INTO chat_messages (id, chat_id, author_user_id, content) VALUES ('$first_message_id', '$chat_id', '$user_id', '$first_message')";

      $mysql_connection->query($create_chat_query);
      $mysql_connection->query($create_first_message_query);

      // Redirection vers la page de la discussion créée
      header("Location: ../pages/chat.php?id=$chat_id");

   }

?>