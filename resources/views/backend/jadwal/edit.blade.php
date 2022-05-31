@extends('backend.master.master')
@section('title', 'Jadwal')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Jadwal</h5>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Jadwal</a></div>
                <div class="breadcrumb-item"><a href="#">Edit</a></div>
            </div>
        </div>
        @include('backend.master.info')
    </div>
        <div class="card-wrap">
            <div class="card-header">
                <h5>Form Edit</h5>
                <div class="card-body bg-light">
                    <form action="{{ route('jadwal.update',$jadwal->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="" class="form-control">
                                <option class="form-control" value="" disabled selected>Pilih Hari</option>
                                <option class="form-control" value="Senin" @if($jadwal->hari == "Senin") selected @endif>Senin</option>
                                <option class="form-control" value="Selasa" @if($jadwal->hari == "Selasa") selected @endif>Selasa</option>
                                <option class="form-control" value="Rabu" @if($jadwal->hari == "Rabu") selected @endif>Rabu</option>
                                <option class="form-control" value="Kamis" @if($jadwal->hari == "Kamis") selected @endif>Kamis</option>
                                <option class="form-control" value="Jumat" @if($jadwal->hari == "Jumat") selected @endif>Jumat</option>
                                <option class="form-control" value="Sabtu" @if($jadwal->hari == "Sabtu") selected @endif>Sabtu</option>
                                <option class="form-control" value="Minggu" @if($jadwal->hari == "Minggu") selected @endif>Minggu</option>
                            </select>
                            @error('hari')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="semester_id">Semester</label>
                            <select name="semester_id" id="" class="form-control">
                                <option class="form-control" value="" disabled selected>Pilih Semester</option>
                                @foreach ($semester as $item)
                                    <option class="form-control" value="{{ $item->id }}" @if($jadwal->semester_id == $item->id) selected @endif>{{ $item->nama_semester }}</option>
                                @endforeach
                            </select>
                            @error('semester_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="" class="form-control">
                                <option class="form-control" value="" disabled selected>Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                    <option class="form-control" value="{{ $item->id }}" @if($jadwal->kelas_id == $item->id) selected @endif>{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guru_id">Guru</label>
                            <select name="guru_id" id="" class="form-control">
                                <option class="form-control" value="" disabled selected>Pilih Guru</option>
                                @foreach ($guru as $item)
                                    <option class="form-control" value="{{ $item->id }}" @if($jadwal->guru_id == $item->id) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('guru_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mapel_id">Mata Pelajaran</label>
                            <select name="mapel_id" id="" class="form-control">
                                <option class="form-control" value="" disabled selected>Pilih Mata Pelajaran</option>
                                @foreach ($mapel as $item)
                                    <option class="form-control" value="{{ $item->id }}" @if($jadwal->mapel_id == $item->id) selected @endif>{{ $item->nama_mapel }}</option>
                                @endforeach
                            </select>
                            @error('mapel_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jam_id">Jam</label>
                            <select name="jam_id" id="" class="form-control">
                                <option class="form-control" value="" disabled selected>Pilih Jam</option>
                                @foreach ($jam as $item)
                                    <option class="form-control" value="{{ $item->id }}" @if($jadwal->jam_id == $item->id ) selected @endif>{{ $item->jam_mulai }}-{{ $item->jam_selesai }}</option>
                                @endforeach
                            </select>
                            @error('jam_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-check-label">Status</label>  
                            <select name="status" id="" class="form-control">
                                <option  value="" selected disabled>Pilih Status</option>
                                <option value="aktif" @if($jadwal->status == "aktif") selected @endif>Aktif</option>
                                <option value="tidak aktif" @if($jadwal->status== "tidak aktif") selected @endif>Tidak Aktif</option>
                            </select>
                              @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection