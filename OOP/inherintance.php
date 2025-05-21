<?php 

class Produk {
    public $judul;
    public $penulis;
    public $penerbit;
    public $harga;
    public $playtime;
    public $halaman;


    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $playtime = 0, $halaman = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->playtime = $playtime;
        $this->halaman = $halaman;
    }
    public function getInfoProduk(){
        return " $this->penulis, $this->penerbit";
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap(){
        $str = "{$this->judul} | {$this->getInfoProduk()} (Rp. {$this->harga})";

        return $str;
    }
}

class komik extends Produk {
    public function getInfoProduk()
    {
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->halaman} Halaman ";
        return $str;
    }
}

class game extends Produk {
    public function getInfoProduk()
    {
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->playtime} Game ";
        return $str;
    }
}

class CetakInfoProduk {
    public function cetak( Produk $Produk) {
        $str = "{$Produk->judul} | {$Produk->getLabel()} (Rp. {$Produk->harga}) ";
        return $str;
    }
}

$Produk1 = new komik("Atomic Habit", "James Clear", "Gramedia", 100000, 100, 0);
$Produk2 = new game("Expediticion 33", "Capcom", "gak ada", 1000000, 0, 100);

echo  $Produk1->getInfoProduk();
echo "<br>";
echo  $Produk2->getInfoProduk();

?>