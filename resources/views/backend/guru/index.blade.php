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
                        <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                        <a href="{{ route('guru.tambah-mapel') }}" class="btn btn-sm btn-warning mb-2">+tambah guru mata pelajaran</a>
                        <table id="guru-table" class="table table-striped table-bordered bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>NIP</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jenjang</th>
                                    <th>Jurusan</th>
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
<script src="{{ asset('stisla/assets/js/page/modules-sweetalert.js') }}"></script>

<script>
    $(function() {
        $('#guru-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'guru/json',
            columns: [
                { data:'DT_RowIndex', name:'DT_RowIndex', width:'5%'},
                { data: 'nama', name: 'nama' },
                { data: 'foto_guru', name:'foto_guru'},
                { data: 'nip', name: 'nip' },
                { data: 'nik', name: 'nik' },
                { data: 'jenis_kelamin', name:'jenis_kelamin'},
                { data: 'jenjang', name:'jenjang'},
                { data: 'jurusan', name:'jurusan'},
                { data: 'no_telepon', name:'no_telepon'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
     
</script>

<script>
    $(document).ready(function() {
        $('#guru-table').on('click', '.delete', function(e) {
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
                    window.location = "/guru/"+id+"/delete";
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