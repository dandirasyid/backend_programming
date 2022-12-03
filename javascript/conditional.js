const nilai = 90;
let grade = "";

if(nilai > 90){
    grade = "A";
}else if (nilai > 80){
    grade = "B";
}else{
    grade = "C";
}

console.log(`Grade anda : ${grade}`);

// menggunakan short conditional/ ternary operator
const age = 19;
age > 21? console.log("sudah dewasa"): console.log("belum dewasa");