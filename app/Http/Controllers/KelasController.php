<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Semester;
use Illuminate\Http\Request;
use DB;

use DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function json(){

        
    //     $kelas = Kelas::with('guru')->with('semester')->get();
    //     // dd($kelas);
    //     return DataTables::of($kelas)
    //     ->addIndexColumn()
    //     ->addColumn('action',function($item){
    //         return '
    //         <a href="'. route('kelas.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
    //         <a href="'. route('kelas-siswa.show',$item->id) .'" class="btn btn-sm btn-success">Show</a>
    //         <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama_kelas.'" >Delete</a>
    //         ';
    //     })
    //     ->rawColumns(['action'])
    //     ->make(true);
    
    // }

    public function filterTahun(Request $request){
        $tahun = request()->tahun;
        $semester = request()->semester;

        $kelas = DB::table('kelas')
        ->join('gurus','kelas.guru_id','=','gurus.id')
        ->join('semesters','kelas.semester_id','=','semesters.id')
        ->select('kelas.*','gurus.nama','semesters.nama_semester as semester','semesters.tahun_ajaran as tahun')
        ->where('semesters.tahun_ajaran',$tahun)
        ->get();

        return view ('backend.kelas.filter-tahun',compact('kelas'));
    }

    public function index()
    {
        $ta = Semester::all();
        return view('backend.kelas.index')->with('ta',$ta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::where('status','aktif')->get();
        $guru = Guru::all();
        return view('backend.kelas.create',compact ('guru','semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required',
        ]);

        // dd($request->all());

        Kelas::create($request->all());

        session()->flash("success","Success Message");
        return redirect()->route('kelas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semester = Semester::where('status','aktif')->get();
        $kelas = Kelas::findOrFail($id);
        $gurus = Guru::all();
        return view('backend.kelas.edit',compact('kelas','gurus','semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $kelas = Kelas::findOrFail($id);
        $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required',
        ]);

        $kelas->update($request->all());

        session()->flash("success","Success Message");
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        // $kelas->siswa()->delete();
        $kelas->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}
