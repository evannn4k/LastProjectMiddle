<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VanStore</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    {{-- main css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    {{-- css/js vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @yield('main')

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                });
            });
        </script>
    @endif

    @stack('scripts')

    {{-- datatables --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
