<?php
if(isset($_GET['envoyer'])){
    extract($_GET, EXTR_OVERWRITE);

    $cli = new ClientBD($cnx);
    $cli->ajoutClient($_GET/*array ("nom"=>$_GET["nom"],"prenom"=>$_GET['prenom'],"adresse"=>$_GET['adresse'],"mdp"=>$_GET['mdp'],"email"=>$_GET['email'])*/);
    
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
    <input type="text" class="form-control champ" name="adresse" id="adresse" placeholder="Rue" aria-describedby="inputGroupPrepend3" required>
  </div>
  <div class="form-group">
   
  <button type="submit" class="btn btn-primary" name="envoyer" id="envoyer">Inscrire</button>
  <button id="annuler" class="btn btn-primary">Annuler</button
  </div>
</form>
    
</table>
</section>
