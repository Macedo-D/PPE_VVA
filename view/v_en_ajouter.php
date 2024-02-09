<?php include("../view/v_header.php");
      include("../view/v_menu.php");

if (isset($_GET['erreur']))
{
  if ($_GET['erreur'] == 'animExiste')
  {
    echo '<p id="error">Cette animation existe déjà !';
  }
  if ($_GET['erreur'] == 'saisieAjout')
  {
    echo '<p id="error">echec veuillez remplir tout les champs !!';
  }
  if ($_GET['erreur'] == 'ajout')
  {
    echo '<p id="error">echec de l ajout de l activité !!';
  }
  if ($_GET['erreur'] == 'actMemeJour')
  {
    echo '<p id="error">echec de l ajout : une activité a déjà été programmée ce jour là pour cette animation !';
  }
}
elseif(isset($_GET['valide']))
{
  if ($_GET['valide'] == 'ajoutAnim')
  {
    echo '<p class="success">Ajout validé !';
  }
  if ($_GET['valide'] == 'ajoutAct')
  {
    echo '<p class="success">Ajout validé !';
  }
}
?>
<!-- Script java pour cacher les formulaires et les afficher lorque l'on clique dessus -->
<script language="javascript" type="text/javascript">
function bascule(elem)
   {
   etat=document.getElementById(elem).style.display;
   if(etat=="none"){
   document.getElementById(elem).style.display="block";
   }
   else{
   document.getElementById(elem).style.display="none";
   }
   }
</script>
<form action="../controleurs/c_en_ajoutAnim.php" method="post"></br>
  <h2>Ajouter une animation : <a href="" onclick="bascule('1'); return false;"> -> </a> </h2>
  <div id='1' style='display:none;'>
      <?php
          include("../modeles/m_animation.php");
          $typeAnim = getTypeAnim();
          echo "<select name='CODETYPEANIM' id='nomanim'/>";
          while ($donnees = $typeAnim->fetch())
          {
            echo '<option value="'.$donnees['CODETYPEANIM'].'">'.$donnees['NOMTYPEANIM'].'</option>';
          }
          echo"</select>";
      ?>
      <br /><br />
      <input type="text" name="CODEANIM" placeholder="CODE de l'animation"/></br></br>

      <input type="text" name="NOMANIM" placeholder="nom de l'animation" /></br></br>
      Date de validité de l'animation :
      <input type="date" name="DATEVALIDITEANIM" /></br></br>

      <input type="number" name="DUREEANIM" placeholder="durée de l'animation (min)" /></br></br>

      <input type="text" name="LIMITEAGE" placeholder="Limite d'âge" /></br></br>

      <input type="number" name="TARIFANIM" placeholder="Tarif (€)" /></br></br>

      <input type="number" name="NBREPLACEANIM" placeholder="Nombre de place maximum" /></br></br>

      <input type="text" name="DESCRIPTANIM" size=100 placeholder="Description" /></br></br>

      <input type="text" name="COMMENTANIM" placeholder="Commentaire" /></br></br>

      <input type="text" name="DIFFICULTEANIM" placeholder="difficulté" /></br></br>

      <input type="submit" value="Enregistrer" /></br>
  </div>
</form>

<form action="../controleurs/c_en_ajoutAct.php" method="post"></br>
  <h2>Ajouter une activité : <a href="" onclick="bascule('2'); return false;"> -> </a> </h2>
  <div id='2' style='display:none;'>
      <?php
          $codeAnim = getCodeAn();
          echo "<select name='CODEANIM' id='cdanim'/>";
          while ($donnees = $codeAnim->fetch())
          {
            echo '<option value="'.$donnees['CODEANIM'].'">'.$donnees['NOMANIM'].'</option>';
          }
          echo "</select>";
      ?>
          <br /><br />
          Date :
            <input type="date" name="DATEACT" /><br /><br />
          heure rdv :
            <input type="time" name="HRRDVACT" /><br /><br />
            <input type="number" name="PRIXACT" placeholder="Prix (€)" /><br /><br />
          Etat de l'activité :
            <?php
            include("../modeles/m_activite.php");
            $etatAct = getAllEtatAct();
            echo "<select name='CODEETATACT' id='CODEETATACT'/>";
              while ($donnees = $etatAct->fetch())
              {
                echo '<option value="'.$donnees['CODEETATACT'].'">'.$donnees['NOMETATACT'].'</option>';
              }
            echo "</select>";
            ?><br /><br />
          Heure de début :
            <input type="time" name="HRDEBUTACT" placeholder="Heure debut activité" /><br /><br />
          Heure de fin :
            <input type="time" name="HRFINACT" placeholder="Heure final activité" /><br /><br />
          Date annulation :
            <input type="date" name="DATEANULATIONACT" placeholder="Date annulation" /><br /><br />
            <input type="text" name="OBJECTIFACT" placeholder="Objectif" /><br /><br />
          Encadrant concerné :
           <?php
              include("../modeles/m_encadrant.php");
              $encandrants = getAllEn();
              echo "<select name='NOENCADRANT' id='NOENCADRANT'/>";
              while ($donnees = $encandrants->fetch())
              {
                echo '<option value="'.$donnees['NOENCADRANT'].'">'.$donnees['USER'].'</option>';
              }
              echo "</select>";
          ?>
          <br />
          </br>
          <input type="submit" value="Enregistrer" /></br>
  </div>
</form>
