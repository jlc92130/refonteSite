

<nav class="navbar navbar-expand-lg navbar-dark bg-dark perso_size20">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorRoseMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            L'asso
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorRoseMenu" href="?page=association">Qui sommes-nous ?</a>
                <a class="dropdown-item perso_ColorRoseMenu" href="?page=partenaires">Partenaires</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorOrangeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pensionnaires
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a id="<?php echo ID_STATUT_A_L_ADOPTION ?>" class="dropdown-item perso_ColorOrangeMenu" href="?page=pensionnaires&idStatut=<?php echo ID_STATUT_A_L_ADOPTION ?>">Ils cherchent une famille</a>
                <a id="<?php echo ID_STATUT_FALD ?>" class="dropdown-item perso_ColorOrangeMenu" href="?page=pensionnaires&idStatut=<?php echo ID_STATUT_FALD ?>">Famille d'Accueil Longue Durée</a>
                <a id="<?php echo ID_STATUT_ADOPTE ?>" class="dropdown-item perso_ColorOrangeMenu" href="?page=pensionnaires&idStatut=<?php echo ID_STATUT_ADOPTE ?>">Les anciens</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorVertMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actus
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorVertMenu" href="?page=actus">Nouvelles des adoptés</a>
                <a class="dropdown-item perso_ColorVertMenu" href="#">Evénements</a>
                <a class="dropdown-item perso_ColorVertMenu" href="#">Nos actions au quotidien</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorRougeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Conseils
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorRougeMenu" href="?page=temperatures">Températures</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="?page=chocolat">Le chocolat</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="?page=plantes">Les plantes toxiques</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="?page=sterilisation">Stérilisation</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="?page=educateur">Educateur canin</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorBleuCielMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Contacts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorBleuCielMenu" href="?page=contact">Contact</a>
                <a class="dropdown-item perso_ColorBleuCielMenu" href="?page=don">Don</a>
                <a class="dropdown-item perso_ColorBleuCielMenu" href="?page=mentions">Mentions légales</a>
            </div>
        </li>
    </ul>  
  </div>
</nav>