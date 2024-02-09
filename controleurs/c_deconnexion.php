<?php
/**/
?>
<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header("location:../view/v_connexion.php");
?>