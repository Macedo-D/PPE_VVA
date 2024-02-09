<?php
include("../modeles/m_bddConnexion.php");
/*Retourne toutes les anmiations*/
function getAllAnim(){
  global $bdd;
  $req = $bdd->query("SELECT *
              FROM animation
              ORDER BY DATEVALIDITEANIM ASC");
  return $req;
}
function getAnim($cdanim){
  global $bdd;
  $req = $bdd->query("SELECT *
                      FROM animation
                      WHERE CODEANIM = '$cdanim';
                      ");
  return $req->fetch();
}
function getTypeAnim(){
  global $bdd;
  $req = $bdd->query("SELECT *
              FROM type_anim");
  return $req;
}
function getCodeAn(){
  global $bdd;
  $req = $bdd->query("SELECT *
              FROM animation");
  return $req;
}
function addANim($cdan,$cdtyp,$nom,$datevalid,$duree,$limiteage,$tarif,$nbplace,$descrip,$comment,$difficulte){
  global $bdd;
  $DATECREATIONANIM=date("Y-m-d");
  $req = $bdd->query("INSERT INTO ANIMATION(CODEANIM,CODETYPEANIM,NOMANIM,DATECREATIONANIM,DATEVALIDITEANIM,DUREEANIM,LIMITEAGE,TARIFANIM,NBREPLACEANIM,DESCRIPTANIM,COMMENTANIM,DIFFICULTEANIM)
                             VALUES('$cdan','$cdtyp','$nom','$DATECREATIONANIM','$datevalid','$duree','$limiteage','$tarif','$nbplace','$descrip','$comment','$difficulte')");
  return $req;
}
function modifAnim($nom,$dtval,$duree,$limAge,$tarif,$nbplace,$comment,$diff,$cdan){
  global $bdd;
  $req = $bdd->query("UPDATE animation
                      SET NOMANIM        = '$nom' ,
                      		DATEVALIDITEANIM    = '$dtval',
                      		DUREEANIM   = '$duree',
                      		LIMITEAGE  = '$limAge',
                      		TARIFANIM   = '$tarif',
                      		NBREPLACEANIM   = '$nbplace',
                      		DESCRIPTANIM   = '$comment',
              		        DIFFICULTEANIM   = '$diff'
                    WHERE CODEANIM = '$cdan' ");
  return $req;
}
?>
