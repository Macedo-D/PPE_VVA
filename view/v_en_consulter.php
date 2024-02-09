<?php include("../view/v_header.php");
      include("../view/v_menu.php");?>
<?php
if (isset($_GET['erreur']))
{
  if ($_GET['erreur'] == 'modif')
  {
    echo '<p id="error">la modification a échouée !';
  }
  if ($_GET['erreur'] == 'aucunIns')
  {
    echo '<p id="error">Aucun loisant n est inscrit pour cette activité !';
  }
}
elseif(isset($_GET['valide']))
{
  if ($_GET['valide'] == 'modif')
  {
    echo '<p class="success">Modification validée !';
  }
  if ($_GET['valide'] == 'annuAct')
  {
    echo '<p class="success">L annulation de l activité a été prise en compte!';
  }
}
?>
<h2>Animations :</h2>
<form action="../view/v_en_consulter.php" method="post">
    <table class='stat'>
        <tr>
          <th>Nom </th>
          <th>Date Validité</th>
          <th>Durée (min)</th>
          <th>Limite âge</th>
          <th>Tarif (€)</th>
          <th>Nombre place</th>
          <th>Description</th>
          <th>Difficulté</th>
          <th>Voir Activités</th>
          <th></th>
        </tr>
        <?php
        include("../controleurs/c_lo_consulterAnim.php");
        //on affiche toutes les animations
        while ($ListeAnim = $getListeAnim->fetch()) {?>
        <tr>
          <td><?= $ListeAnim['NOMANIM']; ?></td>
          <td><?= $ListeAnim['DATEVALIDITEANIM']; ?></td>
          <td><?= $ListeAnim['DUREEANIM']; ?></td>
          <td><?= $ListeAnim['LIMITEAGE']; ?></td>
          <td><?= $ListeAnim['TARIFANIM']; ?></td>
          <td><?= $ListeAnim['NBREPLACEANIM']; ?></td>
          <td><?= $ListeAnim['DESCRIPTANIM']; ?></td>
          <td><?= $ListeAnim['DIFFICULTEANIM']; ?></td>
          <td><input type="Submit" value="<?php echo $ListeAnim['CODEANIM']?>" name="cdanim"/></td>
          <td><a href="../controleurs/c_en_modifAnim.php?page=test&amp;cdanim=<?php echo $ListeAnim['CODEANIM']?>">Modifier Animation</a>
          </td>
        </tr>
  <?php } ?>
    </table>
</form>

<form action="../controleurs/c_en_modifAnim.php" method="post">
  <?php
  if(isset($_GET['form'])){
    if ($_GET['form'] == 'anim')
    {
  ?>
      <h2>Animation : <?php echo $_GET['cdan'];?></h2>
      <input type="hidden" name="cdan" value="<?php echo $_GET['cdan'];?>" />
      <table class='stat'>
        <tr>
          <th>Nom </th>
          <th>Date Validité</th>
          <th>Durée (min)</th>
          <th>Limite âge</th>
          <th>Tarif (€)</th>
          <th>Nombre place</th>
          <th>Description</th>
          <th>Difficulté</th>
          <th></th>
        </tr>
        <tr>
          <td><input type="text" name="nom" value="<?= $_GET['noman']; ?>" /></td>
          <td><input type="date" name="dtval" value="<?= $_GET['dtvalan']; ?>" /></td>
          <td><input type="text" name="duree" value="<?= $_GET['dureean']; ?>" /></td>
          <td><input type="text" name="limage" value="<?= $_GET['limagean']; ?>" /></td>
          <td><input type="text" name="tarif" value="<?= $_GET['tarifan']; ?>" /></td>
          <td><input type="text" name="nbplace" value="<?= $_GET['nbplacean']; ?>" /></td>
          <td><input type="text" name="descrip" value="<?= $_GET['descan']; ?>" /></td>
          <td><input type="text" name="diff" value="<?= $_GET['diffan']; ?>" /></td>
          <td><input type="Submit" value="modifier" name="modifAnim"/></td>
        </tr>
      </table>
  <? }
  }  ?>
