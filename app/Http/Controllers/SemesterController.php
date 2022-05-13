<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

use DataTables;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json(){
        // dd($semester);
        return DataTables::of(Semester::all())
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('semester.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama_semester.'" >Delete</a>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function index()
    {
        return view('backend.semester.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.semester.create');
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
            'nama_semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        Semester::create($request->all());

        session()->flash("success","Success Message");
        return redirect()->route('semester.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semester = Semester::find($id);
        return view('backend.semester.edit',compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        Semester::find($id)->update($request->all());

        session()->flash("success","Success Message");
        return redirect()->route('semester.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        
        return back()->with('success','Data berhasil dihapus');
    }
}
