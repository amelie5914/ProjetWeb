<?php
$esc = new EscapeBD($cnx);
$tabEsc = $esc->getTexteEscape();
$nbr=count($tabEsc);
$dispo=new DisponibiliteBD($cnx);
?>

<form action="">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <select name="escape"  id="escape" class='form-control ' content-type="choices" trigger="true" target="date">
                    <option value="0">Selectionnez l'escape</option>
			<?php
				for($i=0;$i<$nbr;$i++){
					echo "<option value=".$tabEsc[$i]['idescape'].">".$tabEsc[$i]['nomescape']." </option>";
				}
			?>
		</select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <select name="date" id="date" class='form-control' >
                    <?php
                        for($k=0;$k<$nbr;$k++){
                                        
					echo "<optgroup reference='".$tabEsc[$k]['idescape']."'>";
                                        echo "<option value=1> tot </option>";
                                        /*$heureEsc=$dispo->dispoEscapeDate($tabEsc[$k]['idescape']);
                                        
                                        $nb=count($heureEsc);
                                        var_dump($nb);
                                    for($j=0;$j<$nb;$j++){
                                            echo "<option value=".$heureEsc[$j]['date'].">".$heureEsc[$j]['date']." </option>";
                                    }*/
                                        
                                        echo "</optgroup>";
			}
                    ?>
                    
		</select>
            </div>
        </div>
        <!--<div class="col-sm-4">
            <div class="form-group">
                <select name="heure" onchange='submit()' id="heure" class='form-control '>
                    <option value="0">Selectionnez l'heure</option>
			<?php/*
                        if(isset($_GET['date'])){
                        $dispo=new DisponibiliteBD($cnx);
                        $heureEsc=$dispo->dispoEscapeDateHeure($_GET['escape'],$_GET['date']);
                        $nbr=count($heureEsc);
				for($i=0;$i<$nbr;$i++){
					echo "<option value=".$heureEsc[$i]['heure'].">".$heureEsc[$i]['heure']." </option>";
				}
                        }*/
			?>
		</select>
            </div>
        </div>-->
    </div>
</form>