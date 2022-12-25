// import database
const db = require("../config/database");

//membuat class model student
class Student{
    /**
     * solution with callback
     */
    // static all(callback){
    //     const query = "SELECT * FROM students";
    //     /**
    //      * melakukan query menggunakan method query
    //      * menerima 2 params: query dan callback
    //      */
    //     db.query(query, (err, results) => {
    //         callback(results);
    //     });
    // }

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
}

// export class student
module.exports = Student;