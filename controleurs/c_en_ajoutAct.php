<?php
include("../modeles/m_activite.php");
$dt=$_POST['DATEACT'];
$cdan=$_POST['CODEANIM'];
$noen=$_POST['NOENCADRANT'];
$cdetat=$_POST['CODEETATACT'];
$hrdv=$_POST['HRRDVACT'];
$prix=$_POST['PRIXACT'];
$hdeb=$_POST['HRDEBUTACT'];
$hfin=$_POST['HRFINACT'];
$dtannul=$_POST['DATEANULATIONACT'];
$obj=$_POST['OBJECTIFACT'];

if(empty($dt) || empty($noen) || empty($cdetat) || empty($hrdv) || empty($prix) || empty($hdeb)
               || empty($hfin) || empty($dtannul) || empty($obj) )
{
  header("location: ../view/v_en_ajouter.php?erreur=saisieAjout");
}
else{
  $activiteExiste = verifAct($dt,$cdan);
  $ajoutValide=FALSE;
  $activiteExiste=array_filter($activiteExiste);
  if(!empty($activiteExiste)){
    foreach ($activiteExiste as $donnees){
      if($donnees['DATEACT']==$dt){
        $ajoutValide=FALSE;
        break;
      }
    else{
      $ajoutValide=TRUE;
    }
    }
  }
  else{
    $ajoutValide=TRUE;
  }
  if($ajoutValide==FALSE){
    header("location: ../view/v_en_ajouter.php?erreur=actMemeJour");
  }
  elseif($ajoutValide==TRUE){
    $ajoutAct = addAct($cdan,$dt,$noen,$cdetat,$hrdv,$prix,$hdeb,$hfin,$dtannul,$obj);
    if(!$ajoutAct){
        header("location: ../view/v_en_ajouter.php?erreur=ajout");
    }
    else{
        header("location: ../view/v_en_ajouter.php?valide=ajoutAct");
    }
  }
}
//PLANNING
/*
if($donnees['NOENCADRANT']==$noen){
  if($donnees['HRRDVACT']<"12:00:00" && $hrdv<"12:00:00"){
    $ajoutValide=FALSE;
    break;
  }
  elseif($donnees['HRRDVACT']>"12:00:00" && $hrdv>"12:00:00"){
    $ajoutValide=FALSE;
    break;
  }
  else{
    $ajoutValide=TRUE;
  }
}
else{
  $ajoutValide=TRUE;
}
*/

?>
