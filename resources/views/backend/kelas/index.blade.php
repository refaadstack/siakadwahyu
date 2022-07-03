@extends('backend.master.master')
@section('title', 'Kelas')
@section('content')

<div class="main-content">
    <div class="section">
      <div class="section-header">
        <h5>Kelas</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
            <div class="breadcrumb-item"><a href="#">index</a></div>
        </div>
    </div>
        <div class="card-wrap">
            @if(Session::has('success'))
                <script type="text/javascript">

                    function massge() {
                    swal(
                                'Good job!',
                                'Data Berhasil disimpan!',
                                'success'
                            );
                    }

                    window.onload = massge;
                </script>
            @endif
            <div class="card-header">
                <div class="card-body p-0">   
                    <div class="table-responsive">
                        <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                        <form action="/kelas/filterTahun">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control" name="tahun" id="tahun">
                                    <option value="">Pilih Tahun</option>
                                    @foreach($ta as $t)
                                        <option value="{{ $t->tahun_ajaran }}">Semester {{ $t->nama_semester }} - {{ $t->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2" id="btn-filter">Filter</button>
                            </div>
                        </form>

                    </div>
                    
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection