<?php
//include connection file 
include_once("connection_class.php");
include_once('lib/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(80,10,'Student List',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('userid'=>'USERID', 'name'=> 'NAME','password'=> 'PASSWORD', 'email'=> 'EMAIL','mobile'=> 'MOBILE','gender'=> 'GENDER');
$count=mysqli_query($connString,"SELECT count(*) FROM users"); 
$c=mysqli_fetch_row($count);
$result = mysqli_query($connString, "SELECT userid, name, password,email, mobile,gender FROM users") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM users");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,"Total users: ".$c[0]);
$pdf->Ln();
foreach($header as $heading) {
$pdf->Cell(32,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(32,10,$column,1);
}
$pdf->Output();
?>