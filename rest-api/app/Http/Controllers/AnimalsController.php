<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public $data = ["Kucing", "Ayam", "Ikan"];
    public function index()
    {
        echo "Menampilkan data animals \n";
        foreach ($this->data as $animals) {
            echo "- $animals\n";
        }
    }

    public function store(Request $request)
    {
        echo "Menambahkan data animals - \n";
        echo "Nama hewan: $request->nama\n";
        array_push($this->data, $request->nama);
        foreach ($this->data as $animals) {
            echo "- $animals\n";
        }
    }

    public function update(Request $request, $id)
    {
        echo "Mengubah data animal id $id - \n";
        echo "Nama hewan: $request->nama\n";
        $this->data[$id] = $request->nama;
        foreach ($this->data as $animals) {
            echo "- $animals\n";
        }
    }

    public function destroy($id)
    {
        echo "Menghapus data animal id $id\n";
        unset($this->data[$id]);
        foreach ($this->data as $animals) {
            echo "- $animals\n";
        }
    }
}
