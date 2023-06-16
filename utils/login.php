<?php

   include("create_database_tables.php");

   // Récupération des données du formulaire
   $username_or_email = str_replace("'", "\'", $_POST["usernameOrEmail"]);
   $password = str_replace("'", "\'", $_POST["password"]);

   $mysql_connection = include("get_mysql_connection.php");

   // Récupération de l'utilisateur dans la table "users"
   $select_users_query = "SELECT * FROM users WHERE (username = '$username_or_email' OR email = '$username_or_email') AND password = '$password'";

   $found_users = $mysql_connection->query($select_users_query);

   // Si un utilisateur correspond aux identifiants spécifiés, on le connecte
   if ($found_users->num_rows > 0) {

      $user = $found_users->fetch_assoc();

      $expire_timestamp = time() + 86_400 * 30; // in 30 days

      // Création des cookies content les identifiants de l'utilisateur pour qu'il reste connecté
      setcookie("id", $user["id"], $expire_timestamp, "/");
      setcookie("username", $user["username"], $expire_timestamp, "/");
      setcookie("email", $user["email"], $expire_timestamp, "/");

      // Redirection vers la page d'accueil
      header("Location: ../pages/home.php");

   // Si aucun utilisateur ne correspond aux identifiants spécifiés, on redirige vers la page de connexion avec un message d'erreur
   } else {

      header("Location: ../pages/login.php?message=Erreur: Les identifiants spécifiés ne correspondent à aucun compte.");

   }

?>