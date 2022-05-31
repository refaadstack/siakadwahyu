<?php

namespace App\Http\Controllers;
use App\Models\Jam;
use DataTables;

use Illuminate\Http\Request;

class JamController extends Controller
{
    public function json(){
        $jam = Jam::all();
        return DataTables::of($jam)
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('jam.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->jam_mulai.'" >Delete</a>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);

    }
    public function index()
    {
        return view('backend.jam.index');
    }
    public function create()
    {
        return view('backend.jam.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $jam = new Jam;
        $jam->jam_mulai = $request->jam_mulai;
        $jam->jam_selesai = $request->jam_selesai;
        $jam->save();
        return redirect()->route('jam.index')->with('success','Data Berhasil Ditambahkan');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $jam = Jam::find($id);
        return view('backend.jam.edit',compact('jam'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $jam = Jam::find($id);
        $jam->jam_mulai = $request->jam_mulai;
        $jam->jam_selesai = $request->jam_selesai;
        $jam->save();
        return redirect()->route('jam.index')->with('success','Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        $jam = Jam::find($id);
        $jam->delete();
        return redirect()->route('jam.index')->with('success','Data Berhasil Dihapus');
    }
}
