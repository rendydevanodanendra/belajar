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

$produk1 = new produk("Atomic Habit", "James Clear", "Gramedia", 100000);
$produk2 = new produk("Belajar PHP", "Budi", "Gramedia");
$produk3 = new produk("Belajar JavaScript", "Andi", "Elex Media", 200000);
$produk4 = new produk("Belajar Java");


echo "buku :" . $produk1->getInfoProduk();
echo "<br>";
echo "buku :" . $produk2->getInfoProduk();
echo "<br>";
echo "buku :" . $produk3->getInfoProduk();
echo "<br>";
echo "buku :" . $produk4->getInfoProduk();

?>