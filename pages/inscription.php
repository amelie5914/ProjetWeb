<?php
$i=true;
if(isset($_GET['envoyer'])){
    extract($_GET, EXTR_OVERWRITE);

    $cli = new ClientBD($cnx);
    $i=$cli->ajoutClient($_GET/*array ("nom"=>$_GET["nom"],"prenom"=>$_GET['prenom'],"adresse"=>$_GET['adresse'],"mdp"=>$_GET['mdp'],"email"=>$_GET['email'])*/);

}
?>
<section>
    <h1 class="centrer">Inscrivez-vous!</h1>
<table class="formulaire">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="GET">
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" class="form-control " name="nom" id="nom" placeholder="Nom" aria-describedby="inputGroupPrepend3" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" class="form-control " name="prenom" id="prenom" placeholder="Prenom" aria-describedby="inputGroupPrepend3" required>
    </div>
  </div>
        <div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="email" class="form-control " name="email" id="email" placeholder="Email" aria-describedby="inputGroupPrepend3" required>
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control champ" name="mdp" id="mdp" placeholder="Password" aria-describedby="inputGroupPrepend3" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Confirmer mot de passe</label>
      <input type="password" class="form-control champ" id="confirmdp" placeholder="mot de passe" aria-describedby="inputGroupPrepend3" required>
    </div>
    
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control " name="adresse" id="adresse" placeholder="Rue" aria-describedby="inputGroupPrepend3" required>
  </div>
  <div class="form-group">
   
  <button type="submit" class="btn btn-outline-info boutonReservation" name="envoyer" id="envoyer" data-toggle="modal" data-target="#modalInscription">Inscrire</button>
  <button id="annuler" class="btn btn-outline-info boutonReservation ">Annuler</button
  </div>
</form>
    
</table>
    <?php
        if(!$i){
            var_dump(!$i);
?>
<div class="modal fade" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Erreur d'inscription!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p> Cet email est déjà utilisé par un autre utilisateur...</p>
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
    else{
    ?>

<div class="modal fade" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vous êtes correctement inscrits</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p> Vous êtes inscrits  </p>
          
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
if(isset($_GET['envoyer'])){
print "<meta http-equiv=\"refresh\": Content=\"0;URL=./index.php?page=connexion\">";
}
?>

   

