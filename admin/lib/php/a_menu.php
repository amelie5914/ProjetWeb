 <?php
    if(isset($_SESSION['client'])){ 
         
        if($_SESSION['client']==1){?>
       
<div class="btn-group-justified menu" style="margin-top:40px;" >
    <a class=" style_bouton btn-lg btn_accueil" href="./index.php?pages=accueil_admin" aria-haspopup="true" aria-expanded="false" > Accueil </a>
 
  
<a class="style_bouton btn-lg btn_accueil" href="./index.php?pages=disponibilite">Disponibilite</a>
    <a class="style_bouton btn-lg btn_accueil" href="./index.php?pages=admin_reservation">Reservation</a>
    <a class=" style_bouton btn-lg" href="./index.php?pages=deconnexion" aria-haspopup="true" aria-expanded="false" > Deconnexion</a>
</div>
        <?php
        }
    }
?>
