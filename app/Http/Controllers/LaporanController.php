<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function cetakPdf()
    {
        $data = [ /* ambil data laporan dari database */ ];
        
        $pdf = Pdf::loadView('laporan.template', compact('data'));
        return $pdf->stream('laporan.pdf'); // atau ->stream() untuk langsung tampil
    }
}