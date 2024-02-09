<!--
Modèle pour la connexion au site
-->
<?php
include_once("../modeles/m_bddConnexion.php");
/*vérifie que l'utilisateur existe -> */
function verifUser(){
    global $bdd;

    $user = $_POST['user'];
    $mdp = $_POST['mdp'];
    $req = $bdd->query("SELECT USER
                        FROM profil
                        WHERE USER= '$user'
                        AND MDP = '$mdp'");
    $res = $req->fetch();
    return $res;
}
/*retourne le type de l'utilisateur-> 'LO' ou 'EN' */
function getTypeUSer($user){
    global $bdd;
    $req = $bdd->query("SELECT TYPEPROFIL
                        FROM profil
                        WHERE USER = '$user'");
    $res = $req->fetch();
    return $res;
}
?>
