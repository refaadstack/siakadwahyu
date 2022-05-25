@extends('backend.master.master')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Pengumuman</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pengumuman</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah</a></div>
            </div>
        </div>
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('pengumuman.update',$pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Pengumuman</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Pengumuman" value="{{ $pengumuman->judul }}">
                            @error('judul')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isi">Tahun Ajaran</label>
                            <textarea type="text" id="body" name="isi" class="my-editor form-control @error('isi') is-invalid @enderror" placeholder="isi">{{ $pengumuman->isi }}</textarea>
                            @error('isi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')

<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
</script>
@endpush

@endsection