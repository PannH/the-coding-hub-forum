<?php

   include("create_database_tables.php");

   // Récupération des données du formulaire
   $username = str_replace("'", "\'", $_POST["username"]);
   $email = str_replace("'", "\'", $_POST["email"]);
   $password = str_replace("'", "\'", $_POST["password"]);

   // Génération d'un identifiant unique pour l'utilisateur
   $id = uniqid();

   $mysql_connection = include("../utils/get_mysql_connection.php");

   // Vérification que l'utilisateur n'existe pas déjà
   $select_users_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

   $found_users = $mysql_connection->query($select_users_query);

   // Si un utilisateur existe déjà, on redirige vers la page d'inscription avec un message d'erreur
   if ($found_users->num_rows > 0) {

      header("Location: ../pages/signup.php?message=Erreur: Un compte avec le même nom d'utilisateur ou la même adresse e-mail existe déjà.");

   // Sinon, on crée l'utilisateur et on le connecte
   } else {

      // Création de l'utilisateur dans la table "users"
      $insert_user_query = "INSERT INTO users (id, username, email, password) VALUES ('$id', '$username', '$email', '$password')";
   
      $mysql_connection->query($insert_user_query);
   
      // Création des cookies content les identifiants de l'utilisateur pour qu'il reste connecté
      $expire_timestamp = time() + 86_400 * 30; // dans 30 jours
   
      setcookie("id", $id, $expire_timestamp, "/");
      setcookie("username", $username, $expire_timestamp, "/");
      setcookie("email", $email, $expire_timestamp, "/");
   
      // Redirection vers la page d'accueil
      header("Location: ../pages/home.php");

   }

?>