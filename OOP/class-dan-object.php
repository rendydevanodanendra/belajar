<?php
// Class dan Object pada PHP
// Class adalah blueprint dari object, 
// sedangkan object adalah instance dari class  yang berisi data dan fungsi yang dapat digunakan untuk memanipulasi data tersebut.      
class Fruit{
    // property
    public $name;
    public $color;

    // Metode
    function set_name($name){
        $this->name = $name;
    }
    function set_color($color){
        $this -> color = $color;
    }
    function get_name(){
        return $this->name;
    }
    function get_color(){
        return $this->color;
    }


}
$apple = new Fruit(); // Membuat object baru dari class Fruit
$apple->set_name("Apel"); // Mengatur nama buah
$apple->set_color("Merah"); // Mengatur warna buah

echo "Nama buah: " . $apple->get_name() . "<br>"; // Menampilkan nama buah
echo "Warna buah: " . $apple->get_color() . "<br>"; // Menampilkan warna buah

$avocado = new Fruit();
$avocado->set_name("Alpukat"); // Mengatur nama buah
$avocado->set_color("Hijau"); // Mengatur warna buah

echo "Nama buah: " . $avocado->get_name() . "<br>"; // Menampilkan nama buah
echo "Warna buah: " . $avocado->get_color() . "<br>"; // Menampilkan warna buah
?>