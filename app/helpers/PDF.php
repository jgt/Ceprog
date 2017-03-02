<?php
/**
 * Created by PhpStorm.
 * User: anwar
 * Date: 15/07/16
 * Time: 01:16 AM
 */

namespace App\helpers;


use Anouar\Fpdf\Facades\Fpdf;

class PDF extends Fpdf
{
    function Header()
    {
        $this->AddPage('l','letter');
        $this->SetFont('Arial','B',16);
        $this->Cell(0,7,utf8_decode('Reporte General'),0,1,'C');
        $this->SetFont('Arial','B',16);
        $this->Cell(0,7,'',0,1,'C');
        $this->Ln();
    }
}