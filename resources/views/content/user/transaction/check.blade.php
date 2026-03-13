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
                                    Lacak pesanan kamu dengan nomor invoice!</span>
                                <div class="text-white/80 text-sm md:text-base mt-1">Pesanan kamu tidak terdaftar meskipun
                                    kamu yakin telah
                                    memesan? Harap tunggu 1–5 menit. Tetapi jika pesanan masih belum muncul, kamu bisa
                                    <a href="{{ route('message') }}" class="text-white underline">Hubungi Kami</a> .
                                </div>
                                <form action="{{ route('transaction.detail') }}" method="GET">
                                    @csrf
                                    <label for="invoice_number" class="block mb-2.5 text-sm font-medium text-white">Masukan
                                        nomor invoice kamu</label>
                                    <input type="text" name="invoice_number" id="invoice_number"
                                        class="
                                @error('invoice_number')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="INV-xxxxxxxxxx">
                                    @error('invoice_number')
                                        <p class="mt-2.5 text-sm text-fg-danger-strong">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <button type="submit"
                                        class="mt-6 text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cek
                                        Transaksi</button>
                                </form>
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
                        <h2 class="text-2xl font-semibold text-heading mb-2">10 Transaksi Terakhir</h2>
                        <p>Ini adalah 10 transaksi terakhir dari semua pengguna. Informasi yang tersedia mencakup tanggal
                            transaksi, kode invoice, nama layanan, harga, dan status.</p>
                    </div>
                </div>
                <div class="relative overflow-x-auto border border-default rounded-xl overflow-hidden">
                    <table class="w-full text-sm text-left rtl:text-right text-body">
                        <thead
                            class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    <span class="flex gap-1">
                                        Tanggal
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    <span class="flex gap-1">
                                        Invoice
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    <span class="flex gap-1">
                                        Transaksi
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    <span class="flex gap-1">
                                        Harga
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    <span class="flex gap-1">
                                        Status
                                    </span>
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
                                        {{ Str::mask($order->invoice_number, '*', 4, 12) }}
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
                </div>
            </div>
        </section>
    </div>
@endsection