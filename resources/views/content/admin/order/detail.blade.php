@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14 flex justify-center">
        <div class="md:w-1/2 w-full bg-neutral-primary-soft shadow-xs roudend-lg border border-default">

            <div class="p-4 flex items-start justify-between space-x-4 border-b border-default">
                <span class="text-2xl font-semibold">Detail Pesanan</span>

                <a href="{{ route('admin.order.index') }}"
                    class="inline-flex items-center text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                    <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>

                    Kembali
                </a>
            </div>

            <div class="p-6">
                <div class="flex flex-col gap-5">
                    <div class="w-full flex justify-between border-b border-default pb-5">
                        <div class="">
                            <h2 class="text-sm font-semibold text-gray-500">Invoice Number</h2>
                            <span class="text-lg font-bold text-gray-900">{{ $order->invoice_number }}</span>
                        </div>
                        <div class="">
                            @if ($order->status == 'successful')
                                <span
                                    class="bg-green-50 border border-green-200 text-green-700 text-sm font-medium px-2 py-0.5 rounded-full">
                                    {{ $order->status }}
                                </span>
                            @elseif($order->status == 'failed')
                                <span
                                    class="bg-red-50 border border-red-200 text-red-700 text-sm font-medium px-2 py-0.5 rounded-full">
                                    {{ $order->status }}
                                </span>
                            @else
                                <span
                                    class="bg-yellow-50 border border-yellow-200 text-yellow-700 text-sm font-medium px-2 py-0.5 rounded-full">
                                    {{ $order->status }}
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="">
                        <div class="flex items-center justify-between gap-4 py-3">
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400">ID Bill</div>
                            <div class="text-base font-medium text-gray-900 dark:text-white">{{ $order->id_bill }}</div>
                        </div>
                        <div class="flex items-center justify-between gap-4 py-3">
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400">ID Akun Game</div>
                            <div class="text-base font-medium text-gray-900 dark:text-white">{{ $order->id_account }}</div>
                        </div>
                        <div class="flex items-center justify-between gap-4 py-3">
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400">Game</div>
                            <div class="text-base font-medium text-gray-900 dark:text-white">
                                {{ $order->product->game->name }}
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-4 py-3">
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400">Produk</div>
                            <div class="text-base font-medium text-gray-900 dark:text-white">{{ $order->product->name }}
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-4 py-3">
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400">Nama Pengguna</div>
                            <div class="text-base font-medium text-gray-900 dark:text-white">
                                {{ $order->user->name ?? '-' }}
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-4 py-3">
                            <div class="text-base font-normal text-gray-500 dark:text-gray-400">Nomor Telepon</div>
                            <div class="text-base font-medium text-gray-900 dark:text-white">{{ $order->no ?? '-' }}
                            </div>
                        </div>
                        <div class="bg-gray-50 md:mx-4 mx-2 mt-6 mb-4 rounded-lg px-4 py-2">
                            <div class="flex items-center justify-between gap-4 py-3">
                                <div class="text-base font-normal text-gray-500 dark:text-gray-400">Harga Produk</div>
                                <div class="text-base font-medium text-gray-900 dark:text-white">Rp.
                                    {{ number_format($order->product->price, 0, ',', '.') }}</div>
                            </div>
                            <div class="flex items-center justify-between gap-4 py-3">
                                <div class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah</div>
                                <div class="text-base font-medium text-gray-900 dark:text-white">×{{ $order->quantity }}
                                </div>
                            </div>
                            <div class="flex items-center justify-between gap-4 py-3 border-t border-default">
                                <div class="text-base font-bold text-gray-900 dark:text-white">Total Pembayaran</div>
                                <div class="text-base font-bold text-gray-900 dark:text-white">Rp.
                                    {{ number_format($order->final_price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
