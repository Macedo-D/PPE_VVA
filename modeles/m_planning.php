<?php
include("../modeles/m_bddConnexion.php");

function getPlanning(){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM planning
                      ");
  return $req;
}
function modifPlanning($cdan,$dtact,$noen){
  global $bdd;
  $req = $bdd->query("UPDATE planning
                      SET  NOENCADRANT = '$noen'
                    WHERE CODEANIM = '$cdan' AND DATEACT = '$dtact' ");
  return $req;
}
?>
