// import models Student
const Student = require("../models/Student");

// buat class student controller
class StudentController{
    async index(req, res){
        // menambahkan keyword async await untuk memberi tahu process asynchronous 
            const students = await Student.all();
            
            const data ={
                message:"Menampilkan semua data students",
                data : students,
            };
            res.json(data);
        }

    async store(req, res){
        // menambahkan keyword async await untuk memberi tahu process asynchronous 
        const students = await Student.create(req.body);
        const data ={
            message :`Menambahkan data students`,
            data : students
        };
        res.json(data);
    }
}

// membuat objek studentcontroller
const object = new StudentController();

// export studentcontroller
module.exports = object;