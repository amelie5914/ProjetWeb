<?php
$esc = new EscapeBD($cnx);
$tabEsc = $esc->getTexteEscape();
$nbr=count($tabEsc);
$dispo=new DisponibiliteBD($cnx);
$dispo1=new DisponibiliteBD($cnx);
if(isset($_GET["envoyer"])&&isset($_SESSION["client"])){
    $escape=$_GET['escape']+1;
    $tarif=$esc->getNomEscape($escape);
    $reservation=new ReservationBD($cnx);
    $reservation->ajoutReservation(array("idcli"=>$_SESSION['client'],"idescape"=>$escape,"heure"=>$_GET['heure'],"date"=>substr($_GET['datum'],0,-1),"commentaire"=>$_GET['commentaire'],"nbrepersonne"=>$_GET['nbrePersonne'],"tarif"=>$tarif[0]['tarif']));
  
    $idres=$reservation->getIdReservation();
    $dispo1->updateDispo($idres[0]['m'], $escape, $_GET['datum'],$_GET['heure']);
    echo "<meta http-equiv=\"refresh\": Content=\"0;URL=./pages/imprimerReservation.php\">";
}
?>
<h1 class="centrer">Remplissez ce formulaire pour faire une reservation.</h1>
<form method="GET">
    <div class="form-row ">
        <div class="col-sm-2 offset-md-4">
            <div class="form-group">
                <label >Escape: </label>
                <select name="escape"  id="escape" class='form-control required' content-type="choices" trigger="true" target="datum">
                    
			<?php
				for($i=0;$i<$nbr;$i++){
					echo "<option value=".$i/*$tabEsc[$i]['idescape']*/.">".$tabEsc[$i]['nomescape']." </option>";
				}
			?>
		</select>
            </div>
        </div>
        <div class="col-sm-2 ">
            <div class="form-group">
                <label >Date: </label>
                <select name="datum" id="datum" class='form-control required' content-type="choices" trigger="true" target="heure" >
                    <?php
                        $z=1;
                        for($k=0;$k<$nbr;$k++){
                                        
					 echo "<optgroup reference='"./*$tabEsc[$k]['idescape']*/$k."'>";
                                        
                                        $dateEsc=$dispo->dispoEscapeDate($tabEsc[$k]['idescape']);
                                        
                                        $nb=count($dateEsc);
                                        //var_dump($nb);
                                    for($j=0;$j<$nb;$j++){
                                            echo "<option value=".$dateEsc[$j]['iddate'].">".$dateEsc[$j]['d']." </option>";
                                            $z=$z+1;
                                    }
                                        
                                      echo "</optgroup>";
			}
                    ?>
                    
		</select>
            </div>
        </div>
       <div class="col-sm-2 ">
            <div class="form-group">
                <label >Heure: </label>
                <select name="heure" id="heure" class='form-control required' content-type="choices" >
                    <?php
                        for($k=0;$k<$nbr;$k++){
                            $dateEsc=$dispo->dispoEscapeDate($tabEsc[$k]['idescape']);
                            $nb=count($dateEsc);
                            for($j=0;$j<$nb;$j++){
                                echo "<optgroup reference=".$dateEsc[$j]['iddate'].">";
                                $heureEsc=$dispo->dispoEscapeDateHeure($dateEsc[$j]['iddate']);
                                $n=count($heureEsc);
                                 for($i=0;$i<$n;$i++){
                                    echo "<option value=".$heureEsc[$i]['heure'].">".$heureEsc[$i]['heure']." </option>";
                                }
                            }
                                        
                                      echo "</optgroup>";
			}
                    ?>
		</select>
            </div>
        </div>
    </div>
     <div class="form-row">
         <div class="form-group offset-md-4">
             <label for="id_nbrePersonne">Nombre de personnes :</label>
            <input type="number" class="is-invalid" id="id_nbrePersonne" name="nbrePersonne" placeholder="Nombre de personne" aria-describedby="inputGroupPrepend3" required/>
					
         </div>
     </div>
    <div class="form-row ">
        <div class="form-group offset-md-4">
            <label for="id_commentaire">Commentaire :</label>
            <textarea rows="2" id="id_commentaire" name="commentaire" placeholder="Quelque chose à dire en plus?"></textarea>
            
					  
        </div>
    </div>
    <div class="form-row">
        <div class="form-group offset-md-4">
            <input type="submit" class="boutonReservation" name="envoyer" id="id_submit" value="Envoyer"/>
            <input type="reset" class="boutonReservation" id="id_reset" value="Annuler"/>
        </div>
            
    </div>
</form>
  <script>
    $("select[content-type='choices']").on('change',function(){
		        updateSelectBox($(this));
	        });
                </script>