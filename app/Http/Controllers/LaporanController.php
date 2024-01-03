<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }
    public function getLaporan(Request $request)
    {
        $tanggalAwal = $request->tanggal_awal . ' ' . '00:00:00';
        $tanggalAkhir = $request->tanggal_akhir . ' ' . '23:59:59';
        $status = $request->status;

        $laporan = Pengaduan::whereBetween('tgl_pengaduans', [$tanggalAwal, $tanggalAkhir])
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->get();
        return view('admin.laporan.index', compact('laporan', 'tanggalAwal', 'tanggalAkhir', 'status'));
    }

    public function cetak($tglMulai, $tglAkhir)
    {
        $laporan = Pengaduan::whereBetween('tgl_pengaduans', [$tglMulai, $tglAkhir])->get();
        $pdf = Pdf::loadView('admin.laporan.cetak', compact('laporan'));
        return $pdf->download('laporan-pengaduan.pdf');
    }

}
