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
    	
   	<title>Discussions</title>
	</head>
	<body>
      <?php 
         include("../components/navbar.php");
      ?>

      <?php

         // Récupération des discussions
         $chats = include("../utils/get_chats.php");

         $chats_number = $chats->num_rows;

         echo "<section class='chat-list-container container'>
            <div class='mb-3 d-flex justify-content-between'>
               <h3 class='mb-0'>$chats_number discussion(s)</h3>
               <a href='create_chat.php' class='btn btn-success bg-success text-white border-0 rounded px-3 py-2 d-flex align-items-center gap-2'>
                  <i class='fa-solid fa-plus'></i>
                  Créer une discussion
               </a>
            </div>
            <div class='chat-list d-flex flex-column gap-3'>";
            
         $mysql_connection = include("../utils/get_mysql_connection.php");

         // Boucle qui passe par chaque discussion et l'affiche
         while ($chat = $chats->fetch_assoc()) {

            $chat_id = $chat["id"];
            $chat_title = $chat["title"];
            $chat_creator_user_id = $chat["creator_user_id"];
            $chat_formatted_creation_date = date("d/m/Y", strtotime($chat["creation_date"]));

            // Récupération du créateur de la discussion
            $select_creator_user_query = "SELECT * FROM users WHERE id = '$chat_creator_user_id'";
            $creator_user = $mysql_connection
               ->query($select_creator_user_query)
               ->fetch_assoc();

            // Réupération du nombre de messages dans la discussion
            $chat_messages_number = $mysql_connection
               ->query("SELECT * FROM chat_messages WHERE chat_id = '$chat_id'")
               ->num_rows;

            $creator_user_username = $creator_user["username"];

            // Affichage de la discussion
            echo "<button onclick='window.location.href = \"chat.php?id=$chat_id\"' class='shadow-sm rounded py-3 px-4 border-0 bg-white w-100 d-flex flex-column'>
               <h4>$chat_title</h4>
               <div class='text-secondary w-100 d-flex justify-content-between'>
                  <span>Créé par $creator_user_username — $chat_formatted_creation_date</span>
                  <span>
                     <i class='fa-solid fa-comment-dots'></i>
                     $chat_messages_number
                  </span>
               </div>
            </button>";

         }

         echo "</div>
         </section>";
      ?>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</body>
</html>
