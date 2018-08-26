<?php
$esc = new EscapeBD($cnx);
$tabEsc = $esc->getTexteEscape();
$nbr = count($tabEsc);

?>
<h1 class="centrer">La caverne du dragon</h1>
<img src="admin/images/qg85.jpg" alt="Caverne de dragon" class="img-responsive">
<p style="margin-top:40px" ><b>Cette salle se déroule en costumes, prêtés sur place</b></br>
 <?php
                print  "<p style='margin-top:40px' >"."<span>".substr($tabEsc[0]['description'],0,1)."</span>".substr($tabEsc[0]['description'],1)."</p>";
                ?>
    <?php
     print "<p>Prix:".$tabEsc[0]['tarif']."</p>";
    ?>
    <a href="./index.php?page=reservation"><button type="button" class="btn btn-outline-info bouton" href="./index.php?page=reservation">RESERVATION</button>
    </a>