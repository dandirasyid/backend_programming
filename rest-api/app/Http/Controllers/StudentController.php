<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::all();

        if (!$students->isEmpty()) {
            $data = [
                'message' => 'Get all student',
                'data' => $students
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Students Not Found'
            ];

            return response()->json($data, 404);
        }
    }

    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        foreach ($input as $key => $value) {
            if (!$input[$key]) {
                $data = [
                    'message' => $key . ' is required',
                ];

                return response()->json($data, 404);
            }
        }

        $data = [
            'message' => 'Student is Creeated Sucessefully',
            'data' => Student::create($input)
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        # cari data student yang ingin di update
        $student = Student::find($id);

        if ($student) {
            # mendapatkan data request
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan,
            ];

            # mengupdate data
            $student->update($input);

            $data = [
                'message' => 'Student is Updated Sucessefully',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        # cari data student yang ingin di hapus
        $student = Student::find($id);

        if ($student) {
            # hapus data student tersebut
            $student->delete();
            $data = [
                'message' => 'Student is Deleted',
            ];

            # mengembalikan respon data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            # mengembalikan respon data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    # menambahkan detail resource student
    # membuat method show
    public function show($id)
    {
        #cari data student
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];

            # mengembalikan data json dengan code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 404);
        }
    }
}
