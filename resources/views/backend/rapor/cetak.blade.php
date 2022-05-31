<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        .container{
            margin: 10px;
        }
        #headrapor{
            margin-left: 10px;
            display: grid;
        }
        #headrapor p{
            margin-bottom: 1px;
            font-size: 10pt
        }
        .header img{
            margin: 10px;
        }
        hr{
            
            border: none;
            height: 2px;
            /* Set the hr color */
            color: #333; /* old IE */
            background-color: #333; /* Modern Browsers */
        }
        
	</style>
    <title>RAPOR</title>
  </head>
  <body>
            <table width="100%">
                <tr>
                <td width="30px" align="left"><img src="{{ asset('img/Logo-dinas.png') }}" width="100%"></td>
                <td width="100px" align="center">
                    <h5>Dinas Pendidikan Kota Jambi</h5>
                    <h6>SMA NEGERI 12 Kota Jambi</h6>
                    <small>Jln. Kapten A. Bakarudin Kel. Beliung Kec. Alam Barajo - Kota Jambi</small><br>
                    <small>Kode Pos : 36125 - Email : smanegeri12koja@gmail.com</small>
                </td>
                <td width="30px" align="right"><img src="{{ asset('img/logo.png') }}" width="100%"></td>
                </tr>
            </table>
            <hr>
            <h5 class="text-center">Laporan Nilai Siswa</h5>

    
            <table class="table table-sm" id="biodata">
                <tr>
                    <td>Nama</td>
                    <td width="1%">:</td>
                    <td width="20%">{{ $siswa->nama }}</td>
                    <td width="25%">&nbsp;</td>
                    <td>Jenis Kelamin</td>
                    <td width="1%">:</td>
                    <td width="20%">{{ $siswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td width="1%">:</td>
                    <td width="20%">{{ $siswa->nisn }}</td>
                    <td width="25%">&nbsp;</td>
                    <td>Alamat</td>
                    <td width="1%">:</td>
                    <td width="20%">{{ $siswa->alamat }}</td>
                </tr>
            </table>
        <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th scope="col" width="10%">Kode</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col" width="10%" class="text-center ">Semester</th>
                <th scope="col" width="10%" class="text-center ">Nilai</th>
                <th scope="col" width="10%" class="text-center ">Grade</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $total = 0;
            $hitung = 0;
            $result = 0;
            ?>
            @foreach ($rapor as $obj)    
            <tr>
                <td width="10%">{{ $obj->kode_mapel }}</td>
                <td >{{ $obj->nama_mapel }}</td>
                <td class="text-center ">{{ $obj->nama_semester  }}</td>
                <td class="text-center ">{{ $obj->nilai }}</td>
                @if ($obj->nilai >= 80){
                    <td class="text-center ">{{ 'A' }}</td>   
                }
                @elseif ($obj->nilai >= 70){
                    <td class="text-center ">{{ 'B' }}</td>
                }
                @elseif ($obj->nilai >= 60){
                    <td class="text-center ">{{ 'C' }}</td>
                }
                @else{
                    <td class="text-center ">{{ 'D' }}</td>
                }                    
                @endif
                <?php
                $total = $total + $obj->nilai;
                $hitung++;
                $result = $total/$hitung;
                $format = number_format($result,2);
                ?>
            </tr>
            @endforeach
            @if ($result>0)
            {
                <tr>
                    <td colspan="3" class="text-center ">Rata-Rata</td>
                    <td colspan="2" class="text-center ">{{ $format }}</td>
                </tr>
            }   
            @else
            {
                <tr>
                    <td colspan="5" class="text-center"><h5>Data Masih Kosong</h5></td>
                </tr>
            }   
            @endif
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
        <p align="right" id="tanggal" class="mb-2">Jambi, {{tgl_indo(date('Y-m-d')) }}</p>
        {{-- <p align="right" style="margin-right: 85px">{{ $siswa->kelas->walikelas }}  </p> --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>