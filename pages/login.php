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
      
   	<title>Se connecter</title>
	</head>
	<body class="bg-violet-blue d-flex align-items-center justify-content-center">
      <div class="card bg-white d-flex flex-column py-3 px-4 rounded shadow">
         <div class="d-flex flex-column align-items-center">
            <h2 class="mb-0">Se connecter</h2>
            <p class="text-secondary mb-2">
               Connectez-vous à votre compte pour participer aux discussions.
            </p>
         </div>
         <hr>
         <form class="d-flex flex-column gap-3" action="../utils/login.php" method="post">
            <div class="form-group">
               <label for="usernameOrEmailInput" class="form-label">E-mail ou nom d'utilisateur</label>
               <input type="text" class="form-control" id="usernameOrEmailInput" name="usernameOrEmail" maxlength="255" placeholder="John Doe ou john.doe@mail.com" required>
            </div>
            <div class="form-group">
               <label for="passwordInput" class="form-label">Mot de passe</label>
               <input type="password" class="form-control" id="passwordInput" name="password" maxlength="255" placeholder="•••••••••" required>
            </div>
            <button type="submit" class="login-form-submit-btn btn bg-violet-blue text-white border-0 rounded p-2 mt-3">Soumettre</button>
            <small class="text-center">
               Vous n'avez pas encore de compte ? <a href="signup.php" class="text-violet-blue text-decoration-none">Créer un compte</a>
            </small>
            <small class="text-center">
               <a href="home.php" class="text-violet-blue text-decoration-none">Retourner à l'accueil</a>
            </small>
         </form>
      </div>

      <script src="../scripts/alert_message.js"></script>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</body>
</html>
