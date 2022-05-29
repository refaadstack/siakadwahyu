@extends('backend.master.master')
@section('title', 'Guru')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Guru Mata Pelajaran</h5>
            @if (session('info'))
                <div class="alert alert-success mt-2">
                    {{ session('info') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                </div>
            @endif
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Guru</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah Mapel</a></div>
            </div>
        </div>
            
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah siswa</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('guru.store-mapel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="guru">Guru</label>
                            <select name="guru" id="guru" class="form-control select2-example">
                                <option value="">Pilih Guru</option>
                                @foreach ($guru as $m)
                                <option value="{{ $m->id }}">{{ $m->nik }} - {{ $m->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mapel">Mata Pelajaran yang diampu</label>
                            <select name="mapel" id="mapel" class="form-control select2-example">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        
        $('.select2-example').select2();
    });
</script>
@endpush
@endsection