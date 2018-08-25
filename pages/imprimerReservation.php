<?php
require '../admin/lib/php/pgConnect.php';
require '../admin/lib/php/classes/Connexion.class.php';
require '../admin/lib/php/classes/Reservation.class.php';
require '../admin/lib/php/classes/ReservationBD.class.php';
require '../admin/lib/php/classes/Client.class.php';
require '../admin/lib/php/classes/ClientBD.class.php';
require '../admin/lib/php/classes/Escape.class.php';
require '../admin/lib/php/classes/EscapeBD.class.php';
$cnx = Connexion :: getInstance($dsn, $user, $pass);

$reservation=new ReservationBD($cnx);
$client=new ClientBD($cnx);
$escape=new EscapeBD($cnx);
$idres=$reservation->getIdReservation();
$info=$reservation->getInfoReservation($idres[0]['m']);
$c=$client->getInfoClient($info[0]['idcli']);
$nomEscape=$escape->getNomEscape($info[0]['idescape']);
require('../admin/lib/php/fpdf/fpdf.php');
class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->SetY(-15);
$pdf->SetX(5);
    // Police Arial italique 8
    $pdf->SetFont('Arial','I',30);
$pdf->Cell(200,20,'Confirmation de votre commande num: '.$idres[0]['m'],1,0,'L');
$pdf->Ln();
$pdf->SetTextColor(220,50,50);
$pdf->SetFont('Arial','I',10);
$pdf->Text(25,55,utf8_decode("Vous devez présenter ce billet pour accéder à l'escape"));
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','B',35);
$pdf->SetY(60);
$pdf->Text(25,100,$nomEscape[0]['nomescape']);
$pdf->SetFont('Times','B',10);
$pdf->Text(25,107,utf8_decode($nomEscape[0]['description']));
$pdf->SetFont('Times','B',16);
$pdf->Text(25,120,$info[0]['date'].'-  '.$info[0]['heure']);
$pdf->Text(25,130,$c[0]['nom'].' '.$c[0]['prenom']);
$pdf->Text(25,135,utf8_decode("Nombre de personne participant à l'escape: ".$info[0]['nbrepersonne']));
$pdf->Text(25,140,'Prix: '.$info[0]['prix']);
$pdf->Text(25,145,'Commentaire: '.$info[0]['commentaire']);
$pdf->Output();
?>