<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $roles = ['petugas', 'admin'];
        $users = User::whereIn('role', $roles)->get();

        return view('admin.petugas.index', compact('users'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->nik = $request->nik;
        $user->tlp = $request->tlp;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()
            ->route('petugas')
            ->with('message', 'Berhasil menambahkan user');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $roles = ['petugas', 'admin'];
        $users = User::whereIn('role', $roles)
            ->where('name', 'like', '%' . $keyword . '%')
            ->get();
        return view('admin.petugas.index', compact('users', 'keyword'));
    }

    public function edit($id)
    {
        $datas= User::findOrFail($id);
        return view('admin.petugas.edit',compact('datas'));
    }

    public function update(Request $request ,$id ){
        $datas= User::findOrFail($id);
        $datas->name = $request->name;
        $datas->nik = $request->nik;
        $datas->tlp = $request->tlp;
        $datas->role = $request->role;
        $datas->email = $request->email;
        $datas->save();
        return redirect()
            ->route('petugas')
            ->with('message', 'Berhasil Mengupdate data User');
    }
      public function destroy($id)
    {
        $datas= User::findOrFail($id);
        $datas->delete();
        return redirect()
        ->route('petugas')
        ->with('message', 'Berhasil Menghapus data User');
    }
}
