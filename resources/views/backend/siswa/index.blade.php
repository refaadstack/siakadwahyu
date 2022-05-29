@extends('backend.master.master')
@section('title', 'Siswa')
@section('content')

<div class="main-content">
    <div class="section">
      <div class="section-header">
        <h5>Siswa</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Siswa</a></div>
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
                        @if (auth()->user()->role == 'admin')    
                            <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                        @endif
                        <table id="siswa-table" class="table table-striped table-bordered bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Agama</th>
                                    <th>No Telepon</th>
                                    <th>Aksi</th>
                                    <th></th>
                                    <th></th>
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
<script src="{{ asset('stisla/assets/js/page/modules-sweetalert.js') }}"></script>

<script>
    $(function() {
        $('#siswa-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'siswa/json',
            columns: [
                { data:'DT_RowIndex', name:'DT_RowIndex', width:'5%'},
                { data: 'nama', name: 'nama' },
                { data: 'foto_siswa', name:'foto_siswa'},
                { data: 'nis', name: 'nis' },
                { data: 'nisn', name: 'nisn' },
                { data: 'jenis_kelamin', name:'jenis_kelamin'},
                { data: 'tempat_lahir', name:'tempat_lahir'},
                { data: 'tanggal_lahir', name:'tanggal_lahir'},
                { data: 'alamat', name:'alamat'},
                { data: 'agama', name:'agama'},
                { data: 'no_telepon_siswa', name:'no_telepon_siswa'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
     
</script>

<script>
    $(document).ready(function() {
        $('#siswa-table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            swal({
                title: "Are you sure?",
                text: "Kamu akan menghapus data "+nama+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/siswa/"+id+"/delete";
                    swal("Poof! Data berhasil dihapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Data ga jadi dihapus!");
                }
                });
            });
        }); 


</script>

@endpush
@endsection