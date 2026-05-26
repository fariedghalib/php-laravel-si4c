<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::with('fakultas')->get();
        return view('prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all(); // untuk list dropdown fakultas
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $input = $request->validate([
            'nama_prodi' => 'required|unique:prodis',
            'singkatan' => 'required|max:2',
            'kaprodi' => 'required',
            'fakultas_id' => 'required'
        ]);

        // simpan data ke tabel prodi
        Prodi::create($input);

        // redirect ke halaman index prodi
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prodi)
    {
        $prodi = Prodi::find($prodi, 'id');
        // dd($prodi);
        $prodi->delete(); // delete from prodi where id = $prodi
        return redirect()->route('prodi.index')->with('success', 'Data program studi berhasil dihapus'); // redirect ke halaman index prodi
    }
}