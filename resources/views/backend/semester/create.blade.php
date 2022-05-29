@extends('backend.master.master')
@section('title', 'Semester')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Semester</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Semester</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('semester.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_semester">Semester</label>
                            <input type="number" name="nama_semester" class="form-control @error('nama_semester') is-invalid @enderror" placeholder="Nama Semester">
                            @error('nama_semester')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guru_id">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" placeholder="Tahun Ajaran">
                            @error('tahun_ajaran')
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