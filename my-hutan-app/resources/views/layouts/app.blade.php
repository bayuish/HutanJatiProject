<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Bootstrap Icons CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Custom CSS: Menggunakan custom.css karena app.css tidak ditemukan --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            /* overflow: hidden; */ /* Dikomentari untuk memungkinkan scrolling jika konten melebihi viewport */
        }
        .main-wrapper {
            display: flex;
            min-height: 100vh; /* Memungkinkan container tumbuh jika konten lebih panjang dari viewport */
            width: 100vw;
        }
        .content-area {
            flex-grow: 1; /* Memungkinkan area konten mengisi sisa ruang */
            overflow-y: auto; /* Memungkinkan scrolling di area konten saja */
            padding: 20px; /* Padding default untuk konten */
        }

        /* Styling tambahan untuk sidebar link active */
        .active-sidebar-link {
            color: #0d6efd !important; /* Warna biru Bootstrap primary */
            font-weight: bold;
        }
    </style>

    {{-- ⭐ Pindahkan variabel ASSET_URL ke dalam <head> untuk ketersediaan global ⭐ --}}
    <script>
        const ASSET_URL = "{{ asset('') }}"; // Ini akan menghasilkan URL dasar proyek Anda
    </script>
</head>
<body class="antialiased">
    <div class="main-wrapper">
        {{-- Panggil komponen sidebar. Ini akan muncul di semua halaman yang menggunakan layout ini. --}}
        <x-layout.sidebar />

        <div class="content-area">
            @yield('content') {{-- Konten spesifik dari setiap halaman akan dirender di sini --}}
        </div>
    </div>

    {{-- Bootstrap Bundle with Popper (JavaScript) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- JavaScript kustom Anda (custom.js sekarang dimuat di menu/index.blade.php) --}}
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
</body>
</html>
