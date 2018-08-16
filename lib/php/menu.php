<!--<div class="d-flex">   
   <div class="btn-group">
  <button class="btn btn-secondary btn-lg" type="button">
    Large split button
  </button>
  <button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    
	<a href="./index.php?page=accueil" class="btn btn-dark">Accueil</a>
	<a href="#" class="btn btn-dark">AUtres</a>
  </div>
</div>
</div>
-->
<div class="btn-group-justified menu" style="margin-top:40px;" >
    <a class=" style_bouton btn-lg btn_accueil" href="./index.php?page=accueil" aria-haspopup="true" aria-expanded="false" > Accueil </a>
  <a class=" style_bouton dropdown-toggle btn-lg" href="#" data-toggle="dropdown" id="dropdownMenuLinkER" aria-haspopup="true" aria-expanded="false">
        Escape Room
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLinkER">
    <a class="dropdown-item" href="./index.php?page=laboAlchimiste" >Le laboratoire de l’alchimiste</a>
    <a class="dropdown-item" href="./index.php?page=caverneDragon">La caverne du dragon</a>
  </div>
    
    <a class=" style_bouton  btn-lg" href="./index.php?page=reservation" aria-haspopup="true" aria-expanded="false">
    Reservation
  </a>
    <a class=" style_bouton btn-lg" href="./index.php?page=contact" aria-haspopup="true" aria-expanded="false" > Contact </a>
    <?php
    if(isset($_SESSION['client'])){ 
        ?>
    <a class=" style_bouton btn-lg" href="./index.php?page=deconnexion" aria-haspopup="true" aria-expanded="false" > Deconnexion</a>
    <?php
    }
    else{
        ?>
            <a class=" style_bouton btn-lg" href="./index.php?page=connexion" aria-haspopup="true" aria-expanded="false">
            Connexion
          </a>
        <?php
    }
    ?>
       
</div> 
