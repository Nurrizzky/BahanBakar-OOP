<?php 

class Shell {
   protected $ppn;
   public   $shellSuper,
            $shellVpower,
            $shellVpowerDiesel,
            $shellVpowerNitro,
            $jumlah,
            $jenis,
            $harga;
   public function __construct()
   {
      $this->ppn = 0.1;
   }

   public function setHarga($shellSuper, $shellVpower, $shellVpowerDiesel, $shellVpowerNitro) {
      $this->shellSuper = $shellSuper;
      $this->shellVpower = $shellVpower;
      $this->shellVpowerDiesel = $shellVpowerDiesel;
      $this->shellVpowerNitro = $shellVpowerNitro;
   }
   
   public function getHarga() {
      $data['shellSuper'] = $this->shellSuper;
      $data['shellVpower'] = $this->shellVpower;
      $data['shellVpowerDiesel'] = $this->shellVpowerDiesel;
      $data['shellVpowerNitro'] = $this->shellVpowerNitro;
      return $data;
   }
}
class Proses extends Shell  {
   public function hargaBeli() {
      $dataHarga = $this->getHarga();
      $hargaBeli = $this->jumlah * $dataHarga[$this->jenis];
      $hargaPPN = $hargaBeli * $this->ppn;
      $hargaAkhir = $hargaPPN + $hargaBeli;
      return $hargaAkhir;
   }

   public function hargaPerliter() {
      $ambil = $this->getHarga();
      $hargaPerliter = $ambil[$this->jenis];
      return $hargaPerliter;
   }

   public function hargaPPN() {
      $ambil2 = $this->getHarga();
      $hargaNormalPPN = $ambil2[$this->jenis] * $this->ppn;
      return $hargaNormalPPN;
   }

   public function hargaDasar() {
      $hargaNormal = $this->jumlah * $this->hargaPerliter();
      return $hargaNormal;
   }

   public function cetak() {
      echo "<h3 class='text-center mb-3'>Hasil</h3>";
      echo "<p>". 'Anda membeli bahan bakar ' . $this->jenis ."</p>";
      echo "<p>". 'Dengan harga per-liternya : Rp ' . number_format($this->hargaPerliter(), 0, '', '.') . "</p>";
      echo "<p>". 'Dengan jumlah ' . $this->jumlah . 'L' ."</p>";
      echo "<p>". 'Harga Dasar : Rp ' . number_format($this->hargaDasar(), 0, '', '.') . "</p>";
      echo "<p>". 'Harga PPN(10%) : Rp ' . number_format($this->hargaPPN(), 0, '', '.')  ."</p>";
      echo "<p>" . "Total yang harus anda bayar :  Rp " . number_format($this->hargaBeli(), 0, '', '.') . "</p>" ."<br>";
   }
}
?>