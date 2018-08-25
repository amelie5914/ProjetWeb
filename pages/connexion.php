<?php
$i=0;
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
          <button type="submit" class="btn btn-primary boutonReservation " name="connexion" id="id_submit" data-toggle="modal" data-target="#modalConnexion">Connexion</button>
          <a class="dropdown-item inscription" href="index.php?page=inscription">Tu es nouveau? Inscris toi!</a>
        </div>
     </div>
        
   </form>
</table>
</section>
            <?php
        if($i===0){
?>
<div class="modal fade" id="modalConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Erreur de connexion!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p> Cet email ou ce mot de passe n'est pas correct</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
    <?php
    
    }
    else if($i===1){
    ?>

<div class="modal fade" id="modalConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p> Vous êtes connectés! </p>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php } ?>
</section>
<?php
if(isset($_GET['connexion'])){
print "<meta http-equiv=\"refresh\": Content=\"0;URL=./index.php?page=accueil\">";
}
?>
       
 
