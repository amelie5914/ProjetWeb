<?php
$r=new ReservationBD($cnx);
$d=new DisponibiliteBD($cnx);
$tabRes=$r->getReservation();
$n=count($tabRes);
$escape=new EscapeBD($cnx);
if(isset($_GET["supprimer"])){
    for($i=0;$i<$n;$i++){
        if(isset($_GET[$i])){
        $d->updateDispo(null,$tabRes[($i)]['idescape'],$tabRes[($i)]['date'].strval($tabRes[($i)]['idescape']),$tabRes[($i)]['heure']);
        $r->supprimerReservation($tabRes[($i)]['idreservation']);
       
        }
    }
    echo "<meta http-equiv=\"refresh\": Content=\"0;URL=./index.php?pages=admin_reservation\">";
}
?>
<div class="table-responsive">
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id de reservation</th>
        <th scope="col">Nom de l'escape</th>
        <th scope="col">Date</th>
        <th scope="col">Heure</th>
        <th scope="col">Nombre de personnes</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Prix</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <form method='GET'>
        <?php
    for($i=0;$i<$n;$i++){
        
        $nom=$escape->getNomEscape($tabRes[$i]['idescape']);
       echo "<tr>
        <td>".$tabRes[$i]['idreservation']."</td>";
       echo "<td>".$nom[0]['nomescape']."</td>";
       echo "<td>".$tabRes[$i]['date']."</td>";
       echo "<td>".$tabRes[$i]['heure']."</td>";
       echo "<td>".$tabRes[$i]['nbrepersonne']."</td>";
       echo "<td>".$tabRes[$i]['commentaire']."</td>";
       echo "<td>".$tabRes[$i]['prix']."</td>";
       echo "<td> <input type='checkbox' name='".$i."'></td>";
    echo"</tr> ";
    }?>
    </tbody>
        </table>
    </div>
    <button type='submit' class="boutonReservation btn-outline-info offset-md-4" name='supprimer'>Supprimer </button>
    </form>

    
