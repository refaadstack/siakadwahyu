<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use DataTables;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json(){
        return Datatables::of(Guru::all())
        ->addIndexColumn()
        ->addColumn('action',function($item){
            return '
            <a href="'. route('guru.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
            <a href="'. route('guru.show',$item->id) .'" class="btn btn-sm btn-success">Show</a>
            <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama.'" >Delete</a>
            ';
        })
        ->editColumn('foto_guru',function($item){
            return '<img style="max-width: 80px" src="'. Storage::url($item->foto_guru) .'"/>';
        })
        ->rawColumns(['foto_guru','action'])
        ->make(true);
    }
    public function index()
    {
        return view('backend.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.guru.create');
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
            'nama' => 'required',
            'nip' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenjang' => 'required',
            'jurusan' => 'required',
            'no_telepon' => 'required',
            'foto_guru' => 'required|Mimes:jpeg,png,jpg,gif,svg|Max:2048',
        ]);


        $user = new User;
        $user->role = 'guru';
        $user->name = $request->nama;
        $user->username = $request->nik;
        $user->status = 'Aktif';
        $user->password = bcrypt('12345678');
        $user->remember_token = str::random(60);
        $user->save();
        
        $filename = md5($request->foto_guru->getClientOriginalName() . time()) . '.' . $request->foto_guru->getClientOriginalExtension();

        $path = $request->foto_guru->storeAs('public/foto_guru', $filename);

        // $request->request->add(['user_id' => $user->id]);
        $guru = new Guru;
        $guru->user_id = $user->id;
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->nik = $request->nik;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->agama = $request->agama;
        $guru->alamat = $request->alamat;
        $guru->jenjang = $request->jenjang;
        $guru->jurusan = $request->jurusan;
        $guru->no_telepon = $request->no_telepon;
        $guru->foto_guru = $path;
        $guru->save();

        return redirect()->route('guru.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('backend.guru.show',compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('backend.guru.edit',compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenjang' => 'required',
            'jurusan' => 'required',
            'no_telepon' => 'required',
            'foto_guru' => 'Mimes:jpeg,png,jpg,gif,svg|Max:2048',
        ]);

        $guru = Guru::find($request->id);
        $user = User::find($guru->user_id);
        $user->name = $request->nama;
        $user->username = $request->nik;
        $user->save();
        
        if($request->hasFile('foto_guru')){
            $oldFilename = $guru->foto_guru;
            \Storage::delete($oldFilename);

            $filename = md5($request->foto_guru->getClientOriginalName() . time()) . '.' . $request->foto_guru->getClientOriginalExtension();
            $path = $request->foto_guru->storeAs('public/foto_guru', $filename);

            $guru->foto_guru = $path;
        }

        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->nik = $request->nik;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->agama = $request->agama;
        $guru->alamat = $request->alamat;
        $guru->jenjang = $request->jenjang;
        $guru->jurusan = $request->jurusan;
        $guru->no_telepon = $request->no_telepon;
        
        $guru->save();

        return redirect()->route('guru.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        Storage::delete([$guru->foto_guru]);
        $guru->user()->delete();
        $guru->delete();

        return back()->with('success','Data berhasil dihapus');
        // if($guru){
        //     return response()->json([
        //         'status' => 'success'
        //     ]);
        // }else{
        //     return response()->json([
        //         'status' => 'error'
        //     ]);
        // }
    }
    public function tambahMapel(){
        $guru = Guru::all();
        $mapel = Mapel::all();
        return view('backend.guru.tambahMapel',compact('guru','mapel'));
    }

    public function storeMapel(Request $request)
    {
        $guru = Guru::find($request->guru);

        if($guru->mapel()->where('mapel_id',$request->mapel)->exists()){
            return back()->with('error','Data sudah ada');
        }else{
            $guru->mapel()->attach($request->mapel);
            return back()->with('info','Data berhasil ditambahkan');
        }
    }
}
