<?php
include_once("../modeles/m_activite.php");
session_start();
$nolo  = getNoLo($_SESSION['user']);
$anullerInscription = annuInscLo($nolo['NOLOISANT'],$_GET['noIns']);
header("location: ../view/v_lo_mesActivites.php?valide=annuIns");
?>
