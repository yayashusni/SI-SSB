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
$pdf->Cell(0, 13, 'Laporan Data Siswa ', '0', 1, 'C');
$pdf->SetFont('Arial', 'B', '11');

//Membuat kolom judul tabel
$pdf->SetFont('Arial', '', '9');
$pdf->SetFillColor(92, 85, 191);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 0, 0);
$pdf->Cell(40, 7, 'Nama ', 1, '0', 'C', true);
$pdf->Cell(20, 7, 'NISN ', 1, '0', 'C', true);
$pdf->Cell(30, 7, 'Alamat', 1, '0', 'C', true);
$pdf->Cell(28, 7, 'Tempat Lahir', 1, '0', 'C', true);
$pdf->Cell(26, 7, 'Tanggal Lahir', 1, '0', 'C', true);
$pdf->Cell(23, 7, 'Status Siswa', 1, '0', 'C', true);
$pdf->Cell(25, 7, 'No. Tlp', 1, '0', 'C', true);
$pdf->Ln();
//Membuat kolom isi tabel
$pdf->SetFont('Arial', '', '9');
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$query = mysqli_query($con, "SELECT * FROM anggota order by nama_lengkap ASC");
while ($data = mysqli_fetch_array($query)) {
    $pdf->Cell(40, 7, $data['nama_lengkap'], 1, '0', 'L', true);
    $pdf->Cell(20, 7, $data['nisn'], 1, '0', 'L', true);
    $pdf->Cell(30, 7, $data['alamat'], 1, '0', 'L', true);
    $pdf->Cell(28, 7, $data['tempat_lahir'], 1, '0', 'L', true);
    $pdf->Cell(26, 7, date_format(date_create($data['tanggal_lahir']),'d-m-Y'), 1, '0', 'L', true);
    $pdf->Cell(23, 7, $data['status'], 1, '0', 'L', true);
    $pdf->Cell(25, 7, $data['no_tlp'], 1, '0', 'L', true);
    $pdf->Ln();
}
// Menampilkan output file PDF
$pdf->Output('i', 'Data Siswa SSB Tunas Harapan .pdf', 'false');

