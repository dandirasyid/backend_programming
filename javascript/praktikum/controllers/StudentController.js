// import models Student
const Student = require("../models/Student");

// buat class student controller
class StudentController{
    async index(req, res){
        // memanggil method static all
        // Student.all(function(students) {
        //     const data ={
        //         message:"Menampilkan semua data students",
        //         data : students,
        //     };
        //     res.json(data);
        // });

        // menambahkan keywor async await untuk memberi tahu process asynchronous 
            const students = await Student.all();
            
            const data ={
                message:"Menampilkan semua data students",
                data : students,
            };
            res.json(data);
        }

    store(req, res){
        const {nama} =req.body;
        const data ={
            message :`Menambahkan data students ${nama}`,
            data : []
        };
        res.json(data);
    }

    update(req, res){
        const {id} = req.params;
        const {nama} =req.body;
        const data = {
            message : `Mengedit data students ${id}, nama ${nama}`,
            data : []
        };
        res.json(data);
    }

    destroy(req, res){
        const {id} = req.params;
        const data = {
            message : `Menghapus data students ${id}`,
            data : []
        };  
        res.json(data);
    }
}

// membuat objek studentcontroller
const object = new StudentController();

// export studentcontroller
module.exports = object;