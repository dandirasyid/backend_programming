<?php

class Person{
    public $nama;
    public $alamat;
    public $jurusan;

    public function __construct($nama, $alamat, $jurusan)
    {
        $this->nama = $nama;
        $this-> alamat = $alamat;
        $this-> jurusan = $jurusan;
    }


    public function setNama($data)
    {
        $this->nama = $data;
    }

    public function getNama()
    {
        return $this->nama;
    }
}

$dandi -> setNama("Dandi Rasyid");
echo $dandi->getNama();
echo "<br>";

$syafira -> setNama("Syafira Anindita Maharani");
echo $syafira->getNama();