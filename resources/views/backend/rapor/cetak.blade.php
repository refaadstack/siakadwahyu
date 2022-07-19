<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor</title>
    <style >
        table.biodata {
            /* border: 1px solid #000; */
            border-collapse: collapse;
            /* margin-left: 70px; */
        }
        table.nilai, td.bordered {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 3px;
            /* margin-left: 70px; */
        }
    </style>


</head>

<body>
    <div class="container">
        <table class="biodata">
            <tr>
                <td width="">Nama Sekolah </td>
                <td>:</td>
                <td width="380px">SMA Negeri 12 Kota Jambi</td>
                <td>Kelas</td>
                <td>:</td>
                <td width="80px">{{ $kelas->nama_kelas }}</td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td>:</td>
                <td>{{ $siswa->alamat }}</td>
                <td>Semester </td>
                <td>:</td>
                <td>{{ $semester }}</td>
            </tr>
            <tr>
                <td>Nama Peserta Didik </td>
                <td>:</td>
                <td >{{ $siswa->nama }}</td>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td >{{ $tahun_ajaran }}</td>
            </tr>
            <tr>
                <td>Nomor Induk/NISN </td>
                <td>:</td>
                <td >{{ $siswa->nis }} / {{ $siswa->nisn }}</td>
            </tr>
        </table>
    </div>
    <hr>

    <table class="nilai" >
        <thead>
            <tr >
                <td rowspan="2" class="bordered" width="1%">No</td>
                <td rowspan="2" class="bordered" width="160px">Mata Pelajaran</td>
                <td class="bordered" colspan="3" width="40%">Pengetahuan</td>
            </tr>
            <tr>
                <td class="bordered">Nilai</td>
                <td class="bordered">Predikat</td>
                <td class="bordered" width="400px">Deskripsi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($rapor as $item)
                
                <tr>
                    <td class="bordered">{{ $loop->iteration }}</td>
                    <td class="bordered">{{ $item->nama_mapel }}</td>
                    <td class="bordered">{{ $item->nilai }}</td>
                    @if ($item->nilai >= 90)
                        <td class="bordered">A</td>
                    @elseif ($item->nilai >= 79)
                        <td class="bordered">B</td>
                    @elseif ($item->nilai >= 68)
                        <td class="bordered">C</td>
                    @else
                        <td class="bordered">E</td>
                    @endif
                    <td class="bordered">  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <br><br><br>

    <?php
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
    ?>
    <p align="right" id="tanggal" style="margin-right:1.5em">Jambi, {{tgl_indo(date('Y-m-d')) }}</p>
    <p align="right" id="tanggal" style="margin-bottom: 4em;margin-right:75px">Wali Kelas,</p>

    <p align="right" style="margin-right: 85px">{{ $kelas->nama }}  </p>
</body>
</html>