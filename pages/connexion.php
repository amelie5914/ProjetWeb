<?php
	
if(isset($_GET["connexion"])){
    $cli = new ClientBD($cnx);
    $client=$cli->connect($_GET["email"],$_GET["mdp"]);
    if(is_null($client)){
        //faire une popup
        var_dump($_SESSION['client']);
    }
    else{
        $_SESSION['client']=$client[0]->idcli;?>
        <meta http-equiv = "refresh": content = "0;url=index.php?page=accueil">
        <?php
    }
    
}
?>
<section>
    <h1 class="centrer">Connectez-vous!</h1>
<table class="formulaire">
    <form action="index.php?page=inscription.php" method="GET">
	<tr>
		<td><label for="id_email">Votre e-mail :</label></td>
		<td> <input type="email" id="id_email" name="email" aria-describedby="inputGroupPrepend3" required/></td>
	</tr>
        <tr>
            <td><label for="id_prenom">Mot de passe :</label></td>
            <td><input type="password" id="id_mdp" name="mdp" aria-describedby="inputGroupPrepend3" required/></td>
	</tr>
         <tr>
             <td><button type="submit" class="boutonReservation" name="connexion" id="id_submit" >Connexion</button></td>
            <td><a class="dropdown-item inscription" href="index.php?page=inscription">Tu es nouveau? Inscris toi!</a> </td>
	</tr>
    </form>
</table>
</section>

