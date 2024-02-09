<?php
include_once("../modeles/m_activite.php");
session_start();
$noL=getNoLo($_SESSION['user']);
$getNumIns = verifNumIns($_POST['noInsc'],$noL['NOLOISANT']);
if(!$getNumIns){
  header("location: ../view/v_lo_mesActivites.php?erreur=numIns");
}
else{
  $getListeActivite = getListeActIns($_POST['noInsc']);
  header("location: ../view/v_lo_mesActivites.php?valide=numIns&noIns=".$getListeActivite['NOINSCRIP']."&datea=".$getListeActivite['DATEACT']."&dateIns=".$getListeActivite['DATEINSCRIP']."&remIns".$getListeActivite['REMARQUEINSCRIP']);
}
?>
