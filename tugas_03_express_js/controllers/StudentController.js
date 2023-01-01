// import models Student
const Student = require("../models/Student");

// buat class student controller
class StudentController{
    async index(req, res){
        // menambahkan keyword async await untuk memberi tahu process asynchronous 
            const students = await Student.all();
            
            // jika data array lebih dari 0 
            if(students.length > 0){
                const data = {
                    message:"Menampilkan semua data students",
                    data : students,
                }
                res.status(200).json(data);
            }else{
                const data = {
                    message:"Students is empty"
                }
                res.status(200).json(data);
            }

        }

    async store(req, res){
        /**
         * validasi sederhana
         * -menghandle jika salah satu data tidak dikirim
         */
        // destructing req body
        const {nama, nim, email, jurusan} = req.body;

        // jika data undefined maka kirim response error
        if(!nama || !nim || !email || !jurusan){
            const data = {
                message : "Semua data harus dikirim"
            }
            return res.status(422).json(data);
        }else{
            // memanggil method create dari model student 
            const students = await Student.create(req.body);
            const data ={
                message :`Menambahkan data students`,
                data : students
            };
            return res.status(201).json(data);
        }


    }

    async update(req, res){
        const {id} = req.params;
        // cari id student yang ingin di update
        const student = await Student.find(id);

        if(student){
            // melakukan update data
            const student = await Student.update(id, req.body);
            const data = {
                message : `Mengedit data students`,
                data : student
            };
            res.status(200).json(data);
        }else{
            const data = {
                message : "Student Not Found",
            };
            res.status(404).json(data);
        }
    }

    async destroy(req, res){
        const {id} = req.params;
        // cari id student yang ingin di update
        const student = await Student.find(id);
        if(student){
            await Student.delete(id);
            const student = await Student.update(id, req.body);
            const data = {
                message : `Menghapus data student ${id}`,
            };
            res.status(200).json(data);
        }else{
            const data = {
                message : "Student Not Found",
            };
            res.status(404).json(data);
        }
    }

    async show(req, res){
        const {id} = req.params;
        // cari id student yang ingin di update
        const student = await Student.find(id);
        if(student){
            const data = {
                message : `Menampilkan detail data student`,
                data : student
            };
            res.status(200).json(data);
        }else{
            const data = {
                message : `Student Not Found`,
            };
            res.status(404).json(data);
        }
    }
}

// membuat objek studentcontroller
const object = new StudentController();

// export studentcontroller
module.exports = object;