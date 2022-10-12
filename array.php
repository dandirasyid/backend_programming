<?php

$hewans = ["Ikan", "Kancil", "Buaya", "Babi"];

echo $hewans[0];
echo "<br>";
echo $hewans[1];
echo "<br>";
echo $hewans[2];
echo "<br>";
echo $hewans[3];
echo "<br>";

// membuat array assosiatif 
$user = [
    "nama" => "Dandi Rasyid",
    "jurusan" => "Teknik Informatika",
    "ipk" => 3.99,
]; 

foreach ($user as $key => $value){
    echo $key . ':' . $value;
}