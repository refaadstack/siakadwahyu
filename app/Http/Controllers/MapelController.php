<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Semester;
use Illuminate\Http\Request;

use DataTables;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json(){
        $mapel = Mapel::with('semester')->get();
        return DataTables::of($mapel)
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('mapel.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama_mapel.'" >Delete</a>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        return view('backend.mapel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::all();
        return view('backend.mapel.create',compact('semester'));
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
            'kode_mapel' => 'required|unique:mapels',
            'nama_mapel' => 'required',
            'semester_id' => 'required',
        ]);
        Mapel::create($request->all());
        return redirect()->route('mapel.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $semester = Semester::all();
        return view('backend.mapel.edit',compact('mapel','semester'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'semester_id' => 'required',
        ]);
        Mapel::findOrFail($id)->update($request->all());
        return redirect()->route('mapel.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mapel::findOrFail($id)->delete();
        return redirect()->route('mapel.index')->with('success','Data berhasil dihapus');
    }
}
