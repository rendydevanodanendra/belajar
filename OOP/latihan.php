<?php

class Buku{
    public $judul;
    public $pengarang;  
    public $penerbit;
    public $tahun_terbit;

    public function ___construct($judul, $pengarang, $penerbit, $tahun_terbit){
        $this->judul = $judul;
        $this->pengarang = $pengarang;
        $this->penerbit = $penerbit;
        $this->tahun_terbit = $tahun_terbit;
    }
    
    public function getInfo(){
        return "judul: {$this->judul},
                pengarang: {$this->pengarang},
                penerbit: {$this->penerbit},
                tahun terbit: {$this->tahun_terbit}";
    }
}

$buku1 = new Buku();
$buku1->judul = "Belajar PHP";
$buku1->pengarang = "Budi";
$buku1->penerbit = "Gramedia";
$buku1->tahun_terbit = 2020;

$buku2 = new Buku();
$buku2->judul = "Belajar JavaScript";
$buku2->pengarang = "Andi";
$buku2->penerbit = "Elex Media";
$buku2->tahun_terbit = 2021;

$buku3 = new Buku("atomic habit", "james clear", "gramedia", 2022);

echo $buku1->getInfo() . "<br>";
echo $buku2->getInfo() . "<br>";
echo $buku3->getInfo() . "<br>";

