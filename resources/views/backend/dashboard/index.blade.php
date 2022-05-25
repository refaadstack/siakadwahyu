@extends('backend.master.master')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">DASHBOARD</div>
        @include('backend.master.info')
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Selamat Datang di Sistem Informasi Akademik</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>Jumlah Guru</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-center">{{ $jumlah_guru }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h4>Jumlah Siswa</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-center">{{ $jumlah_siswa }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h4>Jumlah Kelas</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-center">{{ $jumlah_kelas }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h4>Jumlah Mapel</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-center">{{ $jumlah_mapel }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h3>Pengumuman</h3>
            </div>
            <div class="col-md-12">
                <div class="row">

                    @foreach ($pengumuman as $p)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $p->judul }}</h4>
                            </div>
                            <div class="card-body">
                                <small>{{ date('j F Y',strtotime($p->created_at)) }}</small>
                                <p>{!! Str::limit($p->isi,40)!!}</p>
                                <a href="{{ route('pengumuman.show',$p->slug) }}" class="float-right btn btn-primary">Baca pengumuman</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection