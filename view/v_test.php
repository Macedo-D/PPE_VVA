
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
$activiteExiste = verifAct($dt,$cdan)->fetchAll();
echo $cdan,"<br />",$dt,"<br />",$noen,"<br />",$cdetat,"<br />",$hrdv,"<br />",$prix,"<br />",$hdeb,"<br />",$hfin,"<br />",$dtannul,"<br />",$obj,"<br />";

$ajoutValide="FE";
$activiteExiste=array_filter($activiteExiste);
if(!empty($activiteExiste)){
  $ajoutValide="FAE";
  foreach($activiteExiste as $donnees){
      if($donnees['NOENCADRANT']==$noen){
        if($donnees['HRRDVACT']<"12:00:00" && $hrdv<"12:00:00"){
          $ajoutValide="FALSE";
          break;
        }
        elseif($donnees['HRRDVACT']>"12:00:00" && $hrdv>"12:00:00"){
          $ajoutValide="FALSE";
          break;
        }
        else{
          $ajoutValide="TRUE";
        }
      }
      else{
        $ajoutValide="TRUE";
      }
  }
}
else{
  $ajoutValide="TRUE";
}
if($ajoutValide=="FAE"){
  echo "add FAE";
}
elseif($ajoutValide=="FE"){
  echo "add FE";
}
elseif($ajoutValide=="FALSE"){
  echo "add F";
}
elseif($ajoutValide=="TRUE"){
  echo"add V";
}
 ?>
