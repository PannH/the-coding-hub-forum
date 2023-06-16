<nav class="navbar navbar-expand bg-violet-blue px-5 py-2 d-flex justify-content-between">
   <a href="../index.php" class="navbar-brand d-flex align-items-center gap-3">
      <img src="../assets/images/logo.png" alt="Logo" width="45">
	   <h2 class="text-white mb-0">The Coding Hub</h2>
   </a>
   <button class='nav-toggler-btn d-none bg-transparent border-0 text-white h1 fw-bold mb-0'>
      <i class='fa-solid fa-bars'></i>
   </button>
   <ul class="navbar-nav d-flex gap-3">
      <?php
         // Vérifiier si l'utilisateur est connecté en vérifiant si ses identifiants se trouvent dans les cookies
         $username = $_COOKIE["username"] ?? null;
         $id = $_COOKIE["id"] ?? null;

         if ($username && $id) {
                  
            echo "<li class='nav-item dropdown'>
               <button class='btn dropdown-toggle text-violet-blue border-0 bg-white px-3 py-2 rounded d-flex align-items-center gap-2' data-bs-toggle='dropdown'>
                  <i class='fa-solid fa-circle-user'></i>
                  Votre compte: $username
               </button>
               <div class='dropdown-menu'>
                  <a href='../utils/logout.php' class='dropdown-item text-danger'>
                     <i class='fa-solid fa-arrow-right-from-bracket'></i>
                     Se déconnecter
                  </a>
               </div>
            </li>";

         } else {

            echo "<li class='nav-item'>
               <a href='../pages/login.php' class='nav-link btn border text-white px-3 py-2 rounded d-flex align-items-center gap-2'>
                  <i class='fa-solid fa-arrow-right-to-bracket'></i>
                  Se connecter
               </a>
            </li>
            <li class='nav-item'>
               <a href='../pages/signup.php' class='nav-link btn text-violet-blue bg-white px-3 py-2 rounded d-flex align-items-center gap-2'>
                  <i class='fa-solid fa-user-plus'></i>
                  Créer un compte
               </a>
            </li>";

         }
      ?>
   </ul>
</nav>

<script>
   // Gestion du menu de navigation sur les petits écrans
   const navTogglerBtn = document.querySelector('.nav-toggler-btn');
   const nav = document.querySelector('.navbar-nav');

   navTogglerBtn.addEventListener('click', () => nav.classList.toggle('active'));
</script>