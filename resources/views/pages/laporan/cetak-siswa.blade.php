<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h3 class="text-center mb-3">Laporan Pembayaran {{ $siswa->nama }}</h3>
    <table class="table">
        <thead>
             <tr>
                 <th>No.</th>
                 <th>Petugas</th>
                 <th>Tanggal Bayar</th>
                 <th>Nominal</th>
                 <th>SPP</th>
                 <th>Bulan</th>
                 <th>Tahun</th>
             </tr>
        </thead>
       @foreach ($pembayaran as $data )
         <tbody>
             <tr>
                 <td>{{ $loop->iteration }}</td>
                 <td>{{ $data->petugas->nama_petugas }}</td>
                 <td>{{ $data->tgl_bayar }}</td>
                 <td>Rp. {{ number_format($data->jumlah_bayar) }}</td>
                 <td>Rp. {{ number_format($data->spp->nominal) }} - {{ $data->spp->tahun }}</td>
                 <td>{{ $data->bulan_bayar }}</td>
                 <td>{{ $data->tahun_dibayar }}</td>

             </tr>
         </tbody>
       @endforeach
     </table>


     <script>
        window.print();
    </script>
</body>
</html>
