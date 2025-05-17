<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan semua buku
   public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->filled('search')) {
            $query->where('judul_buku', 'like', '%' . $request->search . '%');
        }

        $bukus = $query->latest()->get();

        return view('daftarbuku', compact('bukus'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('tambahbuku');
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
        ]);

        Buku::create($request->all());

        return redirect()->route('index.buku')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    // Menampilkan form edit buku
    public function edit(Buku $buku)
    {
        return view('editbuku', compact('buku'));
    }

    // Update data buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul_buku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
        ]);

        $buku->update($request->all());

        return redirect()->route('index.buku')
                         ->with('success', 'Data buku berhasil diupdate.');
    }

    // Hapus buku
    public function destroy(Buku $buku)
    {
        $buku->delete();
        
        return redirect()->back()->with('success', 'Data buku berhasil dihapus');
    }
}