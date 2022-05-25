<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSiswa($id)
    {
        $kelas = Kelas::find($id)->with('siswa')->first();


        return DataTables::of($kelas->siswa)
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('kelas.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'. route('kelas-siswa.show',$item->id) .'" class="btn btn-sm btn-success">Show</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama_kelas.'" >Delete</a>
            ';
        })
        ->make(true);    
    }
    public function index($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kelas = Kelas::find($id);
        $siswa = Siswa::all();
        return view('backend.kelas_siswa.create',compact('kelas','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idkelas)
    {
        // dd($request->all());
        $kelas = Kelas::find($idkelas);
        
        if($kelas->siswa()->where('siswa_id',$request->siswa_id)->exists()){
            return redirect()->back()->with('error','Siswa sudah terdaftar di kelas ini');
        }
        $kelas->siswa()->attach(['siswa_id'=>$request->siswa_id]);
        
        return redirect()->route('kelas-siswa.show',$idkelas)->with('success','Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        
        if (request()->ajax()) {
            $kelas = Kelas::find($id);
            return DataTables::of($kelas->siswa)
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('siswa.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'. route('siswa.show',$item->id) .'" class="btn btn-sm btn-success">Show</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama.'" >Delete</a>
            ';
        })
        ->make(true); 
        } 
        
        return view('backend.kelas.show',compact('kelas'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idkelas, $idsiswa)
    {
        $kelas = Kelas::find($idkelas);
        $kelas->siswa()->detach($idsiswa);
        return back()->with('success','Data Berhasil Dihapus');
    }

    public function select2($id){

        $data = Siswa::where("id",$id)->first();
        return response()->json(array(
            $data
        ));
    }
}
