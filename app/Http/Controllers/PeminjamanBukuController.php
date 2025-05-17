<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanBukuController extends Controller
{
    public function index(Request $request)
    {
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // Ambil tahun dari request atau default tahun sekarang
        $tahun = $request->input('tahun', date('Y'));

        // Ambil semua data bulan dan count berdasarkan tahun
        $peminjaman = DB::table('transaksis')
            ->select(DB::raw('MONTH(tglpinjam) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('tglpinjam', $tahun)
            ->groupBy(DB::raw('MONTH(tglpinjam)'))
            ->orderBy(DB::raw('MONTH(tglpinjam)'))
            ->get();

        // Inisialisasi semua bulan 1-12 dengan 0
        $peminjamanData = array_fill(1, 12, 0);

        // Masukkan data ke array sesuai bulan
        foreach ($peminjaman as $item) {
            if (isset($peminjamanData[$item->month])) {
                $peminjamanData[$item->month] = $item->count;
            }
        }

        // Reset array supaya cocok ke Chart.js (mulai index dari 0)
        $peminjamanData = array_values($peminjamanData);

        // Data kartu dashboard
        $totalBuku = DB::table('bukus')->count();
        $totalAnggota = DB::table('anggotas')->count();
        $totalTransaksi = DB::table('transaksis')->count();

        // Ambil list tahun unik dari tabel transaksis untuk dropdown filter
        $availableYears = DB::table('transaksis')
            ->select(DB::raw('YEAR(tglpinjam) as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('index', compact('months', 'peminjamanData', 'totalBuku', 'totalAnggota', 'totalTransaksi', 'tahun', 'availableYears'));
    }
}