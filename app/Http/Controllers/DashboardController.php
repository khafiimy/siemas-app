<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();

        return view('dashboard.index', compact('pengaduan'));
    }
}
