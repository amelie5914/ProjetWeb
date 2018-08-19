<?php
	$esc = new EscapeBD($cnx);
        $dispo=new DisponibiliteBD($cnx);
$tabEsc = $esc->getTexteEscape();
$nbr = count($tabEsc);
if(isset($_GET['nomEscape'])){
$escape=$esc->getIdEscape($_GET['nomEscape']);
}
if(isset($_GET["envoyer"])&&isset($_SESSION["client"])){
    $escape=$esc->getIdEscape($_GET['nomEscape']);
    $tarif=$esc->getIdEscape($_GET['nomEscape']);
    $reservation=new ReservationBD($cnx);
    $reservation->ajoutReservation(array("idcli"=>$_SESSION['client'],"idescape"=>$escape[0]['idescape'],"date"=>$_GET['date'],"commentaire"=>$_GET['commentaire'],"nbrepersonne"=>$_GET['nbrePersonne'],"tarif"=>$escape[0]['tarif']));
    var_dump($reservation);
}
?>
		<section>
			<h1 class="centrer">Remplissez ce formulaire pour faire une reservation.</h1>
			<table class="formulaire">
                            <form action="index.php?page=reservation.php" method="GET">
					
					<tr>
					<td><label for="nomEscape">Escape room :</label></td>
						<td>
							<select name="nomEscape" size="1" id="nomEscape">
							<?php
							for($i=0;$i<$nbr;$i++){
								echo "<option value=".str_replace(' ','_',$tabEsc[$i]['nomescape']).">".$tabEsc[$i]['nomescape']." </option>";
							}
							?>
							</select>
                                                    <?php echo $tabEsc[1]['nomescape'];?>
						</td>
					</tr>
                                        <tr>
						<td><label for="id_nbrePersonne">Nombre de personnes :</label></td>
						<td><input type="number" class="is-invalid" id="id_nbrePersonne" name="nbrePersonne" placeholder="Nombre de personne" aria-describedby="inputGroupPrepend3" required/></td>
					</tr>
                                        <tr>
						<td><label for="id_date">Date :</label></td>
                                                <td><input type="date" id="id_date" name="date" aria-describedby="inputGroupPrepend3" required /></td>
                                                </tr>
                                        <tr><td><label for="heure">Heure :</label></td> 
                                            <td>
                                                        <select name="heure" size="1" class="d-none" >
                                                           <?php 
                                                           for($i=0;$i<$nbr;$i++){
                                                               echo "<option value=".data[$i].heure.">".data[$i].heure."</option>";
                                                                   
                                                           }?>
							</select>
                                            </td>
                                            </tr>        
                                        <tr>
						<td><label for="id_commentaire">Commentaire :</label></td>
                                                <td><textarea rows="3" id="id_commentaire" name="commentaire" placeholder="Quelque chose à dire en plus?"></textarea></td>
					</tr>
                                        
                                        <tr>
						<td><input type="submit" class="boutonReservation" name="envoyer" id="id_submit" value="Envoyer"/></td>
						<td><input type="reset" class="boutonReservation" id="id_reset" value="Annuler"/></td>
					</tr>
				</form>
			</table>
		</section>

 