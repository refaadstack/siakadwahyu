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
                        <div class="">
                            <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary mb-2">+tambah data</a>
                            <div class="table-responsive">
                                <table id="kelas-table" class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-white">No</th>
                                            <th class="text-white">Nama Kelas</th>
                                            <th class="text-white">Semester</th>
                                            <th class="text-white">Tahun Ajaran</th>
                                            <th class="text-white">Wali Kelas</th>
                                            <th class="text-white">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $kelas as $k)
                                            
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->nama_kelas }}</td>
                                            <td>{{ $k->semester }}</td>
                                            <td>{{ $k->tahun }}</td>
                                            <td>{{ $k->nama }}</td>
                                            <td>
                                                <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{ route('kelas-siswa.show',$k->id) }}" class="btn btn-sm btn-success">Lihat</a>
                                                <a href="{{ route('kelas.destroy', $k->id) }}" class="btn btn-sm btn-danger delete" data-id="{{ $k->id }}" data-nama="{{ $k->nama_kelas }}">Hapus</a>

                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    
    <script src="{{ asset('stisla/assets/js/page/modules-sweetalert.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#kelas-table').on('click', '.delete', function(e) {
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