<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $status = $request->status;
        if ($status) {
            $datas = Pengaduan::where('status', $status)
                ->where('isi_pengaduans', 'like', '%' . $keyword . '%')
                ->get();
        } else {
            $datas = Pengaduan::where('isi_pengaduans', 'like', '%' . $keyword . '%')->get();
        }

        return view('admin.tanggapan.index', compact('datas', 'keyword', 'status'));
    }
    public function show($id)
    {
        $data = Pengaduan::with([
            'tanggapan' => function ($query) {
                $query->latest()->first();
            },
        ])->findOrFail($id);
        return view('admin.tanggapan.detail', compact('data'));
    }
    public function store(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        $tanggpan = new Tanggapan();
        $tanggpan->tgl_tanggapans = Carbon::now()->toDateTimeString();
        $tanggpan->isi_tanggapans = $request->tanggapan;
        $tanggpan->id_pengaduan = $pengaduan->id;
        $tanggpan->id_user = Auth::user()->id;
        $tanggpan->save();

        return redirect()
            ->route('tanggapan.tanggpan', ['id' => $id])
            ->with('message', 'Tanggapan Berhasil Di kirim');
    }
}
