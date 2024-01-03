<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahPengaduan = Pengaduan::count();
        $jumlahBelumDiproses = Pengaduan::where('status', 'pending')->count();
        $jumlahDiproses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        return view(
            'admin.index',
            compact(
                'jumlahPengaduan',
                'jumlahBelumDiproses',
                'jumlahDiproses',
                'selesai'
            )
        );
    }
}