</form>
<form action="../controleurs/c_en_modifAct.php?cdanim=<?php echo $_POST['cdanim']?>&amp;limage=<?php echo $_POSt['limage']?>" method="post">
    <?php
    //on affiche les activites de l'animation correspondante
    if(isset($_POST['cdanim'])){
      include("../controleurs/c_lo_ConsulterActivite.php");
      //on vérifie qu'il y a bien des activités
      $getListeAct=array_filter($getListeAct);
      if (!empty($getListeAct)){
          ?>
        <h2> Activités :</h2>
        <table class='stat'>
          <tr>
            <th>Date</th>
            <th>Heure rdv</th>
            <th>Prix (€)</th>
            <th>Heure début</th>
            <th>Heure fin</th>
            <th>Objectif</th>
            <th></th>
            <th></th>
          </tr>
          <?php
          foreach ($getListeAct as $ListeAct) {?>
          <tr>
            <input type="hidden" name="dtact" value="<?php echo $ListeAct['DATEACT']?>" />
            <td><?= $ListeAct['DATEACT']; ?></td>
            <td><?= $ListeAct['HRRDVACT']; ?></td>
            <td><?= $ListeAct['PRIXACT']; ?></td>
            <td><?= $ListeAct['HRDEBUTACT']; ?></td>
            <td><?= $ListeAct['HRFINACT']; ?></td>
            <td><?= $ListeAct['OBJECTIFACT']; ?></td>
            <td>
                <a href="../controleurs/c_en_modifAct.php?page=test&amp;cdanim=<?php echo $_POST['cdanim']?>&amp;dtAct=<?php echo  $ListeAct['DATEACT'];?>">Modifier Activité</a>
            </td>
            <td>
              <a href="../controleurs/c_en_modifAct.php?page=annulerAct&amp;cdanim=<?php echo $_POST['cdanim']?>&amp;dtAct=<?php echo  $ListeAct['DATEACT'];?>">Annuler Activité</a>
            </td>
            <td><a href="../view/v_en_consulter.php?page=listerIns&amp;cdanim=<?php echo $_POST['cdanim']?>&amp;dtAct=<?php echo  $ListeAct['DATEACT'];?>">Afficher les loisants inscrits à cette activité -></a></td>
          </tr>

<?php     }
      }
    else
    {
      echo "<p id='error'> Il n'y a pas encore d'activités liées à cette animation!";
    }
  } ?>
    </table>
</form>
<form action="" method="">
  <?php
  if(isset($_GET['page'])){
    if($_GET['page'] == 'listerIns')
    {
      include("../controleurs/c_en_listerInscrits.php");
      $getListeInscrits=array_filter($getListeInscrits);
      if(!empty($getListeInscrits))
      {
        ?>
        <h2>Liste des loisants inscrits à l'activité selectionnée :</h2>
        <table class='stat'>
          <tr>
            <th>Nom loisant</th>
            <th>Prénom loisant</th>
            <th>Date activité</th>
            <th>Date d'inscription</th>
            <th>Remarque d'inscrption</th>
          </tr>
          <?php

          foreach ($getListeInscrits as $ListeInscrits ) {?>
          <tr>
            <td><?= $ListeInscrits['NOMLOISANT']; ?></td>
            <td><?= $ListeInscrits['PRENOMLOISANT']; ?></td>
            <td><?= $ListeInscrits['DATEACT']; ?></td>
            <td><?= $ListeInscrits['DATEINSCRIP']; ?></td>
            <td><?= $ListeInscrits['REMARQUEINSCRIP']; ?></td>
          </tr>
      <?php
          }
      }
      else
      {
        echo "<p id='error'>Aucun loisant n est inscrit pour cette activité !";
      }
    }
 } ?>
</form>
<form action="../controleurs/c_en_modifAct.php" method="post">
  <?php
  if(isset($_GET['form'])){
    if ($_GET['form'] == 'act')
    {
  ?>
      <h2>Activité : <?php echo $_GET['cdan'];?></h2>
      <input type="hidden" name="cdan" value="<?php echo $_GET['cdan'];?>" />
      <table class='stat'>
        <tr>
          <th>Date</th>
          <th>Encadrant</th>
          <th>Heure rdv</th>
          <th>Prix (€)</th>
          <th>Heure début</th>
          <th>Heure fin</th>
          <th>Date annulation</th>
          <th>Objectif</th>
          <th></th>
        </tr>
        <tr>
          <input type="hidden" name="cdan" value="<?= $_GET['cdan']; ?>" />
          <input type="hidden" name="datePrec" value="<?= $_GET['dtact']; ?>" />
          <td><input type="date" name="date" value="<?= $_GET['dtact']; ?>" /></td>
          <td>
          <?php
             include("../modeles/m_encadrant.php");
             $encandrants = getAllEn();
             echo "<select name='noen' id='noen'/>";
             while ($donnees = $encandrants->fetch())
             {
               echo '<option value="'.$donnees['NOENCADRANT'].'">'.$donnees['USER'].'</option>';
             }
             echo "</select>";
         ?>
          </td>
          <td><input type="text" name="hrdv" value="<?= $_GET['hrdv']; ?>" /></td>
          <td><input type="text" name="prix" value="<?= $_GET['prix']; ?>" /></td>
          <td><input type="text" name="hdeb" value="<?= $_GET['hdeb']; ?>" /></td>
          <td><input type="text" name="hfin" value="<?= $_GET['hfin']; ?>" /></td>
          <td><input type="text" name="dtannul" value="<?= $_GET['dtannul']; ?>" /></td>
          <td><input type="text" name="obj" value="<?= $_GET['obj']; ?>" /></td>
          <td><input type="Submit" value="modifier" name="modifAct"/></td>
        </tr>
      </table>
  <? }
  }  ?>
</form>
