<?php
include_once("../modeles/m_activite.php");
if ($_GET['page']=='test') {
  $act = getAct($_GET['cdanim'],$_GET['dtAct']);
  header("location: ../view/v_en_consulter.php?form=act&cdan=".$act['CODEANIM']."&dtact=".$act['DATEACT']."&noen=".$act['NOENCADRANT']."&cdetat=".$act['CODEETATACT'].
                              "&hrdv=".$act['HRRDVACT']."&prix=".$act['PRIXACT']."&hdeb=".$act['HRDEBUTACT']."&hfin=".$act['HRFINACT']."&dtannul=".$act['DATEANNULATIONACT']."&obj=".$act['OBJECTIFACT']);
}
if ($_GET['page']=='annulerAct') {
  $annulerAct = annuAct($_GET['cdanim'],$_GET['dtAct']);
  header("location: ../view/v_en_consulter.php?valide=annuAct");
}
if(isset($_POST['modifAct'])){
  $modif = modifAct($_POST['cdan'],$_POST['datePrec'],$_POST['date'],$_POST['noen'],$_POST['hrdv'],$_POST['prix'],$_POST['hdeb'],$_POST['hfin'],$_POST['obj']);
  if(!$modif){
    echo $_POST['cdan'],'<br />',$_POST['datePrec'],'<br />',$_POST['date'],'<br />',$_POST['noen'],'<br />',$_POST['cdetat'],'<br />',
          $_POST['hrdv'],'<br />',$_POST['prix'],'<br />',$_POST['hdeb'],'<br />',$_POST['hfin'],'<br />',$_POST['obj'];
    //header("location: ../view/v_en_consulter.php?erreur=modif");
  }
  else{
    header("location: ../view/v_en_consulter.php?valide=modif");
  }
}
?>
