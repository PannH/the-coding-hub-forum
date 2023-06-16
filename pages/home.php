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
    	
   	<title>The Coding Hub</title>
	</head>
	<body>
      <?php 
         include("../components/navbar.php");
      ?>

     <section class="hero-section d-flex">
      	<div class="container hero d-flex align-items-center gap-5">
         	<div>
            	<h1>Programmez, partagez et discutez</h1>
            	<p class="text-secondary">
               	Discutez à propos de vos expériences dans le domaine de la programmation, partagez vos projets et vos idées,
               	demandez de l'aide sur divers programmes, tendez la main aux novices et chattez à propos de tout ce qui touche
               	à le programmation de près ou de loin.
            	</p>
            	<a href="chats.php" class="explore-chats-btn btn bg-violet-blue text-white rounded px-3 py-2 mt-2">
            		Explorer les discussions
            	</a>
         	</div>
         	<div>
            	<img src="../assets/images/hero.png" alt="Hero Image" class="w-100">
         	</div>
      	</div>
      </section>

      <section class="topics-section bg-violet-blue text-white d-flex flex-column justify-content-center py-5">
      	<h2 class="text-center mb-5">
      		Sujets de discussion
      	</h2>
      	<div class="container topics-container d-flex flex-wrap gap-4">
      		<div class="topic-container rounded p-3 shadow bg-white text-dark">
      			<h4 class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-lightbulb h5 mb-0"></i>
      				Un projet en tête?
      			</h4>
      			<p class="text-secondary">
      				Vous vous sentez créatif et souhaitez vous lancer dans une nouveau projet? Créez une discussion au sujet de votre projet, décrivez-le et les membres de la communauté The Coding Hub seront ravis de vous apporter le soutien nécessaire à la création et le développement de votre idée.
      			</p>
      		</div>
      		<div class="topic-container rounded p-3 shadow bg-white text-dark">
      			<h4 class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-bug h5 mb-0"></i>
      				Un problème de code?
      			</h4>
      			<p class="text-secondary">
      				Si un problème dans votre code subvient et qu'une quelconque erreur apparaît, partagez-la dans une nouvelle discussion et la communauté saura se montrer solidaire avec vous et pourra vous aiguiller à la résolution de votre problème.
      			</p>
      		</div>
      		<div class="topic-container rounded p-3 shadow bg-white text-dark">
      			<h4 class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-handshake-angle h5 mb-0"></i>
      				Une envie d'aider?
      			</h4>
      			<p class="text-secondary">
      				Vous souhaitez partager votre solidarité? Explorez les différentes discussions et intervenez dans celles pour lesquelles votre science peut aider et aiguillez la personne en détresse dans son problème.
      			</p>
      		</div>
      	</div>
      </section>

      <script src="../scripts/alert_message.js"></script>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</body>
</html>
