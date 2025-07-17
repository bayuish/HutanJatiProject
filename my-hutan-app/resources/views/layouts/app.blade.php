<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Your custom CSS styles */
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 80px;
            min-height: 100vh;
            background-color: #343a40; /* Dark background for sidebar */
            color: white;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #adb5bd;
            padding: 10px 0;
            font-size: 0.75rem;
            text-align: center;
        }
        .sidebar .nav-link.active {
            color: white;
            background-color: #495057;
            border-radius: 5px;
        }
        .sidebar .nav-link i {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        .main-content {
            padding: 20px;
            flex-grow: 1;
        }
        .card-img-top {
            height: 140px;
            object-fit: cover;
        }
        .order-item-card img {
            width: 64px;
            height: 64px;
            object-fit: cover;
        }
        .overflow-auto {
            overflow-y: auto;
        }
        /* Custom scrollbar for webkit browsers */
        .overflow-auto::-webkit-scrollbar,
        .pe-2::-webkit-scrollbar {
            width: 8px; /* width of the scrollbar */
        }
        .overflow-auto::-webkit-scrollbar-track,
        .pe-2::-webkit-scrollbar-track {
            background: #f1f1f1; /* color of the tracking area */
            border-radius: 10px;
        }
        .overflow-auto::-webkit-scrollbar-thumb,
        .pe-2::-webkit-scrollbar-thumb {
            background: #888; /* color of the scroll thumb */
            border-radius: 10px;
        }
        .overflow-auto::-webkit-scrollbar-thumb:hover,
        .pe-2::-webkit-scrollbar-thumb:hover {
            background: #555; /* color of the scroll thumb on hover */
        }
    </style>
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="sidebar">
            <a class="navbar-brand text-white fw-bold mb-4" href="#">POS</a>
            <nav class="nav flex-column gap-2">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-grid-fill"></i>Dashboard</a>
                <a class="nav-link" href="#"><i class="bi bi-menu-button-wide-fill"></i>Menu</a>
                <a class="nav-link" href="#"><i class="bi bi-box-seam-fill"></i>Stock</a>
                <a class="nav-link" href="#"><i class="bi bi-border-all"></i>Table</a>
                <a class="nav-link" href="#"><i class="bi bi-clock-history"></i>History</a>
                <a class="nav-link" href="#"><i class="bi bi-gear-fill"></i>Settings</a>
            </nav>
        </div>

        {{-- Main Content --}}
        <div class="main-content flex-grow-1">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Inject ASSET_URL into JavaScript --}}
    <script>
        // Define ASSET_URL for use in JavaScript.
        // This assumes your public directory is the base for assets.
        const ASSET_URL = "{{ asset('/') }}";
        // If your images are directly in 'public/img/', and your products.image only contain the filename,
        // you might need: const ASSET_URL = "{{ asset('img/') }}/";
        // However, with `image: "img/products/..."` in JS, `{{ asset('/') }}` is usually correct.
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>