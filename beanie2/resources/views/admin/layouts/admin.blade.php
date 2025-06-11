<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body style="display: flex; min-height: 100vh; background-color: #FAF3E0; color: #3E2723;">

    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Main Content --}}
    <main style="flex: 1; padding: 2rem; background-color: white; margin: 1rem; border-radius: 0.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        @yield('content')
    </main>

</body>
</html>
