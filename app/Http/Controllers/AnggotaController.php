<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AnggotaController extends Controller
{
    // Menampilkan semua anggota
    public function index(Request $request)
{
    $search = $request->search;

    $anggotas = Anggota::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%");
    })->get();

    return view('daftaranggota', compact('anggotas'));
}

    

    // Menampilkan form tambah anggota
    public function create()
    {
        return view('tambahanggota');
    }

    // Menyimpan data anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        Anggota::create($request->all());

        return redirect()->route('index.anggota')
                         ->with('success', 'Anggota berhasil ditambahkan.');
    }

    // Menampilkan form edit anggota
    public function edit(string $id)
    {
        $anggota = Anggota::find($id);

        return view('editanggota', compact('anggota'));
    }

    // Update data anggota
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        $anggota->update($request->all());

        return redirect()->route('index.anggota')
                         ->with('success', 'Data anggota berhasil diupdate.');
    }
    public function cetakAnggota()
    {
        $anggotas = Anggota::all(); // ambil semua data anggota
        $pdf = Pdf::loadView('cetakanggota', compact('anggotas')); // 'laporan.anggota' itu path view blade yang tadi
        return $pdf->stream('laporan-anggota.pdf'); // atau ->stream() kalau mau tampil di browser
    }

    // Hapus anggota
    public function destroy(Anggota $anggota)
{
    $anggota->delete();
    
    return redirect()->back()->with('success', 'Data anggota berhasil dihapus');
}
}