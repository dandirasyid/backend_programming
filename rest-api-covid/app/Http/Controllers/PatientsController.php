<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class PatientsController extends Controller
{
    # Method index - get all resource patients
    public function index()
    {
        # menggunakan model patients untuk select data
        $patients = Patients::all();

        if (!$patients->isEmpty()) {
            # membuat data array yang berisi pesan
            $data = [
                'message' => 'Get All Resource',
                'data' => $patients
            ];

            # mengirim data (json) dan status kode 200
            return response()->json($data, 200);
        } else {
            # membuat data array yang berisi pesan
            $data = [
                'message' => 'Data is empty'
            ];

            # mengirim data (json) dan status kode 404 (resource not found)
            return response()->json($data, 404);
        }
    }

    # Menambahkan resource patients - method store
    public function store(Request $request)
    {
        # menangkap request
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'date|required',
            'out_date_at' => 'date|required|after_or_equal:in_date_at',
        ]);

        # mengecek kesalahan validasi
        if($validation->fails()){
            return response()->json($validation->errors());
        }else{
            # membuat data patient
            $patient = Patients::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => $request->status,
                'in_date_at' => $request->in_date_at,
                'out_date_at' => $request->out_date_at,
            ]);
    
            # membuat array data yang berisi pesan dan menggunakan patients untuk insert data
            $data = [
                'message' => 'Resource is added successfully',
                'data' => $patient,
            ];
    
            # mengirim data (json) dan status kode 201 (Resouce created)
            return response()->json($data, 201);
        }
    }

    # Mendapatkan detail resource paients dengan membuat method show
    public function show($id)
    {
        # mencari id patients yang ingin didapatkan
        $patients = Patients::find($id);

        if ($patients) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patients,
            ];

            # mengembalikan data (json) dan status kode 200 (The request succeeded)
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];

            # mengembalikan data (json) dan status kode 404 (resource not found)
            return response()->json($data, 404);
        }
    }

    # Mengupdate resource patients dengan membuat method update
    public function update(Request $request, $id)
    {
        # mencari id patients yang ingin diupdate
        $patients = Patients::find($id);

        if ($patients) {
            # menangkap request
            $validation = Validator::make($request->all(),[
                'in_date_at' => 'date',
                'out_date_at' => 'date|after_or_equal:in_date_at',
            ]);

            if($validation->fails()){
                return response()->json($validation->errors());
            }else{
                # mendapatkan data request
                $patients->update([
                    'name' => $request->name ?? $patients->name,
                    'phone' => $request->phone ?? $patients->phone,
                    'address' => $request->address ?? $patients->address,
                    'status' => $request->status ?? $patients->status,
                    'in_date_at' => $request->in_date_at ?? $patients->in_date_at,
                    'out_date_at' => $request->out_date_at ?? $patients->out_date_at,
                ]);
    
    
                # membuat array data yang berisi pesan
                $data = [
                    'message' => 'Resource is update successfully',
                    'data' => $patients,
                ];
    
                # mengirimkan data (json) dan status kode 200 (The request succeeded)
                return response()->json($data, 200);
            }

        } else {
            # membuat array data yang berisi pesan
            $data = [
                'message' => 'Resource not found',
            ];

            # mengembalikan data (json) dan status kode 404 (resource not found)
            return response()->json($data, 404);
        }
    }

    # Menghapus resource patients dengan membuat method destroy
    public function destroy($id)
    {
        # cari data patients yang ingin di hapus
        $patients = Patients::find($id);

        if ($patients) {
            #  menghapus data patients
            $patients->delete();

            # membuat array data yang berisi pesan
            $data = [
                'message' => 'Resource is deleted successfully',
            ];

            # mengirimkan data (json) dan status kode 200 (The request succeeded)
            return response()->json($data, 200);
        } else {
            # membuat array data yang berisi pesan
            $data = [
                'message' => 'Resource not found',
            ];

            # mengirimkan data (json) dan status kode 404 (resource not found)
            return response()->json($data, 404);
        }
    }

    # Mencari resource berdasarkan parameter name
    public function search($name)
    {
        # mencari data patients berdasarkan name
        $patients = Patients::where('name', 'like', $name . '%')->get();

        # membuat kondisi
        if (count($patients)) {
            # membuat array data yang berisi pesan
            $data = [
                'message' => 'Get searched resource',
                'data' => $patients,
            ];

            # mengirimkan data (json) dan status kode 200 (The request succeeded)
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];

            # mengirimkan data (json) dan status kode 404 (resource not found)
            return response()->json($data, 404);
        }
    }

    public function positive()
    {
        # mencari patients yang memiliki status positive
        $patients = Patients::where('status', 'positive')->get();

        # membuat array data yang berisikan pesan, total, dan data orang yang positive
        $data = [
            'message' => 'Get positive resource',
            'total' => count($patients),
            'data' => $patients,
        ];

        # mengirimkan data (json) dan status kode 200 (The request succeeded)
        return response()->json($data, 200);
    }

    public function recovered()
    {
        # mencari patients yang memiliki status recovered
        $patients = Patients::where('status', 'recovered')->get();

        # membuat array data yang berisikan pesan, total dan data orang yang recovered
        $data = [
            'message' => ' Get recovered resource',
            'total' => count(($patients)),
            'data' => $patients,
        ];

        # mengirimkan data (json) dan status kode 200 (The request succeeded)
        return response()->json($data, 200);
    }

    public function dead()
    {
        # mencari patients yang memiliki status dead
        $patients = Patients::where('status', 'dead')->get();

        # membuat array data yang berisikan pesan, total dan data orang yang recovered
        $data = [
            'message' => ' Get dead resource',
            'total' => count(($patients)),
            'data' => $patients,
        ];

        # mengirimkan data (json) dan status kode 200 (The request succeeded)
        return response()->json($data, 200);
    }
}
