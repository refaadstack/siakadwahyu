<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use DB;
use DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json(){

        $siswa = Siswa::with('jurusan')->get();
        return Datatables::of($siswa)
        ->addIndexColumn()
        ->addColumn('action',function($item){
            $actionBtn='';
            if(Auth::user()->role == "admin"){
                $actionBtn.=
                '
                <a href="'. route('siswa.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a>
                <a href="'.'#'.'" class="btn btn-sm btn-danger delete" id="swal-6" data-id="'.$item->id.'" data-nama="'.$item->nama.'" >Delete</a>
                <a href="'. route('siswa.show',$item->id) .'" class="btn btn-sm btn-success">Show</a>
                '; 
            }
            if(Auth::user()->role == "guru"){

                $actionBtn.='
                <a href="'. route('siswa.show',$item->id) .'" class="btn btn-sm btn-success">Show</a>
                ';
            }
                return $actionBtn;
        })
        ->editColumn('foto_siswa',function($item){
            return '<img style="max-width: 80px" src="'. Storage::url($item->foto_siswa) .'"/>';
        })
        ->rawColumns(['foto_siswa','action'])
        ->make(true);
    }
    public function index()
    {
        return view('backend.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan ::all();
        return view('backend.siswa.create',compact('jurusan'));
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
            'nisn' => 'required|unique:siswas',
            'nis' => 'required|unique:siswas',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'sekolah' => 'required',
            'jurusan_id' => 'required',
            'status' => 'required',
            'no_telepon_siswa' => 'required',
            'foto_siswa' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ortu' => 'required',
            'no_telepon_ortu' => 'required',
        ]);
        // dd($request->all());
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->username = $request->nisn;
        $user->status = 'Aktif';
        $user->password = bcrypt('12345678');
        $user->remember_token = str::random(60);
        $user->save();
        
        $filename = md5($request->foto_siswa->getClientOriginalName() . time()) . '.' . $request->foto_siswa->getClientOriginalExtension();

        $path = $request->foto_siswa->storeAs('public/foto_siswa', $filename);

        
        $siswa = new Siswa;
        $siswa->user_id = $user->id;
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->sekolah = $request->sekolah;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->status = $request->status;
        $siswa->no_telepon_siswa = $request->no_telepon_siswa;
        $siswa->foto_siswa = $path;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswa->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswa->alamat_ortu = $request->alamat_ortu;
        $siswa->no_telepon_ortu = $request->no_telepon_ortu;
        $siswa->nama_wali = $request->nama_wali;
        $siswa->pekerjaan_wali = $request->pekerjaan_wali;
        $siswa->alamat_wali = $request->alamat_wali;
        $siswa->no_telepon_wali = $request->no_telepon_wali;
        $siswa->save();

        return redirect()->route('siswa.index')->with('success','Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswaa = DB::table('siswas as s')
        ->join('mapel_siswa as mp','s.id','=','mp.siswa_id')
        ->join('mapels as m','mp.mapel_id','=','m.id')
        ->join('semesters as sm','m.semester_id','=','sm.id')
        ->select('s.*',
                'mp.id as mp_id',
                'm.nama_mapel as nama_mapel',
                'sm.nama_semester as semester',
                'sm.tahun_ajaran as tahun_ajaran',
                'mp.nilai as nilai')
        ->where('s.id',$id)
        ->orderBy('semester','asc')
        ->paginate(3);
        $kelas = Siswa::find($id)->kelas;

        // dd($kelas);
        $mapel = Mapel::find($id);

        if(auth()->user()->role == 'admin'){
            $matapelajaran = Mapel::all()->where('status','Aktif');
        }
        else {
            $matapelajaran = DB::table('guru_mapel as gm')
            ->join('mapels as m','m.id','=','gm.mapel_id')
            ->join('gurus as g','g.id','=','gm.guru_id')
            ->select('m.*')
            ->where('g.user_id',auth()->user()->id)
            ->where('m.status','Aktif')
            ->get();
        }
        $siswa = Siswa::findOrFail($id);
        return view('backend.siswa.show',compact('siswa','siswaa','matapelajaran','kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $jurusan = Jurusan ::all();
        return view('backend.siswa.edit',compact('siswa','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'sekolah' => 'required',
            'jurusan_id' => 'required',
            'status' => 'required',
            'no_telepon_siswa' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ortu' => 'required',
            'no_telepon_ortu' => 'required',
        ]);

        $siswa = Siswa::findOrFail($request->id);
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->sekolah = $request->sekolah;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->status = $request->status;
        $siswa->no_telepon_siswa = $request->no_telepon_siswa;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswa->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswa->alamat_ortu = $request->alamat_ortu;
        $siswa->no_telepon_ortu = $request->no_telepon_ortu;
        $siswa->nama_wali = $request->nama_wali;
        $siswa->pekerjaan_wali = $request->pekerjaan_wali;
        $siswa->alamat_wali = $request->alamat_wali;
        $siswa->no_telepon_wali = $request->no_telepon_wali;
        $siswa->save();

        $siswa->user()->update([
            'name' => $request->nama,
            'username' => $request->nis,
        ]);
        return redirect()->route('siswa.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        Storage::delete($siswa->foto_siswa);
        $siswa->user()->delete();
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success','Data Berhasil Dihapus');
    }

    public function addnilai(Request $request, $idsiswa){
        // $request->validate([
        //     'mapel' => 'required',
        //     'nilai' => 'required|max:3',
        // ]);


        // dd($mapel,$nilai);
        $siswa=\App\Models\Siswa::find($idsiswa);

        if($siswa->mapel()->where('mapel_id',$request->mapel_id)->exists()){
            return redirect('siswa/'.$idsiswa.'/show')->withError('Data sudah ada!!');
        }
        $siswa->mapel()->attach($request->mapel_id,['nilai'=>$request->nilai]);
        return redirect('siswa/'.$idsiswa.'/show')->withInfo('Data sudah ditambah');
    }
    public function updatenilai(Request $request,$idmapel,$idsiswa){
     
        $siswa = DB::table('siswas as s')
        ->join('mapel_siswa as mp','mp.siswa_id','=','s.id')
        ->where('mp.id',$idmapel)
        ->update([
            'mp.nilai' => $request->nilai,
        ]);
     
    // dd($idmapel);

     return redirect('siswa/'.$idsiswa.'/show')->withInfo('Data sudah diubah');   
    }

    public function editnilai($id){
        $siswa = DB::table('siswas as s')
        ->join('mapel_siswa as mp','s.id','=','mp.siswa_id')
        ->join('mapels as m','mp.mapel_id','=','m.id')
        ->select('s.*',
                'm.nama_mapel as nama_mapel',
                'mp.nilai as nilai',
                'mp.id as mp_id')
        ->where('mp.id',$id)
        ->first();
        // dd($siswa->nilai);
        return view('backend.siswa.editnilai',compact('siswa'));
    }
    public function deleteNilai($idsiswa, $idmapel){
        $mapel = DB::table('mapel_siswa as mp')
        ->join('siswas as s','mp.siswa_id','=','s.id')
        ->where('mp.id',$idmapel)
        ->where('mp.siswa_id',$idsiswa)
        ->delete();

        return redirect('siswa/'.$idsiswa.'/show')->with('info','Data sudah dihapus');

    }
}
