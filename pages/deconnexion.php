
<?php
session_destroy();
if(!isset($_SESSION['client'])){ 
    ?>
    <a href="./index.php?page=accueil"><button type="button" class="btn btn-outline-info bouton">Deconnexion</button></a>
   <?php
}
?>
