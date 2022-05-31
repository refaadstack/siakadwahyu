@extends('backend.master.master')
@section('title', 'Kelas')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Kelas</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
                <div class="breadcrumb-item"><a href="#">Edit</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Edit</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('kelas.update',$kelas->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="Nama" value="{{ $kelas->nama_kelas }}">
                            @error('nama_kelas')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guru_id">Pilih Guru</label>
                            <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                                <option value="">Pilih Guru</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}" {{ $guru->id == $kelas->guru_id ? 'selected' : '' }}>{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                            @error('guru_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="semester_id">Pilih Semester</label>
                            <select name="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                                <option value="">Pilih Semester</option>
                                @foreach ($semester as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $kelas->semester_id ? 'selected' : '' }}>{{ $item->nama_semester }}</option>
                                @endforeach
                            </select>
                            @error('semester_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="aktif" {{ $kelas->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak aktif" {{ $kelas->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('status')
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