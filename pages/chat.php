<!doctype html>
<html>
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    	<link href="../style.css" rel="stylesheet" type="text/css">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">

      <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png">
      
      <script src="https://kit.fontawesome.com/31fb83c79d.js" crossorigin="anonymous"></script>
    	
   	<title>Discussion</title>
	</head>
	<body class="d-flex flex-column">
      <?php 
         include("../components/navbar.php");
      ?>

      <section class="chat-section d-flex">
         <?php

            include("../utils/create_database_tables.php"); 

            $mysql_connection = include("../utils/get_mysql_connection.php");

            $chat_id = $_GET["id"] ?? null;
            $user_id = $_COOKIE["id"] ?? null;

            // Récupération de la discussion actuelle et de ses messages
            $select_chat_query = "SELECT * FROM chats WHERE id = '$chat_id'";
            $select_chat_messages_query = "SELECT * FROM chat_messages WHERE chat_id = '$chat_id'";

            $chat = $mysql_connection
               ->query($select_chat_query)
               ->fetch_assoc();

            $chat_messages = $mysql_connection
               ->query($select_chat_messages_query);

            $chat_title = $chat["title"];

            // Affichage de la discussion et de ses messages
            echo "<div class='chat-container container p-3 d-flex flex-column justify-content-between'>
               <div class='chat-header px-2'>
                  <a href='../pages/chats.php' class='text-black text-decoration-none d-flex align-items-center gap-3 h5 mb-3'>
                     <i class='fa-solid fa-arrow-left-long'></i>
                     Retourner aux discussions
                  </a>
                  <div>
                     <h3 class='mb-0'>
                        $chat_title
                     </h3>
                  </div>
               </div>
               <hr>
               <div class='messages-container overflow-auto pb-2'>";

            // Boucle qui passe par chaque message et l'affiche
            while ($message = $chat_messages->fetch_assoc()) {
            
               // Récupération de l'auteur du message
               $message_author_id = $message["author_user_id"];
               $select_author_query = "SELECT * FROM users WHERE id = '$message_author_id'";
            
               $author = $mysql_connection
                  ->query($select_author_query)
                  ->fetch_assoc();
            
               $author_username = $author["username"];
               $message_content = $message["content"];
               $message_id = $message["id"];
               $message_formatted_date = date("d/m/Y", strtotime($message["creation_date"]));
            
               // Affichage du message
               echo "<div class='message-container px-2 py-2 rounded position-relative'>
                  <div class='message-header d-flex align-items-end gap-2'>
                     <h5 class='mb-0'>$author_username</h5>
                     <small class='text-secondary'>$message_formatted_date</small>
                  </div>
                  <div class='message-content rounded text-secondary d-flex flex-column'>
                     $message_content
                  </div>";



               // Si l'utilisateur est l'auteur du message, afficher le bouton de suppression
               if ($message_author_id == $user_id) {

                  echo "<form action='../utils/delete_message.php' method='post' class='delete-message-form position-absolute d-none bg-white'>
                     <button class='btn text-danger shadow-sm'>
                        <i class='fa-solid fa-trash-can'></i>
                     </button>
                     <input type='text' name='messageId' value='$message_id' class='d-none'>
                     <input type='text' name='chatId' value='$chat_id' class='d-none'>
                  </form>";
      
               }

               echo "</div>";
            
            }

            echo "</div>
               <form action='../utils/create_message.php' class='d-flex gap-2' method='post'>
               <input type='text' name='messageContent' class='form-control' placeholder='Envoyer un message dans cette discussion' required autofocus>
               <input type='text' name='chatId' class='d-none' value='$chat_id'>
               <button type='submit' class='btn bg-violet-blue text-white d-flex align-items-center gap-2'>
                  <i class='fa-solid fa-paper-plane'></i>
                  Envoyer
               </button>
               </form>
               </div>"

         ?>
      </section>
	
      <script src="../scripts/alert_message.js"></script>

      <script>
         // Remplacer les liens d'images par un element <a> contenant l'image
         const messageContents = document.querySelectorAll('.message-content');
         const IMAGE_URL_REGEX = /(https:\/\/)([^\s(["<,>/]*)(\/)[^\s[",><]*(.png|.jpg|.gif|.jpeg|.webp)(\?[^\s[",><]*)?/g;

         for (const messageContent of messageContents) {

            const imageURLMatches = messageContent.innerText.match(IMAGE_URL_REGEX);

            if (imageURLMatches) {

               messageContent.innerText = messageContent.innerText.replace(IMAGE_URL_REGEX, '');

               for (const imageURLMatch of imageURLMatches) {

                  messageContent.innerHTML += `<img src='${imageURLMatch}' class='rounded w-25 mt-1'>`;

               }
               
            }

         }

         // Scroller vers le bas de la discussion pour afficher les messahes les plus récents
         const messagesContainer = document.querySelector('.messages-container');
         messagesContainer.scrollTop = messagesContainer.scrollHeight;
      </script>
     
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</body>
</html>
