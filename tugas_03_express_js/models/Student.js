// import database
const db = require("../config/database");

//membuat class model student
class Student{
    //solution with promise and async await
    static all(){
        return new Promise((resolve, reject)=>{
            const query = "SELECT * FROM students";
            /**
             * melakukan query menggunakan method query
             * menerima 2 params: query dan callback
             */
            db.query(query, (err, results) => {
                resolve(results);
            });
        });
    } 

    static async create(data, callback){
        // melakukan insert data ke database
        const id = await new Promise((resolve, reject)=>{
            const sql = "INSERT INTO students SET ?";
            db.query(sql, data, (err, results)=>{
                resolve(results.insertId);
            });
        });

        // refactor promise 2: get by id
        const student = this.find(id);
        return student;
    }

    static find(id){
        // melakukan query berdasarkan id
        return new Promise((resolve, reject)=>{
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, (err, results)=>{
                // destructing array
                const [student] = results;
                resolve(student);
            });
        });
    }

    static async update(id, data){
        await new Promise((resolve, reject)=>{
            const sql = "UPDATE students SET ? WHERE id = ?";
            db.query(sql, [data, id], (err, results)=>{
                resolve(results);
            });
        });

        // mencari data yang baru di update
        const student = await this.find(id);
        return student;
    }

    static delete(id){
        return new Promise((resolve, reject)=> {
            const sql = "DELETE FROM students WHERE id = ?";
            db.query(sql, id, (err, results)=>{
                resolve(results);
            });
        });
    }
}

// export class student
module.exports = Student;

