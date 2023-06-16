<?php

   // Récupération de l'identifiant du message et de la discussion
   $message_id = $_POST["messageId"];
   $chat_id = $_POST["chatId"];

   $mysql_connection = include("get_mysql_connection.php");

   // Suppression du message dans la table "chat_messages"
   $delete_message_query = "DELETE FROM chat_messages WHERE id = '$message_id'";

   $mysql_connection->query($delete_message_query);

   // Redirection vers la page de la discussion
   header("Location: ../pages/chat.php?id=$chat_id");

?>