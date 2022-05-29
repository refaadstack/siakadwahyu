@extends('backend.master.master')
@section('title', 'Create Jurusan')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Jurusan</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Jurusan</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_jurusan">Jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" placeholder="Nama Jurusan">
                            @error('nama_jurusan')
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