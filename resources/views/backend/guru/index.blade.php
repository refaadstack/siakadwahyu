@extends('backend.master.master')
@section('content')

<div class="main-content">
    <div class="section">
      <div class="section-header">
        <h5>Guru</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Guru</a></div>
            <div class="breadcrumb-item"><a href="#">index</a></div>
        </div>
    </div>
        <div class="card-wrap">
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              
            @endif
            <div class="card-header">
                <div class="card-body p-0">   
                    <div class="table-responsive">
                        <table id="guru-table" class="table table-striped table-bordered bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jenjang</th>
                                    <th>Jurusan</th>
                                    <th>Agama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
      </div>
  </div>

@push('scripts')
<script>
    $(function() {
        $('#guru-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'guru/json',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nama', name: 'nama' },
                { data: 'nip', name: 'nip' },
                { data: 'nik', name: 'nik' },
                { data: 'jenis_kelamin', name:'jenis_kelamin'},
                { data: 'jenjang', name:'jenjang'},
                { data: 'jurusan', name:'jurusan'},
                { data: 'agama', name:'agama'},
                { data: 'tempat_lahir', name:'tempat_lahir'},
                { data: 'tanggal_lahir', name:'tanggal_lahir'},
                { data: 'alamat', name:'alamat'},
                { data: 'no_telepon', name:'no_telepon'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
@endsection