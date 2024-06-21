<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Si Proan | Lapjusik ZIDAM</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Cetak Laporan -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>


<!--  d-flex flex-column justify-content-center -->

<body id="home">
    <div class="container full-height d-flex justify-content-center align-items-center">
        <a class="fixed-top btn btn-sm btn-primary" href="{{ route('login.minada') }}">MINADA</a>
        <div class="text-center text-white">
            <h1 class="heading">Selamat Datang</h1>
            <p class="lead w-75 mx-auto">Si Proan, aplikasi inovatif yang dirancang untuk memudahkan proses pelaporan dan pemantauan kegiatan lapjusik secara efisien dan akurat. Dengan antarmuka yang user-friendly dan fitur-fitur canggih seperti pelaporan real-time, analisis data yang komprehensif, dan sistem notifikasi otomatis.</p>
            <p class="lead">
                <a href="{{ route('login.siwas') }}" class="btn btn-success mr-3">SIWAS</a>
                <a href="{{ route('login.denzibang') }}" class="btn btn-warning">Denzibang</a>
            </p>
        </div>
    </div>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
</body>

</html>