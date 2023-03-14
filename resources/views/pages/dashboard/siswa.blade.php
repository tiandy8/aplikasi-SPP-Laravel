<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>History pembayaran | Aplikasi SPP</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">


                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->nama }}</span>
              </a>
                            <div class="dropdown-menu dropdown-menu-end ">
                                <a class="btn btn-danger form-control" href="{{ route('logout') }}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

			<main class="content">
				<div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <h1 class="h3 me-auto "><strong>Histori Pembayaran</strong> {{ $siswa->nama }}</h1>
                            </div>

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
                        </div>
                    </div>
				</div>
			</main>

			@include('parts.footer')
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
