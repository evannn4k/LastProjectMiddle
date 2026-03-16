@extends('layout.main')

@section('main')
    <div class="flex min-h-screen flex-col justify-between">
        <x-user.navbar />

        @yield('content')

        <x-user.footer />
    </div>
@endsection
