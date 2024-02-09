<?php
include("../view/v_header.php");
include("../view/v_menu.php");


?>
<p>Etes-vous inscrit à une activité ?</p>
<form action="../controleurs/c_lo_mesActivites.php?" method="post">
    <input type="text" name="noInsc" placeholder="Numero d'incritpion">
    <input id="submit" type="submit" name="valider" />
</form>

<?php
if (isset($_GET['erreur']))
{
  if ($_GET['erreur'] == 'date')
  {
    echo '<p id="error">Inscription impossible vérifiez que vos disponibilités sont compatibles avec l activité en question.</p>';
  }
  if ($_GET['erreur'] == 'age')
  {
    echo '<p id="error">Inscription impossible vérifiez que votre âge est compatible avec l activité en question.</p>';
  }
  if ($_GET['erreur'] == 'place')
  {
    echo '<p id="error">Inscription impossible il n y a plus de place pour cette activité.</p>';
  }
  if ($_GET['erreur'] == 'numIns')
  {
    echo '<p id="error">Numéro d inscription invalide !</p>';
  }

}
elseif(isset($_GET['valide']))
{
  if ($_GET['valide'] == 'ins')
  {
    echo '<p class="success">Inscription validée ! votre numéro :',$_GET['noIns'],'</p>';
  }
  if($_GET['valide'] == 'annuIns'){
    echo '<p class="success">Inscription annulée !</p>';
  }
  if ($_GET['valide'] == 'numIns')
  {?>

<form action="../controleurs/c_lo_annulerIns.php?noIns=<?php echo $_GET['noIns'];?>" method="post">
        <table class='stat'>
          <tr>
            <th>Numéro d'inscription</th>
            <th>Date activité</th>
            <th>Date d'inscritpion</th>
            <th> </th>
          </tr>
          <tr>
            <td><?php echo $_GET['noIns'];?></td>
            <td><?php echo $_GET['datea'];?></td>
            <td><?php echo $_GET['dateIns'];?></td>
            <td><input id="submit" type="submit" name="annulerIns" value="Annuler Inscription"/></td>
          </tr>
        </table>
</form>
<?php
  }

}
?>
