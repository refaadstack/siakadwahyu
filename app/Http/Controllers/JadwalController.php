<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\Guru;
use App\Models\Jam;
use DataTables;
use DB;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function json(){
        $jadwal = DB::table('jadwals')
        ->join('gurus', 'gurus.id', '=', 'jadwals.guru_id')
        ->join('mapels', 'mapels.id', '=', 'jadwals.mapel_id')
        ->join('semesters', 'semesters.id', '=', 'jadwals.semester_id')
        ->join('kelas', 'kelas.id', '=', 'jadwals.kelas_id')
        ->join('jam', 'jam.id', '=', 'jadwals.jam_id')
        ->select('jadwals.id','jadwals.hari', 'jadwals.guru_id', 'jadwals.mapel_id', 'jadwals.semester_id', 'jadwals.kelas_id', 'jadwals.jam_id', 'gurus.nama as nama_guru', 'mapels.nama_mapel as nama_mapel', 'semesters.nama_semester as nama_semester', 'kelas.nama_kelas as nama_kelas', 'jam.jam_mulai','jadwals.status')
        ->orderBy('kelas.nama_kelas', 'asc')
        ->get();
        // dd($jadwal);
        return DataTables::of($jadwal)
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('jadwal.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama_kelas.'" >Delete</a>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        return view('backend.jadwal.index');
    }
    public function create()
    {
        $kelas = Kelas::where('status','aktif')->get();
        $jam = Jam::all();
        $guru = Guru::all();
        $mapel = Mapel::where('status','aktif')->get();
        $semester = Semester::where('status','aktif')->get();
        return view('backend.jadwal.create', compact('kelas','jam','guru','mapel','semester'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'kelas_id' => 'required',
            'jam_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'guru_id' => 'required',
            'status' => 'required',
        ]);
        $jadwal = new Jadwal;

        $cekjadwal = Jadwal::where('hari',$request->hari)
                    ->where('jam_id',$request->jam_id)
                    ->where('kelas_id',$request->kelas_id)
                    ->where('mapel_id',$request->mapel_id)
                    ->where('semester_id',$request->semester_id)
                    ->where('guru_id',$request->guru_id)
                    ->count();
        $cekGuru = Jadwal::where('guru_id',$request->guru_id)
                    ->where('hari',$request->hari)
                    ->where('jam_id',$request->jam_id)
                    ->where('kelas_id',$request->kelas_id)
                    ->count();
        $cekKelas = Jadwal::where('kelas_id',$request->kelas_id)
                    ->where('mapel_id',$request->mapel_id)
                    ->where('jam_id',$request->jam_id)
                    ->where('hari',$request->hari)
                    ->where('semester_id',$request->semester_id)
                    ->count();

        if($cekjadwal>0){
            return redirect()->back()->with('error','Jadwal sudah ada');
        }   //kondisi guru sudah mengajar dikelas lain
        else if( $cekGuru>0){
            return redirect()->back()->with('error','Guru sudah ada jadwal di Jam atau Kelas lain');
        }
        else if($cekKelas>0){
            return redirect()->back()->with('error','Mapel sudah ada di hari ini');
        }

        $jadwal->hari = $request->hari;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->jam_id = $request->jam_id;
        $jadwal->mapel_id = $request->mapel_id;
        $jadwal->semester_id = $request->semester_id;
        $jadwal->guru_id = $request->guru_id;
        $jadwal->status = $request->status;
        $jadwal->save();
        return redirect()->route('jadwal.index')->with('success','Data berhasil ditambahkan');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::where('status','aktif')->get();
        $jam = Jam::all();
        $guru = Guru::all();
        $mapel = Mapel::where('status','aktif')->get();
        $semester = Semester::where('status','aktif')->get();
        return view('backend.jadwal.edit', compact('jadwal','kelas','jam','guru','mapel','semester'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'kelas_id' => 'required',
            'jam_id' => 'required',
            'mapel_id' => 'required',
            'semester_id' => 'required',
            'guru_id' => 'required',
            'status' => 'required',
        ]);
        $jadwal = Jadwal::findOrFail($id);
        $cekjadwal = Jadwal::where('hari',$request->hari)
                    ->where('jam_id',$request->jam_id)
                    ->where('kelas_id',$request->kelas_id)
                    ->where('mapel_id',$request->mapel_id)
                    ->where('semester_id',$request->semester_id)
                    ->where('guru_id',$request->guru_id)
                    ->where('status',$request->status)
                    ->count();
        $cekGuru = Jadwal::where('guru_id',$request->guru_id)
                    ->where('jam_id',$request->jam_id)
                    ->where('hari',$request->hari)
                    ->where('mapel_id',$request->mapel_id)
                    ->where('semester_id',$request->semester_id)

                    ->count();
        $cekKelas = Jadwal::where('kelas_id',$request->kelas_id)
                    ->where('mapel_id',$request->mapel_id)
                    ->where('jam_id',$request->jam_id)
                    ->where('hari',$request->hari)
                    ->where('semester_id',$request->semester_id)
                    ->count();

        // if($cekjadwal>0){
        //     return redirect()->back()->with('error','Jadwal sudah ada');
        // }   //kondisi guru sudah mengajar dikelas lain
        // else if( $cekGuru>0){
        //     return redirect()->back()->with('error','Guru sudah ada jadwal di Jam atau Kelas lain');
        // }
        // else if($cekKelas>0){
        //     return redirect()->back()->with('error','Mapel sudah ada di hari ini');
        // }

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success','Data berhasil diubah');
    }
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success','Data berhasil dihapus');
    }
}
