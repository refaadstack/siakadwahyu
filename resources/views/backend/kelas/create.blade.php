@extends('backend.master.master')
@section('title', 'Create Kelas')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Kelas</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="Nama">
                            @error('nama_kelas')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guru_id">Guru</label>
                            <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror ">Pilih Agama
                                <option class="form-control" selected disabled>Pilih Guru</option>
                                @foreach ($guru as $item)
                                <option class="form-control" value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>

                            @error('guru_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="semester_id">Semester</label>
                            <select name="semester_id" class="form-control @error('semester_id') is-invalid @enderror ">Pilih Semester
                                <option class="form-control" selected disabled>Pilih Jurusan</option>
                                @foreach ($semester as $item)
                                <option class="form-control" value="{{ $item->id }}">{{ $item->nama_semester }}</option>
                                @endforeach
                            </select>

                            @error('semester_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror ">
                                <option class="form-control" selected disabled>Pilih Status</option>
                                <option class="form-control" value="aktif">Aktif</option>
                                <option class="form-control" value="tidak aktif">Tidak Aktif</option>
                        </div>
                        
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection