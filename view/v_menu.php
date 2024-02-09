<?php

?>
<?php session_start(); ?>
    <ul>
        <li>
          <a class="active" href="v_accueil.php">Accueil</a>
        </li>
        <?php
        //Si personne n'est connecté on redirige vers la page de connexion
        if(empty($_SESSION['type'])){
            header("location: v_connexion.php");
        }
        //on affiche le menu en fonction de s'il sagit d'un encadrant ou d'un loisant
        elseif($_SESSION['type'] == 'EN'){
            ?>
                <li><a href="../view/v_en_consulter.php">Consulter</a></li>
                <li><a href="../view/v_en_ajouter.php">Ajouter</a></li>
                <li><a href="../view/v_en_planning.php">Planning</a></li>
                <li><a href="../controleurs/c_deconnexion.php">Déconnexion</a></li>
            <?php
        }
        elseif($_SESSION['type'] == 'LO'){
            ?>
                <li><a href="../view/v_lo_animations.php">Animations</a></li>
                <li><a href="../view/v_lo_mesActivites.php">Mes activites</a></li>
                <li><a href="../controleurs/c_deconnexion.php">Déconnexion</a></li>
            <?php
        }
        ?>
    </ul>
