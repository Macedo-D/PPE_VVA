<?php
include_once("../modeles/m_activite.php");
include_once("../modeles/m_loisant.php");
session_start();

$dtDebSej = getDtDebSej($_SESSION['user']);
$dtFinSej = getDtFinSej($_SESSION['user']);
$ageLo = getAgeLo($_SESSION['user']);
$nbIns = getNbIns($_POST['dtact']);
$nbPlace = getNbPlace($_GET['cdanim']);
$cdanim=$_GET['cdanim'];
$dtact=$_POST['dtact'];
$descrip=$_POST['descrip'];

if(date($dtDebSej['DATEDEBSEJOUR'])<date($_POST['dtact']) && date($_POST['dtact'])<date($dtFinSej['DATEFINSEJOUR']) ){
  if($ageLo['age']>=$_GET['limage']){
    if($nbIns['nbIns']<=$nbPlace['NBREPLACEANIM']){
      $nolo= getNoLo($_SESSION['user']);
      $nvnoIns= getNvNoIns();
      //on execute la fonction inscLo pour inscrire le loisant
      $InscriptionLo = inscLo($nolo['NOLOISANT'],$nvnoIns['Noinsc'],$cdanim,$dtact,$descrip);
      header("location: ../view/v_lo_mesActivites.php?valide=ins&noIns=".$nvnoIns['Noinsc']);
    }
    else{
      header("location: ../view/v_lo_mesActivites.php?erreur=place");
    }
  }
  else{
    header("location: ../view/v_lo_mesActivites.php?erreur=age");
  }
}
else{
  header("location: ../view/v_lo_mesActivites.php?erreur=date");
}
?>
