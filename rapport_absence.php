<?php 
require 'fpdf/fpdf.php';
include 'codes/config.php';
class myPDF extends FPDF{
	function header(){
		$this->Image('assets/img/brand/school.png',10,0,70);
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'Liste des absences',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		
		$this->Ln(20);

	}
	function footer(){
		$this->setY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
	}



}
$pdf= new myPDF();
$pdf->SetMargins(10,50,10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Cell(30,10,'ID etudiant',1,0);
$pdf->Cell(40,10,'Nom Complet',1,0);
$pdf->Cell(30,10,'Date absence',1,0);
$pdf->Cell(30,10,'Seance ',1,0);
$pdf->Cell(50,10,'Motif',1,1);
$d=$_GET['d'];
$sql="SELECT idAbsence,a.idEtudiant,dateAbsence,seance,motif,nom,prenom from absence a,etudiant e where a.idEtudiant=e.idEtudiant and dateAbsence='$d'
                     order by e.idEtudiant ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
    $pdf->Cell(30,10,$row['idEtudiant'],1,0);
    $pdf->Cell(40,10,$row['nom'].' '.$row['prenom'],1,0);
    $pdf->Cell(30,10,$row['dateAbsence'],1,0);
    $pdf->Cell(30,10,$row['seance'],1,0);
    $pdf->Cell(50,10,$row['motif'],1,1);
}
$pdf->Output();

?>