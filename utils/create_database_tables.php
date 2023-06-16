<?php

   // Création des tables réquises pour le fonctionnement du site s'il elles n'existent pas déjà
   $mysql_connection = include("get_mysql_connection.php");

   $create_users_table_query = "CREATE TABLE IF NOT EXISTS users (id VARCHAR(13) NOT NULL, username VARCHAR(32) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY (id), UNIQUE (username), UNIQUE (email)) ENGINE = InnoDB";
   $create_chats_table_query = "CREATE TABLE IF NOT EXISTS chats (id VARCHAR(13) NOT NULL, title VARCHAR(100) NOT NULL, creator_user_id VARCHAR(13) NOT NULL, creation_date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id)) ENGINE = InnoDB";
   $create_chat_messages_table_query = "CREATE TABLE IF NOT EXISTS chat_messages (id VARCHAR(13) NOT NULL, chat_id VARCHAR(13) NOT NULL, author_user_id VARCHAR(13) NOT NULL, content VARCHAR(255) NOT NULL, creation_date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id)) ENGINE = InnoDB";

   $mysql_connection->query($create_users_table_query);
   $mysql_connection->query($create_chats_table_query);
   $mysql_connection->query($create_chat_messages_table_query);

?>