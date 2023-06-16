<?php

   include("create_database_tables.php");

   // Récupération des données du formulaire
   $message_content = str_replace("'", "\'", $_POST["messageContent"]);
   $chat_id = $_POST["chatId"];

   // Récupération de l'identifiant de l'utilisateur s'il est connecté
   $user_id = $_COOKIE["id"] ?? null;

   // Génération d'un identifiant unique pour le message
   $message_id = uniqid();

   // Si l'utilisateur n'est pas connecté, on le redirige vers la page de la discussion avec un message d'erreur
   if (!$user_id) {

      header("Location: ../pages/chat.php?id=$chat_id&message=Erreur: Vous devez être connecté pour envoyer un message.");

   // Si l'utilisateur est connecté, on crée le message
   } else {

      $mysql_connection = include("get_mysql_connection.php");

      // Création du message dans la table "chat_messages"
      $create_message_query = "INSERT INTO chat_messages (id, chat_id, author_user_id, content) VALUES ('$message_id', '$chat_id', '$user_id', '$message_content')";

      $mysql_connection->query($create_message_query);

      // Redirection vers la page de la discussion
      header("Location: ../pages/chat.php?id=$chat_id");

   }

?>