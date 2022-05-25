@extends('backend.master.master')
@section('content')
    <div class="main-content">
        <div class="section">
            <div class="section-header">
                <h5>Pengumuman {{ $pengumuman->judul }}</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4>{{ $pengumuman->judul }}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <small>{{ date('j F Y',strtotime($pengumuman->created_at)) }}</small>
                                                    <p>{!! $pengumuman->isi !!}</p>
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
    </div>
@endsection