 <?php
 

   $this->load->library('fpdf');
   $this->fpdf->FPDF("L","cm","A4");
   // kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm  
   $this->fpdf->SetMargins(1,1,1);
   /* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
   di footer, nanti kita akan membuat page number dengan format : number page / total page
   */
   $this->fpdf->AliasNbPages();
   // AddPage merupakan fungsi untuk membuat halaman baru
  $this->fpdf->AddPage();
  // Setting Font : String Family, String Style, Font size
  $this->fpdf->SetFont('Times','B',12);
$this->fpdf->setFont('Arial','B',9);
$this->fpdf->Text(6,1,'BUKTI HONOR '.$nama_lengkap.'');
$this->fpdf->setFont('Arial','B',9);
$this->fpdf->Text(8.3,1.5,'PENGAJUAN TANGGAL '.$pengajuan.'');
$this->fpdf->setFont('Arial','B',7);
     
$this->fpdf->ln(1.6);

$this->fpdf->ln(0.3);
$this->fpdf->Cell(1,0.5,'No',1,0,'C');
$this->fpdf->Cell(2,0.5,'Tanggal Praktikum',1,0,'C');
$this->fpdf->Cell(5,0.5,'Kelas',1,0,'C');
$this->fpdf->Cell(6,0.5,'Deskripsi',1,0,'C');
$this->fpdf->Ln();

for ($i=0; $i < count($no); $i++) { 
  


$this->fpdf->Cell(1,0.5,$no[$i],1,0,'C');
$this->fpdf->Cell(2,0.5,$tanggal_praktikum[$i],1,0,'L');
$this->fpdf->Cell(5,0.5,$kelas[$i],1,0,'L');
$this->fpdf->Cell(6,0.5,$deskripsi[$i],1,0,'L');
$this->fpdf->ln();
}
$this->fpdf->Cell(2,0.5,'Total honor : '.$honor.'',1,0,'C');


 $this->fpdf->Output("laporan.pdf","I");
?>