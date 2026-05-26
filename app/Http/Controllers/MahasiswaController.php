<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data mahasiswa beserta relasi prodi
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil data prodi untuk list dropdown
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswa,npm', //npm harus unik di tabel mahasiswa
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodi,id', //prodi_id harus ada di tabel prodi
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', //optional foto , max 2MB
        ]);
        // upload file foto jika ada
        if ($request->hasFile('foto')) {
            //rename file dengan npm untuk menghindari duplikat nama file
            $filename = $input['npm'] . '_' . $request->file('foto')->getClientOriginalName();

            $input['foto'] = $request->file('foto')->storeAs('public/foto', $filename);
        } else {
            $input['foto'] = null; //set null jika tidak ada file yang diupload
        }

        // simpan data mahasiswa`
        Mahasiswa::create($input);

        // redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}