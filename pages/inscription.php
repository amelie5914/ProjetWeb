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
    <form action="index.php?page=inscription.php" method="GET">
	<tr>
		<td><label for="id_nom">Nom :</label></td>
            <td><input type="text" id="id_nom" name="nom" aria-describedby="inputGroupPrepend3" required/></td>
	</tr>
	<tr>
            <td><label for="id_prenom">Prénom :</label></td>
            <td><input type="text" id="id_prenom" name="prenom" aria-describedby="inputGroupPrepend3" required/></td>
	</tr>
        <tr>
            <td><label for="id_mdp">Mot de passe :</label></td>
            <td><input type="password" id="id_mdp" name="mdp" aria-describedby="inputGroupPrepend3" required/></td>
	</tr>
	<tr>
            <td><label for="id_adresse">Adresse :</label></td>
            <td><input type="text" id="id_adresse" name="adresse" aria-describedby="inputGroupPrepend3" required/></td>
	</tr>
	<tr>
		<td><label for="id_email">Votre e-mail :</label></td>
		<td> <input type="email" id="id_email" name="email" aria-describedby="inputGroupPrepend3" required/></td>
	</tr>
         <tr>
            <td><input type="submit" class="boutonReservation" name="envoyer" id="id_submit" value="Envoyer"/></td>
            <td><input type="reset" class="boutonReservation" id="id_reset" value="Annuler"/></td>
	</tr>
    </form>
</table>
</section>