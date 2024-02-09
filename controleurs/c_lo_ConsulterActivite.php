<?php
include_once("../modeles/m_activite.php");
//on execute la fonction getListeAct qui retourne la liste des activités en fonction de l'anim selectionnée
$getListeAct = getListeAct($_POST['cdanim'])->fetchAll();
$cdanim=$_POST['cdanim'];
?>
