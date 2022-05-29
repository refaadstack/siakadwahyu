@extends('backend.master.master')
@section('title', 'Kelas')
@section('content')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h5>Kelas {{ $kelas->nama_kelas }}</h5><br>
            <div id="{{ $kelas->id }}" data></div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
                <div class="breadcrumb-item"><a href="#">index</a></div>
            </div>
        </div>
        <div>
            <h6>Wali Kelas : {{ $kelas->guru->nama }}</h6>
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
                        <a href="{{ route('kelas-siswa.create',$kelas->id) }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                        <table id="kelasShow-table" class="table table-striped table-bordered bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>Nama Siswa</th>
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
        $('#kelasShow-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url()->current() !!}',
            columns: [
                { data:'DT_RowIndex', name:'DT_RowIndex', width:'5%'},
                { data: 'nama', name:'siswa.nama'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
     
</script>

<script>
    $(document).ready(function() {
        $('#kelasShow-table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var idkelas = {{ $kelas->id }};
            var nama = $(this).data('nama');
            swal({
                title: "APAKAH KAMU YAKIN?",
                text: "Kamu akan menghapus data siswa "+nama+" di kelas ini????",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/kelas-siswa/"+idkelas+"/"+id+"/delete";
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