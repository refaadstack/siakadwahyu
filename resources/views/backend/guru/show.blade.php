@extends('backend.master.master')
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
                          <img src="{{ Storage::url($guru->foto_guru)}}" alt="">
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