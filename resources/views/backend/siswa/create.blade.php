@extends('backend.master.master')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Siswa</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Siswa</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5>Data Siswa</h5>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" placeholder="NIS">
                                    @error('nis')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="number" name="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN">
                                    @error('nisn')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option selected disabled>Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir">
                                    @error('tempat_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir">
                                    @error('tanggal_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control @error('agama') is-invalid @enderror ">Pilih Agama
                                <option class="form-control" selected disabled>Pilih Agama</option>
                                <option class="form-control" value="Islam">Islam</option>
                                <option class="form-control" value="Kristen">Kristen</option>
                                <option class="form-control" value="Katolik">Katolik</option>
                                <option class="form-control" value="Hindu">Hindu</option>
                                <option class="form-control" value="Budha">Budha</option>
                                <option class="form-control" value="Konghucu">Konghucu</option>
                            </select>

                            @error('agama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" col="150" placeholder="Alamat"></textarea>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telepon_siswa">No Telp</label>
                                    <input type="number" name="no_telepon_siswa" class="form-control @error('no_telepon_siswa') is-invalid @enderror" placeholder="No Telp">
                                    @error('no_telepon_siswa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sekolah">Sekolah Asal</label>
                                    <input type="text" name="sekolah" class="form-control @error('sekolah') is-invalid @enderror" placeholder="Sekolah Asal">
                                    @error('sekolah')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="foto_siswa">Foto</label>
                            <input type="file" name="foto_siswa" class="form-control @error('foto_siswa') is-invalid @enderror" placeholder="Foto">
                            @error('foto_siswa')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option selected disabled>Pilih Status Siswa</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Lulus">Lulus</option>
                                        <option value="Drop-out">Drop-out</option>
                                    </select>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jurusan_id">Jurusan</label>
                                    <select name="jurusan_id" class="form-control">
                                        <option value="" selected disabled>Pilih Jurusan</option>
                                        @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}" class="form-control">{{ $item->nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                    @error('jurusan_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h5>DATA ORANG TUA</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" placeholder="Nama Ayah">
                                    @error('nama_ayah')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" placeholder="Nama Ibu">
                                    @error('nama_ibu')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <input type="text" name="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" placeholder="Pekerjaan Ayah">
                                    @error('pekerjaan_ayah')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <input type="text" name="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" placeholder="Pekerjaan Ibu">
                                    @error('pekerjaan_ibu')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_ortu">Alamat Orang Tua</label>
                                    <textarea name="alamat_ortu" class="form-control @error('alamat_ortu') is-invalid @enderror" col="150" placeholder="Alamat Orang Tua"></textarea>
                                    @error('alamat_ortu')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telepon_ortu">No Telp Orang Tua</label>
                                    <input type="number" name="no_telepon_ortu" class="form-control @error('no_telepon_ortu') is-invalid @enderror" placeholder="No Telp Orang Tua">
                                    @error('no_telepon_ortu')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h5>Data Wali</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_wali">Nama Wali</label>
                                    <input type="text" name="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" placeholder="Nama Wali">
                                    @error('nama_wali')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                    <input type="text" name="pekerjaan_wali" class="form-control @error('pekerjaan_wali') is-invalid @enderror" placeholder="Pekerjaan Wali">
                                    @error('pekerjaan_wali')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_wali">Alamat Wali</label>
                                    <textarea name="alamat_wali" class="form-control @error('alamat_wali') is-invalid @enderror" col="150" placeholder="Alamat Wali"></textarea>
                                    @error('alamat_wali')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telepon_wali">No Telp Wali</label>
                                    <input type="number" name="no_telepon_wali" class="form-control @error('no_telepon_wali') is-invalid @enderror" placeholder="No Telp Wali">
                                    @error('no_telepon_wali')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection