@extends('backend.master.master')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Profil Siswa</h5>
        </div>
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
        <div class="card card-primary">
            <div class="card-header">
                <!-- card title -->
                <h4>{{ $siswa->nama }}</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                  <div class="row">
                      <div class="col-md-4 ">
                          <div class="card">
                              <div class="card-header">
                                    <img class="image-circle" src="{{ Storage::url($siswa->foto_siswa)}}" alt="foto_siswa" width="200px" >

                              </div>
                              <div class="card-body" >
                                  <ul class="list-group list-unbordered mb-6">
                                        <li class="list-group-item">
                                            <b>NISN</b> <a class="float-right">{{ $siswa->nisn }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>NIS</b> <a class="float-right">{{ $siswa->nis }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jenis Kelamin</b> <a class="float-right">{{ $siswa->jenis_kelamin }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tempat Lahir</b> <a class="float-right">{{ $siswa->tempat_lahir }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tanggal Lahir</b> <a class="float-right">{{ $siswa->tanggal_lahir }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Agama</b> <a class="float-right">{{ $siswa->agama }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Alamat</b> <a class="float-right">{{ $siswa->alamat }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No Telepon</b> <a class="float-right">{{ $siswa->no_telepon_siswa }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right">{{ $siswa->status }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Sekolah Asal</b> <a class="float-right">{{ $siswa->sekolah }}</a>
                                        </li>
                                  </ul>

                                  <h5 class="mt-3 mb-3">Data Orang Tua atau Wali</h5>
                                    <ul class="list-group list-unbordered mb-6">
                                            <li class="list-group-item">
                                                <b>Nama Ayah</b> <a class="float-right">{{ $siswa->nama_ayah }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Nama Ibu</b> <a class="float-right">{{ $siswa->nama_ibu }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Pekerjaan Ayah</b> <a class="float-right">{{ $siswa->pekerjaan_ayah }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Pekerjaan Ibu</b> <a class="float-right">{{ $siswa->pekerjaan_ibu }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Alamat Orang Tua</b> <a class="float-right">{{ $siswa->alamat_ortu }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>No Telepon Orang Tua</b> <a class="float-right">{{ $siswa->no_telepon_ortu }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Nama Wali</b> <a class="float-right">{{ $siswa->nama_wali }}</a>  
                                            </li>
                                            <li class="list-group-item">
                                                <b>Pekerjaan Wali</b> <a class="float-right">{{ $siswa->pekerjaan_wali }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Alamat Wali</b> <a class="float-right">{{ $siswa->alamat_wali }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>No Telepon Wali</b> <a class="float-right">{{ $siswa->no_telepon_wali }}</a>
                                            </li>
                                    </ul>
                              </div>
                              <div class="card-footer text-muted">
                            </div>
                        </div>
                      </div>
                    {{-- Card Nilai --}}
                    <div class="col-md-8">
                        <div class="card">
                                <div class="container">
                                    <button class="btn btn-primary" id="tambah">Tambah Data Nilai</button>
                                    <button class="btn btn-danger" id="tutup">Tutup</button>
                                <div class="card-header data-nilai">
                                    <h5 class="card-title">Form Tambah Data Nilai</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="/siswa/{{ $siswa->id }}/addnilai" method="POST" >
                                        @csrf
                                        <div class="form-group data-nilai">
                                            <label for="">Nama Mata Pelajaran</label>
                                            <select class="form-control" name="mapel_id">
                                                <option class="form-control" value="" selected disabled>Pilih Mata Pelajaran</option>
                                                @foreach ($matapelajaran as $item)
                                                    <option class="form-control" value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group data-nilai">
                                            <label for="nilai">Nilai</label>
                                            <input type="number" class="form-control" min="0" max="100"  name="nilai" id="nilai" placeholder="Masukkan Nilai">
                                        </div>
                                        <button type="submit" class="btn btn-primary data-nilai">Submit</button>
                                    </form>
                                </div>
                            </div>
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                            Nilai Mata Pelajaran
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered" id="nilai">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Nilai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($siswaa as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nama_mapel }}</td>
                                                        <td>{{ $item->nilai }}</td>
                                                        <td><a href="/siswa/{{ $item->mp_id }}/{{ $item->id }}/editnilaimapel" class="btn btn-warning">Edit</a>
                                                        <button id="#delete" class="btn btn-danger delete" data-id="{{ $item->mp_id }}">Hapus</button></td>
                                                        
                                                    </tr>
                                                    
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                </div>  
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                            Riwayat Kelas
                                        </div>
                                          <div class="card-body">
                                            <table class="table table-bordered" id="nilai">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kelas</th>
                                                        <th>Nama Walikelas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kelas as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nama_kelas }}</td>
                                                        <td>{{ $item->guru->nama }}</td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
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
@push('scripts')

<script src="{{ asset('stisla/assets/js/page/modules-sweetalert.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').on('click', function(e){
            e.preventDefault();
            var idsiswa = {{ $siswa->id }};
            var idmapel = $(this).data('id');

            console.log(idmapel, idsiswa);
            swal({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/siswa/"+idsiswa+"/"+idmapel+"/deletenilai";
                    swal("Poof! Data berhasil dihapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Data ga jadi dihapus!");
                }
                });
            })
        });    
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.data-nilai').hide();
    $('#tutup').hide();
    $('#tambah').click(function(){
        $('.data-nilai').show();
        $('#tutup').show();
    });
    
    $('#tutup').click(function(){
        $('.data-nilai').hide();
        $('#tutup').hide();
    });
});
</script>
@endpush

@endsection