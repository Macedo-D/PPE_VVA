<!--
On vérifie s'il la connexion est valide
-->
<?php
    include("../modeles/m_connexion.php");
    //on vérifie s'il l'identifiant existe et on récupère le type de l'utilisateur 'Lo' ou 'EN'
    $getConnexion = verifUser();
    $login = $_POST['user'];
    $getType = getTypeUSer($login);
    //Si connexion invalide on redirige vers la page connexion
    if (!$getConnexion){
        header("location: ../index.php");
    }
    //si valide on redirige vers la page d'accueil
    else{
        session_start();
        $_SESSION['user']= $login;
        $_SESSION['type'] = $getType['TYPEPROFIL'];
        header("location: ../view/v_accueil.php");
    }
?>
