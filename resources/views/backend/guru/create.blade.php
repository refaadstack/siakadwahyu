@extends('backend.master.master')
@section('title', 'Create Guru')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Guru</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Guru</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP">
                            @error('nip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK">
                            @error('nik')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir">
                            @error('tempat_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir">
                            @error('tanggal_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                        <div class="form-group">
                            <label for="no_telepon">No Telp</label>
                            <input type="number" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" placeholder="No Telp">
                            @error('no_telepon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="foto_guru">Foto</label>
                            <input type="file" name="foto_guru" class="form-control @error('foto_guru') is-invalid @enderror" placeholder="Foto">
                            @error('foto_guru')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenjang">Jenjang</label>
                            <select name="jenjang" class="form-control @error('jenjang') is-invalid @enderror">
                                <option selected disabled>pilih jenjang pendidikan </option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                            @error('jenjang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Jurusan">
                            @error('jurusan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection