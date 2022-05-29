@extends('backend.master.master')
@section('title', 'Semester')
@section('content')

<div class="main-content">
    <div class="section">
      <div class="section-header">
        <h5>Semester</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Semester</a></div>
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
                        <a href="{{ route('semester.create') }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                        <table id="semester-table" class="table table-striped table-bordered bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Nama Semester</th>
                                    <th>Tahun Ajaran</th>
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
        $('#semester-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'semester/json',
            columns: [
                { data:'DT_RowIndex', name:'DT_RowIndex', width:'5%'},
                { data: 'nama_semester', name: 'nama_semester' },
                { data: 'tahun_ajaran', name:'tahun_ajaran'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
     
</script>

<script>
    $(document).ready(function() {
        $('#semester-table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            swal({
                title: "APAKAH KAMU YAKIN?",
                text: "Kamu akan menghapus data Semester "+nama+"????",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/semester/"+id+"/delete";
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