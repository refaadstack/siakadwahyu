@extends('backend.master.master')
@section('title', 'Kelas')
@section('content')

<div class="main-content">
    <div class="section">
      <div class="section-header">
        <h5>Kelas</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
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
                        <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                        <table id="kelas-table" class="table table-striped table-bordered bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Nama Kelas</th>
                                    <th>Wali Kelas</th>
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
        $('#kelas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'kelas/json',
            columns: [
                { data:'DT_RowIndex', name:'DT_RowIndex', width:'5%'},
                { data: 'nama_kelas', name: 'nama_kelas' },
                { data: 'guru.nama', name:'guru.nama'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
     
</script>

<script>
    $(document).ready(function() {
        $('#kelas-table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            swal({
                title: "APAKAH KAMU YAKIN?",
                text: "Kamu akan menghapus data Kelas "+nama+"????",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/kelas/"+id+"/delete";
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