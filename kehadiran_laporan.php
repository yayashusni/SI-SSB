<?php
include "conn.php";
require "assets/fpdf/fpdf.php";
class PDF extends FPDF
{
    // Membuat Page header
    public function Header()
    {
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(30);
        $this->Cell(133, 5, 'Sekolah Sepak Bola', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(92, 85, 191);
        $this->Cell(30);
        $this->Cell(133, 9, 'Tunas Harapan', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->SetTextColor(0);
        $this->Cell(30);
        $this->Cell(133, 3, 'Kawalimukti Kec.Kawali-Ciamis 2653', 0, 1, 'C');

        // Menambahkan garis header
        $this->SetLineWidth(1);
        $this->Line(10, 28, 200, 28);
        $this->SetLineWidth(0);
        $this->Line(10, 29, 200, 29);
        $this->Ln();
    }

    // Membuat page footer
    public function Footer()
    {

        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

//tampilkan judul laporan
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(0, 13, 'Laporan Data Kehadiran Siswa ', '0', 1, 'C');
$pdf->SetFont('Arial', 'B', '11');

$pdf->SetFont('Arial', '', '9');
$pdf->Cell(0, 13, 'Dari tanggal '.date('d-F-Y', strtotime($_POST['date1'])). ' sampai ' .date('d-F-Y', strtotime($_POST['date2'])), '0', 1, 'C');


//Membuat kolom judul tabel
$pdf->SetFont('Arial', '', '9');
$pdf->SetFillColor(92, 85, 191);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 0, 0);
$pdf->Cell(20, 7, 'No', 1, '0', 'C', true);
$pdf->Cell(60, 7, 'Nama Siswa', 1, '0', 'C', true);
$pdf->Cell(37, 7, 'Hadir', 1, '0', 'C', true);
$pdf->Cell(37, 7, 'Sakit', 1, '0', 'C', true);
$pdf->Cell(37, 7, 'Ijin', 1, '0', 'C', true);
$pdf->Ln();
//Membuat kolom isi tabel
$pdf->SetFont('Arial', '', '9');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0);
$no=1;
$query = mysqli_query($con, "SELECT siswa,COUNT(*) AS total ,SUM(case when hadir = '1' then 1 else null end) AS hadir,SUM(case when sakit = '1' then 1 else null end) AS sakit ,SUM(case when ijin = '1' then 1 else null end)  AS ijin FROM kehadiran  WHERE date BETWEEN '$_POST[date1]' AND '$_POST[date2]' Group by siswa");
while ($data = mysqli_fetch_array($query)) {
    $pdf->Cell(20, 7, $no++, 1, '0', 'L', true);
    $pdf->Cell(60, 7, $data['siswa'], 1, '0', 'L', true);
    $pdf->Cell(37, 7, $data['hadir'], 1, '0', 'L', true);
    $pdf->Cell(37, 7, $data['sakit'], 1, '0', 'L', true);
    $pdf->Cell(37, 7, $data['ijin'], 1, '0', 'L', true);
    $pdf->Ln();
}
// Menampilkan output file PDF
$pdf->Output('i', 'Laporan Data kehadiran SSB Tunas Harapan .pdf', 'false');
