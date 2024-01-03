<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('pengaduans.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'isi_pengaduan' => 'required',
            'alamat' => 'required',
            'foto' => 'required','jpeg|jpg|png',
        ]);

        $data = new Pengaduan();
        $data->tgl_pengaduans = Carbon::now()->format('Y-m-d');
        $data->isi_pengaduans = $request->isi_pengaduan;
        $data->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $file = $request->File('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image', $fileName);
            $data->foto = $fileName;
        }
        $data->id_user = Auth::user()->id;
        $data->save();
        return redirect()
            ->route('pengaduan')
            ->with('message', 'Laporan berhasil di Kirim');
    }

    public function showData()
    {
        $loggedInUser = Auth::user();

        $datas = Pengaduan::with('user')->where('id_user',$loggedInUser->id)->get();
        return view('pengaduans.history', compact('datas'));
    }
    public function showDetail($id)
    {
        $data = Pengaduan::findOrFail($id);
        $dataTanggapan = Tanggapan::with('user')->where('id_pengaduan',$data->id)->latest()->first();
        return view('pengaduans.detail', compact('data','dataTanggapan'));
    }
}
