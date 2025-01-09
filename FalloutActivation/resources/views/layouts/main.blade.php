<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fallout Activation</title>

    <!-- Memuat jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Memuat DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <!-- Memuat Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Memuat DataTables.js -->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/mirage.js"></script>

    @section('content')
    <style>
        .loader {
            margin: auto;
            border: 20px solid #EAF0F6;
            border-radius: 50%;
            border-top: 20px solid #FF7A59;
            width: 200px;
            height: 200px;
            animation: spinner 4s linear infinite;
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <!-- <l-mirage size="60" speed="2.5" color="black"></l-mirage> -->

    @vite('resources/js/app.js')
    <!-- Memuat file CSS tambahan -->
    @yield('css')
</head>

<body>
    <!-- Konten halaman -->
    @yield('content')

    <!-- Memuat file JavaScript menggunakan Laravel Mix -->
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
</body>

</html>