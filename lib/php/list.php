<?php
$dispo=new DisponibiliteBD($cnx);
if(empty($_GET['type'])){
    $type='date';
}
else{
    $type=$_GET['type'];
}
if($type==='date'){
    $tab=$dispo->dispoEscapeDate($idescape, $_GET['type']);
}
else if($type==='heure'){
    
}
else{
    throw new Exception();
}