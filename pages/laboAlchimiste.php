<?php
$esc = new EscapeBD($cnx);
$tabEsc = $esc->getTexteEscape();
$nbr = count($tabEsc);

?>
<h1 class="centrer">Le laboratoire de l'alchimiste</h1>
<img src="admin/images/ydav.jpg" alt="labo de l'alchimiste" class="img-responsive">
 <?php
                print  "<p style='margin-top:40px' >"."<span>".substr($tabEsc[1]['description'],0,1)."</span>".substr($tabEsc[1]['description'],1). "</p>";
                ?>
	<a href="./index.php?page=reservation"><button type="button" class="btn btn-outline-info bouton">RESERVATION</button></a>