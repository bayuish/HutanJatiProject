<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{-- Optional: Livewire Styles (jika berencana menggunakan Livewire untuk interaktivitas) --}}
    {{-- @livewireStyles --}}
</head>
<body class="bg-light">
    <div class="d-flex" style="min-height: 100vh;">
        {{-- Sidebar --}}
        <x-layout.sidebar />

        <div class="flex-grow-1 d-flex flex-column overflow-hidden">
            {{-- Navbar --}}
            <x-layout.navbar />

            <main class="flex-grow-1 overflow-auto bg-light p-4">
                @yield('content') {{-- Content of individual pages will be injected here --}}
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eJz50QDA0uK" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- Optional: Livewire Scripts --}}
    {{-- @livewireScripts --}}
</body>
</html>