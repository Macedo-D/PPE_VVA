
<?php include("../view/v_header.php");
      include("../view/v_menu.php");?>

<h2>Animations :</h2>
<form action="../view/v_lo_animations.php" method="post">
    <table class='stat'>
        <tr>
          <th>Nom </th>
          <th>Durée (min)</th>
          <th>Limite âge</th>
          <th>Tarif (€)</th>
          <th>Nombre place</th>
          <th>Description</th>
          <th>Difficulté</th>
          <th>Voir Activités</th>
        </tr>
        <?php
        include("../controleurs/c_lo_consulterAnim.php");
        //on affiche toutes les animations
        while ($ListeAnim = $getListeAnim->fetch()) {?>
        <tr>
          <td><?= $ListeAnim['NOMANIM']; ?></td>
          <td><?= $ListeAnim['DUREEANIM']; ?></td>
          <input type="hidden" name="limage" value="<?php echo $ListeAnim['LIMITEAGE']?>" />
          <td><?= $ListeAnim['LIMITEAGE']; ?></td>
          <td><?= $ListeAnim['TARIFANIM']; ?></td>
          <td><?= $ListeAnim['NBREPLACEANIM']; ?></td>
          <td><?= $ListeAnim['DESCRIPTANIM']; ?></td>
          <td><?= $ListeAnim['DIFFICULTEANIM']; ?></td>
          <td><input type="Submit" value="<?php echo $ListeAnim['CODEANIM']?>" name="cdanim"/></td>
        </tr>
  <?php } ?>
    </table>
</form>
<form action="../controleurs/c_lo_inscriptionAct.php?cdanim=<?php echo $_POST['cdanim']?>&amp;limage=<?php echo $_POST['limage']?>" method="post">
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
            <th>Etat A(Annulée)/V(Valide)</th>
            <th>Heure rdv</th>
            <th>Prix (€)</th>
            <th>Heure début</th>
            <th>Heure fin</th>
            <th>Objectif</th>
            <th>Isncription</th>
          </tr>
          <?php
            foreach ($getListeAct as $ListeAct) {?>
          <tr>
            <input type="hidden" name="dtact" value="<?php echo $ListeAct['DATEACT']?>" />
            <td><?= $ListeAct['DATEACT']; ?></td>
            <td><?= $ListeAct['CODEETATACT'] ?></td>
            <td><?= $ListeAct['HRRDVACT']; ?></td>
            <td><?= $ListeAct['PRIXACT']; ?></td>
            <td><?= $ListeAct['HRDEBUTACT']; ?></td>
            <td><?= $ListeAct['HRFINACT']; ?></td>
            <td><?= $ListeAct['OBJECTIFACT']; ?></td>
            <td>
                <input type="text" value="<?php if (isset($_POST['login']))?>" placeholder="description" name="descrip"/>
                <input type="Submit" value="Valider" name="inscription"/>
            </td>
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
