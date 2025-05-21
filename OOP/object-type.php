<?php 

class produk {
    public $judul;
    public $penulis;
    public $penerbit;
    public $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    public function getInfoProduk(){
        return "$this->judul, $this->penulis, $this->penerbit, $this->harga";
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

}

class CetakInfoProduk {
    public function cetak( produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new produk("Atomic Habit", "James Clear", "Gramedia", 100000);
$produk2 = new produk("Belajar PHP", "Budi", "Gramedia");



echo "buku :" . $produk1->getInfoProduk();
echo "<br>";
echo "buku :" . $produk2->getInfoProduk();
echo "<br>";

$infoProduk = new CetakInfoProduk();
echo $infoProduk->cetak($produk1);
?>