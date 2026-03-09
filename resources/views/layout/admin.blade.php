@extends('layout.main')

@section('main')
    <div class="flex flex-col bg-gray-100 min-h-screen">
        <x-admin.navbar></x-admin-navbar>

        <x-admin.sidebar></x-admin.sidebar>

        <main class="pt-3 md:pt-0">
            @yield('content')
        </main>
    </div>
@endsection
