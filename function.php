<?php
function hitungLuas($jari){
    $phi = 3.14;
    $luasLingkaran = $phi * $jari * $jari;
    return $luasLingkaran;
}

echo hitungLuas(5);
echo "<br>". hitungLuas(10);
echo "<br>". hitungLuas(7);