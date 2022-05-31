<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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
                    ->select('s.*',
                            'm.nama_mapel',
                            'm.kode_mapel',
                            'mp.nilai',
                            'se.nama_semester',
                            )
                    ->where('s.id', $id)
                    ->where('se.id', $request->semester)
                    ->get();
            // dd($rapor);
            $pdf = PDF::loadView('backend.rapor.cetak', compact('siswa', 'rapor'));
            return $pdf->stream();
    }
}
