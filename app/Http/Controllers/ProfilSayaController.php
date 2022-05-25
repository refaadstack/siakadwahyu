<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Mapel;
use Auth;


class ProfilSayaController extends Controller
{
    public function profilSiswa(){

        $siswa = Auth::user()->siswa;
        $id = $siswa->id;
        $siswaa = DB::table('siswas as s')
        ->join('mapel_siswa as mp','s.id','=','mp.siswa_id')
        ->join('mapels as m','mp.mapel_id','=','m.id')
        ->join('semesters as sm','m.semester_id','=','sm.id')
        ->select('s.*',
                'mp.id as mp_id',
                'm.nama_mapel as nama_mapel',
                'sm.nama_semester as semester',
                'sm.tahun_ajaran as tahun_ajaran',
                'mp.nilai as nilai')
        ->where('s.id',$id)
        ->orderBy('semester','asc')
        ->paginate(3);


        $kelas = DB::table('kelas_siswa as ks')
        ->join('siswas as s','ks.siswa_id','=','s.id')
        ->join('kelas as k','ks.kelas_id','=','k.id')  
        ->join('gurus as g','k.guru_id','=','g.id')      
        ->select('k.nama_kelas as nama_kelas',
                'g.nama as nama_guru')
        ->where('s.id',$id)->get();

        $matapelajaran = Mapel::all()->where('status','Aktif');
        // dd($kelas);
        return view('siswa.show',compact('siswa','kelas','matapelajaran','siswaa'));
    }
    public function profilGuru(){
        $guru = Auth::user()->guru;
        // dd($kelas);
        return view('guru.show',compact('guru'));
    }
}
