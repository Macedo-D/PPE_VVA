<?php
include("../modeles/m_animation.php");
$cd=$_POST['CODEANIM'];
$cdtype=$_POST['CODETYPEANIM'];
$nom=$_POST['NOMANIM'];
$dtval=$_POST['DATEVALIDITEANIM'];
$duree=$_POST['DUREEANIM'];
$limage=$_POST['LIMITEAGE'];
$tarif=$_POST['TARIFANIM'];
$nbplace=$_POST['NBREPLACEANIM'];
$descrip=$_POST['DESCRIPTANIM'];
$comment=$_POST['COMMENTANIM'];
$diff=$_POST['DIFFICULTEANIM'];
$animExiste = getAnim($cd);
if(!$animExiste){
  if(empty($cd) && empty($nom) && empty($dtval) && empty($duree) && empty($limage) && empty($tarif) && empty($nbplace)
                 && empty($descrip) && empty($comment) && empty($diff) )
  {
      header("location: ../view/v_en_ajouter.php?erreur=saisieAjout");
  }
  else{
    $ajoutAnim = addANim($cd,$cdtype,$nom,$dtval,$duree,$limage,$tarif,$nbplace,$descrip,$comment,$diff);
    header("location: ../view/v_en_ajouter.php?valide=ajoutAnim");
  }
}
else{
  header("location: ../view/v_en_ajouter.php?erreur=animExiste");
}
?>
