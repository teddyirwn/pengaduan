<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index(Request $request)

    {
        $keyword = $request->keyword;
        $users = User::where('role','masyarakat' )
            ->where('name', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.masyarakat.index', compact('users','keyword'));
    }
}
