
<!--
connexion à la bdd
-->

<?php
try {
    $bdd = new PDO('mysql:host=;dbname=gtl_vva;charset=utf8' , 'root', '');
}

catch (Exception $e) {
    die('Error : '.$e->getMessage());
}
?>
