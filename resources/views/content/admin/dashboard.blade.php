@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="p-4 border-1 border-default rounded-base">
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div
                    class="col-span-3 md:col-span-1 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 dark:bg-blue-800">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                        </svg>

                    </div>

                    <div class="mt-5">
                        <span class="text-sm md:text-lg text-gray-500 dark:text-gray-400">Jumlah Transaksi</span>
                        <h4 class="mt-2 md:text-2xl text-title-sm font-bold text-gray-800 dark:text-white/90">
                            Rp. {{ number_format($amountTransaction, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
                <div
                    class="col-span-3 md:col-span-1 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 dark:bg-yellow-800">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                        </svg>
                    </div>

                    <div class="mt-5">
                        <span class="text-sm md:text-lg text-gray-500 dark:text-gray-400">Transaksi Hari Ini</span>
                        <h4 class="mt-2 md:text-2xl text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $totalTransactionToday }}
                        </h4>
                    </div>
                </div>
                <div
                    class="col-span-3 md:col-span-1 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 dark:bg-green-800">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                        </svg>
                    </div>

                    <div class="mt-5">
                        <span class="text-sm md:text-lg text-gray-500 dark:text-gray-400">Transaksi Bulan Ini</span>
                        <h4 class="mt-2 md:text-2xl text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $totalTransactionThisMonth }}
                        </h4>
                    </div>
                </div>
                <div
                    class="col-span-3 md:col-span-1 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 dark:bg-yellow-800">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </div>

                    <div class="mt-5">
                        <span class="text-sm md:text-lg text-gray-500 dark:text-gray-400">Total Transakasi</span>
                        <h4 class="mt-2 md:text-2xl text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $totalTransaction }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center rounded-base bg-white mb-4">
                <div class="container mx-auto px-4 max-w-screen-xl pb-20">
                    <div class="grid grid-cols-3 py-10">
                        <div class="col-span-3 md:col-span-2">
                            <h2 class="text-2xl font-semibold text-heading mb-2">10 Transaksi Terakhir</h2>
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
                                                <svg class="w-4 h-4 ml-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-medium">
                                            <span class="flex gap-1">
                                                Invoice
                                                <svg class="w-4 h-4 ml-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-medium">
                                            <span class="flex gap-1">
                                                Transaksi
                                                <svg class="w-4 h-4 ml-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-medium">
                                            <span class="flex gap-1">
                                                Harga
                                                <svg class="w-4 h-4 ml-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                </svg>
                                            </span>
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-medium">
                                            <span class="flex gap-1">
                                                Status
                                                <svg class="w-4 h-4 ml-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4" />
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
                                            <td class="px-6 py-4">
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
                                                            <a href="{{ route('admin.order.show', $order) }}"
                                                                class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                                <svg class="w-4 h-4 mr-2"
                                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                                </svg>
                                                                Preview
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
            </div>
        </div>
    </div>
@endsection
