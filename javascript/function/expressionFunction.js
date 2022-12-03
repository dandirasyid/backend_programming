// digunakan untuk call back agar lebih mudah
const hitungLuasLingkaran = function (jarijari){
    const PHI = 3.14;
    const hasil = PHI * jarijari * jarijari;
    return hasil;
}

console.log(hitungLuasLingkaran(5));
console.log(hitungLuasLingkaran(10));
console.log(hitungLuasLingkaran(2));