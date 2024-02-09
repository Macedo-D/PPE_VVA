<?php include("../view/v_header.php");
      include("../view/v_menu.php");
      if (isset($_GET['erreur']))
      {
        if ($_GET['erreur'] == 'modif')
        {
          echo '<p id="error">Modification impossible !';
        }
        if ($_GET['erreur'] == 'actMemeJour')
        {
          echo '<p id="error">Modification impossible cet encadrant a déjà une activité pour cette demi-journée !';
        }
      }
      elseif(isset($_GET['valide']))
      {
        if ($_GET['valide'] == 'modif')
        {
          echo '<p class="success">Modification du planning avec succès !';
        }
      }
?>
<h2>Gestion du planning des activités :</h2>
<form action="../controleurs/c_en_planning.php" method="post">
    <table class='stat'>
      <tr>
        <th>Encadrant</th>
        <th>Animation</th>
        <th>Date activité</th>
        <th></th>
      </tr>
      <tr>
        <td>
          <?php
             include("../controleurs/c_en_planning.php");
             $encandrants = getAllEn();
             echo "<select name='noen' id='noen'/>";
             while ($donnees = $encandrants->fetch())
             {
               echo '<option value="'.$donnees['NOENCADRANT'].'">'.$donnees['USER'].'</option>';
             }
             echo "</select>";
         ?>
        </td>
          <?php
            while ($donnees = $planning->fetch())
            {
              echo '<input type="hidden" name="cdan" value="'.$donnees['CODEANIM'].'" />';
              echo '<input type="hidden" name="dtact" value="'.$donnees['DATEACT'].'" />';
              echo '<td>'.$donnees['CODEANIM'].'</td>';
              echo '<td>'.$donnees['DATEACT'].'</td>';
            }
          ?>
        <td><input type="submit" value="modifier" name="modifPlanning"/></td>
      </tr>
    </table>
</form>
