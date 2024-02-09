<?php
include("../modeles/m_bddConnexion.php");

//Retourne les activités d'une animation données par date croissante
function getListeAct($cdanim){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM activite
                      WHERE CODEANIM = '$cdanim'
                      AND CODEETATACT= 'V'
                      ORDER BY `DATEACT` ASC;
                      ");
  return $req;
}
//Retourne l activité souhaitée
function getAct($cdan,$dtact){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM activite
                      WHERE CODEANIM = '$cdan'
                      AND DATEACT= '$dtact';
                      ");
  return $req->fetch();
}
//Inscription à une activité -> 'LO'
function inscLo($nolo, $nvnoIns, $cdanim, $dtact, $descrip){
  global $bdd;
  $req = $bdd->query("INSERT INTO inscription(NOLOISANT, NOINSCRIP, CODEANIM,
  DATEACT, DATEINSCRIP, REMARQUEINSCRIP)
  VALUES ('$nolo','$nvnoIns','$cdanim','$dtact',CURDATE(),'$descrip')
  ");
  return $req;
}

//Retourne le numero du loisant
function getNoLo($user){
  global $bdd;
  $req = $bdd->query("SELECT NOLOISANT
          FROM loisant
          WHERE USER='$user'
  ")or die ('Erreur '.$req.' '.$bdd->error);
  return $req->fetch() ;
}
//Retourne un numero d'inscritpion à une activité correspondant au dernier numéro+1
function getNvNoIns(){
  global $bdd;
  $req = $bdd->query("SELECT (MAX(NOINSCRIP)+'1') as Noinsc
                      FROM inscription
  ")or die ('Erreur '.$req.' '.$bdd->error);
  return $req->fetch();
}

//Annulation d'inscription à une activité -> 'lO'
function annuInscLo($no, $noInsc){
  global $bdd;
  $req = $bdd->query("UPDATE inscription
  SET DATE_ANNULATION = CURDATE()
  WHERE NOLOISANT = '$no'
  AND NOINSCRIP = '$noInsc'
  ");
  return $req;
}
function verifNumIns($noIns,$nolo){
  global $bdd;
  $req = $bdd->query("SELECT NOINSCRIP
                      FROM inscription
                      WHERE NOLOISANT='$nolo'
                      AND NOINSCRIP='$noIns'
                      AND DATE_ANNULATION is NULL
  ");
  return $req->fetch();
}

function getListeActIns($noIns){
  global $bdd;
  $req = $bdd->query("SELECT NOINSCRIP, DATEACT, DATEINSCRIP, REMARQUEINSCRIP
                      FROM inscription
                      WHERE NOINSCRIP = $noIns
                      AND DATE_ANNULATION is NULL
  ")or die ('Erreur '.$req.' '.$bdd->error);
  return $req->fetch();
}
function getListeIns($cdan,$dtact){
  global $bdd;
  $req = $bdd->query("SELECT L.NOMLOISANT, L.PRENOMLOISANT,I.NOINSCRIP, I.DATEACT, I.DATEINSCRIP, I.REMARQUEINSCRIP
                      FROM inscription I, loisant L
                      WHERE I.DATEACT = '$dtact'
                      AND I.CODEANIM = '$cdan'
                      AND I.NOLOISANT = L.NOLOISANT
                      AND DATE_ANNULATION is NULL
  ");
  return $req->fetchAll();
}
function getAllEtatAct(){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM etat_act");
  return $req;
}
function getNbIns($dtact){
  global $bdd;
  $req = $bdd->query("SELECT COUNT(`NOLOISANT`) as nbIns
                      FROM inscription
                      WHERE `DATEACT`='$dtact'");
  return $req->fetch();
}
function getHrdvAct($cdan,$dtact){
  global $bdd;
  $req = $bdd->query("SELECT HRRDVACT
                      FROM activite
                      WHERE `CODEANIM`='$cdan'
                      AND DATEACT='$dtact'");
  return $req->fetch();
}
function getNbPlace($cdan){
  global $bdd;
  $req = $bdd->query("SELECT NBREPLACEANIM
                      FROM animation
                      WHERE `CODEANIM`='$cdan'");
  return $req->fetch();
}

function addAct($cdan,$dtact,$noen,$cdetat,$hrdv,$prix,$hdeb,$hfin,$dtannul,$obj){
  global $bdd;
  $req = $bdd->query("INSERT INTO ACTIVITE(CODEANIM,DATEACT,NOENCADRANT,CODEETATACT,HRRDVACT,PRIXACT,HRDEBUTACT,HRFINACT,DATEANNULATIONACT,OBJECTIFACT)
                             VALUES('$cdan','$dtact','$noen','$cdetat','$hrdv','$prix','$hdeb','$hfin','$dtannul','$obj')");
  return $req;
}
function supprAct($cdan,$dtact){
  global $bdd;
  $req = $bdd->query("DELETE FROM ACTIVITE
                             WHERE CODEANIM='$cdan' AND DATEACT='$dtact'");
  return $req;
}
function annuAct($cdan,$dtact){
  global $bdd;
  $req = $bdd->query("UPDATE ACTIVITE
                      SET  CODEETATACT = 'A'
                      WHERE CODEANIM = '$cdan' AND DATEACT = '$dtact' ");
  return $req;
}
function verifAct($dtact,$cdan){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM activite
                      WHERE DATEACT= '$dtact'AND CODEANIM = '$cdan'");
  return $req->fetchAll();
}
function modifActPlanning($cdan,$dtact,$noen){
  global $bdd;
  $req = $bdd->query("UPDATE ACTIVITE
                      SET  NOENCADRANT = '$noen'
                    WHERE CODEANIM = '$cdan' AND DATEACT = '$dtact' ");
  return $req;
}
function modifAct($cdan,$dtactPrec,$dtact,$noen,$rdv,$prix,$hdeb,$hfin,$obj){
  global $bdd;
  $req = $bdd->query("UPDATE ACTIVITE
                      SET   DATEACT ='$dtact',
                            NOENCADRANT = '$noen',
                            HRRDVACT = '$rdv',
                            PRIXACT = '$prix',
                            HRDEBUTACT = '$hdeb',
                            HRFINACT = '$hfin',
                            OBJECTIFACT='$obj'
                    WHERE CODEANIM = '$cdan' AND DATEACT = '$dtactPrec' ");
  return $req;
}
?>
