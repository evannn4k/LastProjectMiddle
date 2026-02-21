<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko TopUp</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    {{-- main css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    {{-- tailwind --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    @yield('main')

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
            });
        </script>
    @endif

    <script src="{{ asset("assets/js/main.js") }}"></script>
</body>

</html>
