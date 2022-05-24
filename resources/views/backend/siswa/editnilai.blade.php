@extends('backend.master.master')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
           <h3>Edit Nilai</h3> 
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/siswa/{{ $siswa->mp_id }}/{{ $siswa->id }}/updatenilai" method="POST">
                @csrf
                <div class="form-group" hidden>
                    <label name="mapel_id" for="">mapel</label>
                    <input type="text" name="mapel_id" class="form-control" value="{{ $siswa->mp_id }}" readonly>
                </div>
                <div class="form-group">
                    <label name="nilai" for="nama_mapel"><h6>Nama Mapel: {{ $siswa->nama_mapel }}</h6></label>
                    <input type="text" value="{{ $siswa->nilai }}" class="form-control" name="nilai">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection