

<?php include("../view/v_header.php"); ?>



  <body class="index" background="../css/images/pelvoux.jpg" style="background-size: cover" >
  		<div class="container">
  			<form id="signup" method="post" action="../controleurs/c_connexion.php">
  			<div class="header">
            <h3>Village Vacance Alpes</h3>
        </div>
        <div class="inputs">
            <input type="text" id="login" name="user" placeholder="LAGAF"/>
            <input type="password" id="password" name="mdp" placeholder="************"/>
            <input id="submit" type="submit" name="connexion"/><br />
        </div>
  			</form>
  		</div>
  	</body>
