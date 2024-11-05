<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    function tampil() {
        $mahasiswa = Mahasiswa::get();
        
        return view('mahasiswa.tampil', compact('mahasiswa'));
    }

    function tambah() {
        return view('mahasiswa.tambah');
    }

    function submit(Request $request) {
        $request->validate([
            'nim' => 'required|numeric|digits_between:1,12',
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);
    
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
    
        // Menyimpan foto jika ada
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $mahasiswa->photo = $path; // Simpan path foto di database
        }
    
        $mahasiswa->save(); // Pastikan ini dipanggil untuk menyimpan data
        return redirect()->route('mahasiswa.tampil');
    }
    
    

    function edit($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'nim' => 'required|numeric|digits_between:1,12',
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
    
        // Menyimpan foto baru jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->photo) {
                Storage::disk('public')->delete($mahasiswa->photo);
            }
            
            $path = $request->file('photo')->store('photos', 'public');
            $mahasiswa->photo = $path; // Simpan path foto di database
        }
    
        $mahasiswa->save();
        return redirect()->route('mahasiswa.tampil');
    }
    
    

    function delete($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($mahasiswa->photo) {
            Storage::disk('public')->delete($mahasiswa->photo);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.tampil');
    }

    // Functin DASHBOARD CUK
    public function jumlah()
    {
        $totalMahasiswa = Mahasiswa::count();

        return view('dashboard', compact('totalMahasiswa'));
    }
}
