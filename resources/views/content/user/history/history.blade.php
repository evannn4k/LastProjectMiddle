@extends('layout.user')

@section('content')
    <div class="flex-1">
        <section id="form">
            <div class="bg-cover bg-center" style="background-image: url('{{ asset('assets/images/bg1.jpg') }}')">
                <div class="bg-black/80">
                    <div class="container mx-auto px-4 max-w-screen-xl">
                        <div class="grid grid-cols-3">
                            <div class="flex flex-col py-10 gap-6 col-span-3 md:col-span-2">
                                <span class="text-white text-4xl font-semibold">
                                    Lihat Riwayat Transaksi Kamu!</span>
                                <div class="text-white/80 text-sm md:text-base mt-1">Pesanan kamu tidak terdaftar meskipun
                                    kamu yakin telah
                                    memesan? Harap tunggu 1–5 menit. Tetapi jika pesanan masih belum muncul, kamu bisa
                                    <a href="{{ route('message') }}" class="text-white underline">Hubungi Kami</a> .
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="history">
            <div class="container mx-auto px-4 max-w-screen-xl pb-20">
                <div class="grid grid-cols-3 py-10">
                    <div class="col-span-3 md:col-span-2">
                        <h2 class="text-2xl font-semibold text-heading mb-2">Riwayat Transaksi</h2>
                        <p>Ini adalah riwayat transaksi kamu. Informasi yang tersedia mencakup tanggal
                            transaksi, kode invoice, nama layanan, harga, dan status.</p>
                    </div>
                </div>
                <div class="relative overflow-x-hidden">
                    @if ($orders->count() > 0)
                        <table id="main-table" class="w-full text-sm text-left rtl:text-right text-body">
                            <thead
                                class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        <span class="flex gap-1">
                                            Tanggal
                                            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        <span class="flex gap-1">
                                            Invoice
                                            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        <span class="flex gap-1">
                                            Transaksi
                                            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        <span class="flex gap-1">
                                            Harga
                                            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        <span class="flex gap-1">
                                            Status
                                            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                            </svg>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders->sortByDesc("created_at") as $order)
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <td class="px-6 py-4">
                                            {{ $order->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $order->invoice_number }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $order->product->name ?? $order->product->amount . ' ' . $order->product->category->name }}
                                            {{ $order->product->game->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp.{{ number_format($order->final_price, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($order->status == 'successful')
                                                <span
                                                    class="bg-green-50 border border-green-200 text-green-700 text-xs font-medium px-2 py-0.5 rounded-full">
                                                    {{ $order->status }}
                                                </span>
                                            @elseif($order->status == 'failed')
                                                <span
                                                    class="bg-red-50 border border-red-200 text-red-700 text-xs font-medium px-2 py-0.5 rounded-full">
                                                    {{ $order->status }}
                                                </span>
                                            @else
                                                <span
                                                    class="bg-yellow-50 border border-yellow-200 text-yellow-700 text-xs font-medium px-2 py-0.5 rounded-full">
                                                    {{ $order->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button id="{{ $order->id }}"
                                                data-dropdown-toggle="{{ $order->id }}-dropdown"
                                                class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="{{ $order->id }}-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm"
                                                    aria-labelledby="{{ $order->id }}-dropdown-button">
                                                    <li>
                                                        <a href="{{ route('history.detail', $order) }}"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                                viewbox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
                                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                            </svg>
                                                            Detail
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"
                                            class="text-center bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium py-3">
                                            Tidak ada data transaksi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @else
                        <div class="w-full text-center py-6">Belum ada riwayat transaksi</div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
