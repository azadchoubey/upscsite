<?php

session_start();
 $user = $_SESSION["username"];

 require 'db_config.php';
 $dis = "SELECT * FROM $user";
 $disply = mysqli_query($conn, $dis);
 require('fpdf/fpdf.php'); $pdf = new FPDF('P','mm','A4');
 $pdf->AddPage();
 $pdf->SetFont('Arial','',5);
 $pdf->SetDrawColor(50,50,100);
 

   
while ($row = mysqli_fetch_array($disply)) {
  $pdf->Cell(10,10,$row['Sno'],1,0); 
    $pdf->Cell(30,10,$row['Title'],1,0);
  $pdf->Cell(50,10,$row['note'],1,1);
      
          
        }      $pdf->Output();  
             ?>