<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Semester;
use App\Models\Kelas;
use DB;
use Auth;
use PDF;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function cetakRapor(Request $request, $id){
            $siswa = Siswa::find($id);
            $rapor = DB::table('mapel_siswa as mp')
                    ->join('mapels as m', 'mp.mapel_id', '=', 'm.id')
                    ->join('semesters as se', 'm.semester_id', '=', 'se.id')
                    ->join('siswas as s', 'mp.siswa_id', '=', 's.id')
                    ->join('kelas_siswa as ks', 's.id', '=', 'ks.siswa_id')
                    ->join('kelas as k', 'ks.kelas_id', '=', 'k.id')
                    ->select('s.*',
                            'm.nama_mapel',
                            'm.kode_mapel',
                            'mp.nilai',
                            'k.nama_kelas',
                            'se.nama_semester',
                            'se.tahun_ajaran'
                            )
                    ->where('s.id', $id)
                    ->where('se.id', $request->semester)
                    ->get();
            $kelas = DB::table('kelas as k')
                    ->join('kelas_siswa as ks', 'k.id', '=', 'ks.kelas_id')
                    ->join('siswas as s', 'ks.siswa_id', '=', 's.id')
                    ->join('gurus as g', 'k.guru_id', '=', 'g.id')
                    ->select('k.*', 'g.nama')
                    ->where('s.id', $id)
                    ->first();
                // dd($kelas);
            $tahun_ajaran = Semester::find($request->semester)->tahun_ajaran;
            $pdf = PDF::loadView('backend.rapor.cetak', compact('siswa', 'rapor','tahun_ajaran','kelas'));
            return $pdf->stream();
    }
}
