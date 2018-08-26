<?php
$esc = new EscapeBD($cnx);
$tabEsc = $esc->getTexteEscape();
$nbr=count($tabEsc);
$dispo= new DisponibiliteBD($cnx);


if(isset($_GET["envoyerDispo"])){
    $escape=$_GET['escape']+1;
    //var_dump($_GET["h"]);
    $dispo->ajoutDispo(array("date"=>$_GET['d'],"idescape"=>$escape,"heure"=>$_GET['h']));
}
?>
<section>
    <h1 class="centrer">Inscrire les disponibilites!</h1>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="GET">
      
    <div class="form-group row ">
      <label class="col-sm-2  row offset-md-4">Escape: </label>
      <div class="col-sm-2">
                <select name="escape"  id="escape" class='form-control required' content-type="choices" trigger="true" target="datum">
                    
			<?php
				for($i=0;$i<$nbr;$i++){
					echo "<option value=".$i/*$tabEsc[$i]['idescape']*/.">".$tabEsc[$i]['nomescape']." </option>";
				}
			?>
		</select>
      </div>
    </div>
    
  </div>
        <div class="form-group row">
      <label for="d" class="col-sm-2 row offset-md-4" >Date</label>
      <div class="col-sm-2">
      <input type="date" class="form-control " name="d" id="d" aria-describedby="inputGroupPrepend3" required>
      `</div>
    </div>
        <div class="form-group row ">
    <label for="h" class="col-sm-2 row offset-md-4" >Heure</label>
     <div class="col-sm-2">
    <input type="time" class="form-control " name="h" id="h" placeholder="Heure" aria-describedby="inputGroupPrepend3" required>
     </div>
  </div>
 
  <div class="form-group ">
      <div class="col-sm-4 offset-md-4">
  <button type="submit" class="btn btn-outline-info boutonReservation " name="envoyerDispo" id="envoyerDispo" data-toggle="modal" data-target="#modalInscription">Inscrire</button>
  <button id="annuler" class="btn btn-outline-info boutonReservation ">Annuler</button>
      </div>
  </div>
</form>