<?php
include_once("../modeles/m_planning.php");
include("../modeles/m_activite.php");
include("../modeles/m_encadrant.php");

$planning= getPlanning();

if(isset($_POST['modifPlanning'])){
  $dt=$_POST['dtact'];
  $cdan=$_POST['cdan'];
  $noen=$_POST['noen'];
  $hrdv=getHrdvAct($cdan,$dt);
  $ListeActEn = getActEn($noen);
  $activiteExiste = verifAct($dt,$cdan);
  $ajoutValide="F";
  $activiteExiste=array_filter($activiteExiste);
  if(!empty($activiteExiste))
  {
      foreach ($ListeActEn as $donnees)
      {
        if($donnees['NOENCADRANT']==$noen)
        {
          if($donnees['DATEACT']==$dt)
          {
            if($donnees['HRRDVACT']<"12:00:00" && $hrdv['HRRDVACT']<"12:00:00")
            {
              $ajoutValide="hInvalide";
              break;
            }
            elseif($donnees['HRRDVACT']>"12:00:00" && $hrdv['HRRDVACT']>"12:00:00")
            {
              $ajoutValide="hInvalide";
              break;
            }
            else
            {
              $ajoutValide="TRUE";
            }
          }
          else
          {
            $ajoutValide="TRUE";
          }
        }
        else
        {
          $ajoutValide="TRUE";
        }
    }
}
else
{
  $ajoutValide="TRUE";
}
  if($ajoutValide=="hInvalide"){
      header("location: ../view/v_en_planning.php?erreur=actMemeJour");
  }
  elseif($ajoutValide=="TRUE"){
    $modifAct = modifActPlanning($cdan,$dt,$noen);
    $modifPlanning = modifPlanning($cdan,$dt,$noen);
    if(!$modifAct || !$modifPlanning){
        header("location: ../view/v_en_planning.php?erreur=modif");
    }
    else{
      header("location: ../view/v_en_planning.php?valide=modif");
    }
  }
}
?>
