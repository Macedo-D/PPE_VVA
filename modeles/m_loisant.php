<?php
include("../modeles/m_bddConnexion.php");

//retourne la date de debut de séjour du loisant
function getDtDebSej($user){
  global $bdd;
  $req = $bdd->query("SELECT DATEDEBSEJOUR
                      FROM loisant
                      WHERE USER='$user'
  ");
  return $req->fetch();
}
//retourne la date de fin de séjour du loisant
function getDtFinSej($user){
  global $bdd;
  $req = $bdd->query("SELECT DATEFINSEJOUR
                      FROM loisant
                      WHERE USER='$user'
  ");
  return $req->fetch();
}
//retourne l'àge du loisant
function getAgeLo($user){
  global $bdd;
  $req = $bdd->query("SELECT YEAR(CURDATE()) - YEAR(`DATENAISLOISANT`) AS age
                      FROM loisant
                      WHERE USER='$user'
  ");
  return $req->fetch();
}
?>
