<?php
	
if(isset($_GET["connexion"])){
    $cli = new ClientBD($cnx);
    $client=$cli->connect($_GET["email"],$_GET["mdp"]);
    if(is_null($client)){
        //faire une popup
        $i=1;
    }
    else{
        $_SESSION['client']=$client[0]->idcli;
        $i=0;?>
        <meta http-equiv=\"refresh\": Content=\"0;URL=./index.php?page=accueil\">
        <?php
    }
    
}
?>
<section>
    <h1 class="centrer">Connectez-vous!</h1>
<table class="formulaire">
    <form action="index.php?page=inscription.php" method="GET">
        <div class="form-group row">
        <label for="email" class="col-sm-2 offset-md-4 ">Email</label>
        <div class="col-sm-2">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-describedby="inputGroupPrepend3" required>
    </div>
  </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 offset-md-4 ">Mot de passe</label>
        <div class="col-sm-2">
          <input type="password" class="form-control" name="mdp" id="id_mdp" placeholder="Mot de passe" aria-describedby="inputGroupPrepend3" required>
        </div>
  </div>
       <div class="form-group row">
        <div class="col-sm-4 offset-md-4">
          <button type="submit" class="btn btn-primary boutonReservation " name="connexion" id="id_submit">Connexion</button>
          <a class="dropdown-item inscription" href="index.php?page=inscription">Tu es nouveau? Inscris toi!</a>
        </div>
     </div>
        
   </form>
</table>
</section>
       
 
