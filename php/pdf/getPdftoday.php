<?php
require_once("../connexion.php");
require('../../fpdf186/fpdf.php');

$date = date("Y-m-d");
//var_dump($date);

$sql = "SELECT * FROM vente WHERE MONTH(datevente) = MONTH(NOW())  AND datevente ='$date'";
$result = $conn->query($sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$titre = "Rapport Provenderie du : " . date("d-m-Y");
$pdf->Cell(80);
$pdf->Cell(30,10,$titre,4,20,'C');
$pdf->Ln();

$pdf->Cell(50,40,'nomproduit');
$pdf->Cell(50,40,'quantite');
$pdf->Cell(30,40,'prix');
$pdf->Cell(30,40,'montant');
$pdf->Cell(30,40,'Typepaiement');

$nomproduit = '';
$formule = 1;
$quantite = 0;
$prix = 0;
$montant = 0;
$somme = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $sqlfacture = "SELECT * FROM facture WHERE  idvente = '$id'";
    $resultfa = $conn->query($sqlfacture); 

    $quantite = 0;
    $prix = 0;
    $montant = 0;

    $pdf->Ln();
    $pdf->Cell(80);
    $pdf->Cell(30,10,'Formule'.$formule,4,20,'C');
    $pdf->Ln();
   
    while ($rowfacture = mysqli_fetch_assoc($resultfa)) {
        $nomproduit = substr_replace($rowfacture['nomproduit'],"",strpos($rowfacture['nomproduit'],"provenderie"));
        //$nomproduit = substr_replace($nomproduit,"1",strpos($nomproduit,"TOURTEAUX"));

        $pdf->Cell(50,10, $nomproduit);
        $pdf->Cell(50,10,$rowfacture['quantite']);
        $pdf->Cell(30,10,$rowfacture['prix']);
        $pdf->Cell(30,10,$rowfacture['montant']);
        $pdf->Cell(30,10,$rowfacture['Typepaiement']);
        $pdf->Ln();

        $quantite += $rowfacture['quantite'];
        $prix += $rowfacture['prix'];
        $montant += $rowfacture['montant'];
    } 
    
    $pdf->Cell(50,10,'Total');
    $pdf->Cell(50,10,$quantite);
    $pdf->Cell(30,10,$prix);
    $pdf->Cell(30,10,$montant);
    $pdf->Cell(30,10,'-');
    $somme +=$montant;

   $formule++;
}

$pdf->Output();
?>