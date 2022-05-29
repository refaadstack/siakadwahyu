@extends('backend.master.master')
@section('title', 'Profil Guru')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Profil Guru</h5>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <!-- card title -->
                <h4>{{ $guru->nama }}</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ Storage::url($guru->foto_guru)}}" alt="foto_guru" width="200px">
                      </div>
                      <div class="col-md-9">
                            <table class="table table-bordered ">
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Nama</th>
                                    <td>{{ $guru->nama }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">NIP</th>
                                    <td>{{ $guru->nip }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">NIK</th>
                                    <td>{{ $guru->nik }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Jenis Kelamin</th>
                                    <td>{{ $guru->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Tempat Lahir</th>
                                    <td>{{ $guru->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Tanggal Lahir</th>
                                    <td>{{ date('j F Y',strtotime($guru->tanggal_lahir)) }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Alamat</th>
                                    <td>{{ $guru->alamat }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Agama</th>
                                    <td>{{ $guru->agama }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Pendidikan Terakhir</th>
                                    <td>{{ $guru->jenjang }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">Jabatan</th>
                                    <td>{{ $guru->jurusan }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white" width="25%">No Telp</th>
                                    <td>{{ $guru->no_telepon }}</td>
                                </tr>
                            </table>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Mata Pelajaran Yang diampu</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white" width="10%">no</th>
                                                <th class="bg-primary text-white text-center" width="25%">Nama Mapel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guru->mapel as $m)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $m->nama_mapel }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                      </div>
                  </div>

              </div>
              <!-- card footer -->
              <div class="card-footer">
                
              </div>
        </div>        
    </div>
</div>

@endsection