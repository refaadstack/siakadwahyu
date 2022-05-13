@extends('backend.master.master')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">DASHBOARD</div>
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
        </div>
    </div>
</div>
@endsection