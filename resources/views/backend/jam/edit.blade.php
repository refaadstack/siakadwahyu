@extends('backend.master.master')
@section('title', 'Jam')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Jam</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Jam</a></div>
                <div class="breadcrumb-item"><a href="#">Edit</a></div>
            </div>
        </div>
        @include('backend.master.info')
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Edit</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('jam.update',$jam->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="jam_mulai">Jam mulai</label>
                            <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" placeholder="Nama" value="{{ $jam->jam_mulai }}">
                            @error('jam_mulai')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jam_selesai">Jam selesai</label>
                            <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" placeholder="Jam Selesai" value="{{ $jam->jam_selesai }}">
                            @error('jam_selesai')
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