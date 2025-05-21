<?php 

class produk {
    public $judul = "judul";
    public $penulis = "penulis";
    public $penerbit = "penerbit";
    public $harga = 0;

    public function getInfoProduk(){
        return "$this->judul, $this->penulis, $this->penerbit, $this->harga";
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

}

$produk1 = new produk();
$produk1->judul = "Atomic Habit";
$produk1->penulis = "James Clear";
$produk1->penerbit = "Gramedia";
$produk1->harga = 100000;

$produk2 = new produk();
$produk2->judul = "Belajar PHP";
$produk2->penulis = "Budi";
$produk2->penerbit = "Gramedia";

echo "buku :" . $produk1->getInfoProduk();
echo "<br>";
echo "buku :" . $produk2->getInfoProduk();

?>