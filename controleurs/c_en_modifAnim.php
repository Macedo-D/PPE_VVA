<?php
include_once("../modeles/m_animation.php");

if ($_GET['page']=='test') {
  $anim = getAnim($_GET['cdanim']);
  header("location: ../view/v_en_consulter.php?form=anim&cdan=".$anim['CODEANIM']."&noman=".$anim['NOMANIM']."&dtvalan=".$anim['DATEVALIDITEANIM']."&dureean=".$anim['DUREEANIM'].
                              "&limagean=".$anim['LIMITEAGE']."&tarifan=".$anim['TARIFANIM']."&nbplacean=".$anim['NBREPLACEANIM']."&descan=".$anim['DESCRIPTANIM']."&diffan=".$anim['DIFFICULTEANIM']);
}
if(isset($_POST['modifAnim'])){
  $modif = modifAnim($_POST['nom'],$_POST['dtval'],$_POST['duree'],$_POST['limage'],$_POST['tarif'],$_POST['nbplace'],$_POST['descrip'],$_POST['diff'],$_POST['cdan']);
  if(!$modif){
    header("location: ../view/v_en_consulter.php?erreur=modif");
  }
  else{
    header("location: ../view/v_en_consulter.php?valide=modif");
  }
}
?>
