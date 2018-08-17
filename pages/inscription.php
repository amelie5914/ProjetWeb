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
   
  <button type="submit" class="btn btn-outline-info " name="envoyer" id="envoyer" data-toggle="modal" data-target="#modalInscription">Inscrire</button>
  <button id="annuler" class="btn btn-outline-info ">Annuler</button
  </div>
</form>
    
</table>
</section>

   
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<table>
              <tr>
                  <td>Nom: </td>
                  <td><?php$_GET["nom"]?></td>
              </tr>
              <tr>
                  <td>Prenom: </td>
                  <td><?php$_GET["prenom"]?></td>
              </tr>
              <tr>
                  <td>Email: </td>
                  <td><?php$_GET["email"]?></td>
              </tr>
              <tr>
                  <td>Mot de passe: </td>
                  <td><?php$_GET["mdp"]?></td>
              </tr>
              <tr>
                  <td>Adresse: </td>
                  <td><?php$_GET["adresse"]?></td>
              </tr>
          </table>