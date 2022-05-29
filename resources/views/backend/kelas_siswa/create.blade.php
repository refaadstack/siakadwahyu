@extends('backend.master.master')
@section('title', 'Kelas')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Kelas {{ $kelas->nama_kelas }}</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah Siswa</a></div>
            </div>
        </div>
        @include('backend.master.info')
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Tambah siswa</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('kelas-siswa.store',$kelas->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <select name="siswa_id" id="nis" class="form-control select2-example">
                                <option value="">Pilih Siswa</option>
                                @foreach ($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <label for="kelas_id">Kelas</label>
                            <input type="text" name="kelas_id" value="{{ $kelas->id }}">
                        </div>
                        <div class="form-group data-siswa" >
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" >
                        </div>
                        <div class="form-group data-siswa">
                            <label for="nisn" class="form-group">NISN</label>
                            <input type="text" name="nisn" id="nisn" class="form-control" >
                        </div>
                        <div class="form-group data-siswa">
                            <label for="jenis_kelamin" class="form-group">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" >
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

<script>
    $('.data-siswa').hide();
    $('.select2-example').change(function(){
            var id = $(this).val();
            var data = [];
            $.ajax({
                url: '{{ url('/kelas-siswa/select2') }}/'+id,
                type: 'GET',
                dataType: 'json',
                success: function(e){
                    $('.data-siswa').show();
                    data = e;
                    $('#nama').val(data[0].nama);
                    $('#nisn').val(data[0].nisn);
                    $('#jenis_kelamin').val(data[0].jenis_kelamin);
                }
            });
        });

</script>
@endpush
@endsection