@extends('backend.master.master')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5></h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#"></a></div>
                <div class="breadcrumb-item"><a href="#">Edit</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Edit</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('mapel.update',$mapel->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="kode_mapel">Kode Mapel</label>
                            <input type="text" name="kode_mapel" class="form-control @error('kode_mapel') is-invalid @enderror" placeholder="Kode Mapel" value="{{ $mapel->kode_mapel }}">
                            @error('kode_mapel')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_mapel">Nama </label>
                            <input type="text" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Nama" value="{{ $mapel->nama_mapel }}">
                            @error('nama_mapel')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="semester_id">Semester</label>
                            <select name="semester_id" id="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Semester</option>
                                @foreach ($semester as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $mapel->semester_id ? 'selected' : '' }}>{{ $item->nama_semester }}</option>
                                @endforeach
                            </select>   
                            @error('semester_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="Aktif" {{ $mapel->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ $mapel->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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