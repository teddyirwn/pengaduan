<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $pengaduan = Pengaduan::count();
        return view('welcome',compact('pengaduan'));
    }
}
