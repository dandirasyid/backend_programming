// import mysql 
const mysql = require("mysql");

// import dotenv dan menjalankan method config 
require("dotenv").config();

// destructing object process dotenv
const {DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE} = process.env;

// membuat koneksi database menggunakan createConnection
// method menerima paramater object: host, user, password, database
const db = mysql.createConnection({
    host: DB_HOST,
    user: DB_USERNAME,
    password: DB_PASSWORD,
    database: DB_DATABASE,
});

// menghubungkan ke database menggunakan method connect
// menerima paramater callback
db.connect((err) => {
    if(err){
        console.log("Error connecting " + err.stack);
        return;
    }else{
        console.log("Connected to database");
        return;
    }
});

// mengeksport db
module.exports = db;