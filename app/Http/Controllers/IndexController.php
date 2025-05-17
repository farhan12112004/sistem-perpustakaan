<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalAnggota = Anggota::count();
        $totalTransaksi = Transaksi::count();

        return view('index', compact('totalBuku', 'totalAnggota', 'totalTransaksi'));
    }
}