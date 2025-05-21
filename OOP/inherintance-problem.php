<?php 

class Produk {
    public $judul;
    public $penulis;
    public $penerbit;
    public $harga;
    public $playtime;
    public $halaman;
    public $tipe;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $playtime = 0, $halaman = 0, $tipe = "tipe") {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->playtime = $playtime;
        $this->halaman = $halaman;
        $this->tipe = $tipe;
    }
    public function getInfoProduk(){
        return " $this->penulis, $this->penerbit";
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap(){
        $str = "{$this->judul} | {$this->getInfoProduk()} (Rp. {$this->harga})";
        if ($this->tipe == "komik") {
            $str .= " - {$this->halaman} Halaman";
        }
        else if ($this->tipe == "game") {
            $str .= " - {$this->playtime} Jam";
        }
        return $str;
    }
}

class CetakInfoProduk {
    public function cetak( Produk $Produk) {
        $str = "{$Produk->judul} | {$Produk->getLabel()} (Rp. {$Produk->harga})";
        return $str;
    }
}

$Produk1 = new Produk("Atomic Habit", "James Clear", "Gramedia", 100000, 100, 0, "komik");
$Produk2 = new Produk("Expediticion 33", "Capcom", "gak ada", 0, 0, 100, "game");

echo "buku :" . $Produk1->getInfoLengkap();

?>