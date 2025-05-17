<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
  public function index(Request $request)
{
    $query = Transaksi::query();

    if ($request->filled('search')) {
        $query->whereHas('anggota', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    $transaksis = $query->latest()->get();

    return view('daftartransaksi', compact('transaksis'));
}


    // Menampilkan form tambah transaksi
    public function create()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('tambahtranksaksi', compact('anggotas', 'bukus')); // perbaikan nama view
    }

    // Menyimpan data transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'tglpinjam' => 'required|date',     // field konsisten snake_case
            'tglkembali' => 'nullable|date|after_or_equal:tglpinjam',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('index.transaksi')
                         ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan form edit transaksi
    public function edit(Transaksi $transaksi)
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('edittransaksi', compact('transaksi', 'anggotas', 'bukus'));
    }

    // Update data transaksi
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'tglpinjam' => 'required|date',    // konsisten snake_case
            'tglkembali' => 'nullable|date|after_or_equal:tgl_pinjam',
            'status' => 'required',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('index.transaksi')
                         ->with('success', 'Data transaksi berhasil diupdate.');
    }
    public function cetakTransaksi()
    {
        $transaksis = Transaksi::with('anggota', 'buku')->get(); // pastikan eager load relasi anggota & buku
        $pdf = Pdf::loadView('cetaktransaksi', compact('transaksis'));
        return $pdf->stream('laporan-transaksi.pdf');
    }
    // Hapus transaksi
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->back()->with('success', 'Data transaksi berhasil dihapus.');
    }
}