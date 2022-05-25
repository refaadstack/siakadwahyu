<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\models\Pengumuman;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_siswa = Siswa::count();
        $jumlah_guru = Guru::count();
        $jumlah_kelas = Kelas::count();
        $jumlah_mapel = Mapel::count();
        $pengumuman = Pengumuman::orderBy('created_at','desc')->take(6)->get();
        return view('backend.dashboard.index', compact('jumlah_siswa', 'jumlah_guru', 'jumlah_kelas', 'jumlah_mapel','pengumuman'));
    }
}
