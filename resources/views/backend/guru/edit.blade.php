@extends('backend.master.master')
@section('title', 'Guru')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Guru</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Guru</a></div>
                <div class="breadcrumb-item"><a href="#">Edit</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('guru.update',$guru->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ $guru->nama }}">
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP" value="{{ $guru->nip }}">
                            @error('nip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" value="{{ $guru->nik }}">
                            @error('nik')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option selected disabled>Jenis Kelamin</option>
                                <option value="L" @if($guru->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                <option value="P" @if($guru->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" value="{{ $guru->tempat_lahir }}" >
                            @error('tempat_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{ $guru->tanggal_lahir }}">
                            @error('tanggal_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control @error('agama') is-invalid @enderror ">Pilih Agama
                                <option class="form-control" selected disabled>Pilih Agama</option>
                                <option class="form-control" @if($guru->agama == 'Islam') selected @endif value="Islam">Islam</option>
                                <option class="form-control" @if($guru->agama == 'Kristen') selected @endif value="Kristen">Kristen</option>
                                <option class="form-control" @if($guru->agama == 'Katolik') selected @endif value="Katolik">Katolik</option>
                                <option class="form-control" @if($guru->agama == 'Hindu') selected @endif value="Hindu">Hindu</option>
                                <option class="form-control" @if($guru->agama == 'Budha') selected @endif value="Budha">Budha</option>
                                <option class="form-control" @if($guru->agama == 'Konghucu') selected @endif value="Konghucu">Konghucu</option>
                            </select>

                            @error('agama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" col="150" placeholder="Alamat">{{ $guru->alamat }}</textarea>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telp</label>
                            <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" placeholder="No Telp" value="{{ $guru->no_telepon }}">
                            @error('no_telepon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="foto_guru">Foto</label>
                            <input type="file" name="foto_guru" class="form-control @error('foto_guru') is-invalid @enderror" placeholder="Foto" value="{{ $guru->foto_guru }}">
                            @error('foto_guru')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenjang">Jenjang</label>
                            <select name="jenjang" class="form-control @error('jenjang') is-invalid @enderror">
                                <option selected disabled>pilih jenjang pendidikan </option>
                                <option value="SMA" @if($guru->jenjang == 'SMA') selected @endif>SMA</option>
                                <option value="D3" @if($guru->jenjang == 'D3') selected @endif>D3</option>
                                <option value="S1" @if($guru->jenjang == 'S1') selected @endif>S1</option>
                                <option value="S2" @if($guru->jenjang == 'S2') selected @endif>S2</option>
                                <option value="S3" @if($guru->jenjang == 'S3') selected @endif>S3</option>
                            </select>
                            @error('jenjang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Jurusan"  value="{{ $guru->jurusan }}">
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