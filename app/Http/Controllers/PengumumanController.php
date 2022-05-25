<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Pengumuman;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function json(){
        // dd($pengumuman);
        return DataTables::of(pengumuman::all())
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('pengumuman.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->judul.'" >Delete</a>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        return view('backend.pengumuman.index');
    }
    public function create()
    {
        return view('backend.pengumuman.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:pengumumen',
            'isi' => 'required',
        ]);
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request->judul;
        $pengumuman->slug = str::slug($request->judul);
        $pengumuman->isi = $request->isi;
        $pengumuman->save();
        return redirect()->route('pengumuman.index')->with('success','Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('backend.pengumuman.edit',compact('pengumuman'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|unique:pengumumen,judul,'.$id,
            'isi' => 'required',
        ]);
        $pengumuman = Pengumuman::find($id);
        $pengumuman->judul = $request->judul;
        $pengumuman->slug = str::slug($request->judul);
        $pengumuman->isi = $request->isi;
        $pengumuman->update();
        return redirect()->route('pengumuman.index')->with('success','Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')->with('success','Data Berhasil Dihapus');
    }
    public function show($slug){
        $pengumuman = Pengumuman::where('slug',$slug)->first();
        return view('backend.pengumuman.show',compact('pengumuman'));
    }

}
