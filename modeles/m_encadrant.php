<?php
include("../modeles/m_bddConnexion.php");

function getAllEn(){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM encadrant
                      ");
  return $req;
}
//Retourne la liste des activités de l'en
function getActEn($noen){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM activite
                      WHERE NOENCADRANT = '$noen';
                      ");
  return $req->fetchAll();
}
?>
