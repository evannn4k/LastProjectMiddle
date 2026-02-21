@extends('layout.main')

@section('main')
    <nav class="bg-neutral-primary sticky w-full z-20 top-0 start-0 border-b border-default">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/images/logo.png') }}" class="h-7" alt="Flowbite Logo">
                <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">Toko Tup Up</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if (!Auth::guard('user')->check())
                    <a href="{{ route('login') }}"
                        class="text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none">Login</a>
                @else
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button
                            class="text-white bg-red-500 hover:bg-red-600 box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none"
                            role="menuitem">Logout</button>
                    </form>
                @endif
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-default rounded-base bg-neutral-secondary-soft md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-neutral-primary">
                    <li>
                        <a href="{{ route('index') }} "
                            class="block py-2 px-3 text-white bg-brand rounded-sm md:bg-transparent md:text-fg-brand md:p-0"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Cek
                            Transaksi</a>
                    </li>
                    @if (Auth::guard('user')->check())
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Profil</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Tentang</a>
                        </li>
                    @endif
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
@endsection
