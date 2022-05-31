@extends('backend.master.master')
@section('title', 'Jadwal')
@section('content')

<div class="main-content">
    <div class="section">
      <div class="section-header">
        <h5>Jadwal</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Jadwal</a></div>
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
                        <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                        <table id="jadwal-table" class="table table-striped table-bordered bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Hari</th>
                                    <th>Status</th>
                                    <th>Guru</th>
                                    <th>Jam</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Semester</th>
                                    <th>Kelas</th>
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
        $('#jadwal-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'jadwal/json',
            columns: [
                { data:'DT_RowIndex', name:'DT_RowIndex', width:'5%'},
                { data: 'hari', name: 'hari' },
                { data: 'status', name: 'status' },
                { data: 'nama_guru', name: 'nama_guru' },
                { data: 'jam_mulai', name: 'jam_mulai' },
                { data: 'nama_mapel', name: 'nama_mapel' },
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'nama_kelas', name:'nama_kelas'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
     
</script>

<script>
    $(document).ready(function() {
        $('#jadwal-table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            swal({
                title: "APAKAH KAMU YAKIN?",
                text: "Kamu akan menghapus data Jadwal "+nama+"????",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/jadwal/"+id+"/delete";
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