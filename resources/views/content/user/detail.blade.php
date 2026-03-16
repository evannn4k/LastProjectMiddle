@extends('layout.user')

@section('content')
    <div class="flex-1">
        <header class="bg-cover bg-center" style="background-image: url('{{ asset('assets/images/hero.png') }}')">
            <div class="bg-black/60">
                <div class="container mx-auto px-4 max-w-screen-xl">
                    <div class="w-full flex flex-col md:flex-row justify-between md:items-center gap-6 py-8">
                        <div class="flex flex-col">
                            <span
                                class="flex items-center gap-1 text-white ps-3 pe-1 py-1 text-xs rounded-full border border-white/50 w-max">
                                Aman dan Terpercaya
                                <svg class="h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </span>
                            <span class="text-white text-4xl my-2 font-semibold">Top Up {{ $game->name }}</span>
                            <p class="text-white/80 text-sm mt-1">Transaksi cepat, aman, dan otomatis untuk semua pengguna
                                {{ $game->name }}.</p>
                            <p class="text-white/80 text-sm mt-1">Dapatkan dengan harga terbaik hanya di VanStore!</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('storage/images/game/' . $game->image) }}"
                                class="h-38 rounded-3xl shadow-xl p-2 bg-white/30 border border-white/50"
                                alt="{{ $game->name }}">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mx-auto md:px-4 max-w-screen-xl">
            <div class="grid grid-cols-1 md:grid-cols-3 items-start p-6 gap-6">
                <div class="p-6 rounded-2xl border border-default shadow-lg col-span-1 text-sm flex flex-col gap-4">
                    <div class="flex gap-4">
                        <img src="{{ asset('storage/images/game/' . $game->image) }}" class="h-24 rounded-xl shadow-xl"
                            alt="{{ $game->name }}">
                        <div class="flex flex-col gap-1">
                            <span class="text-xl font-semibold text-heading">{{ $game->name }}</span>
                            <table class="text-body text-sm">
                                <tr>
                                    <td class="pe-2">Penerbit</td>
                                    <td class="pe-2">: {{ $game->publisher }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-2">Region</td>
                                    <td class="pe-2">: {{ $game->region }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="border-default">
                    <p>{{ $game->description }}</p>
                    <p>Cara Top Up:</p>
                    <ol>
                        <li class="mb-2">1. Masukkan User ID / Game ID akun Anda.</li>
                        <li class="mb-2">2. Pilih nominal atau item yang ingin dibeli.</li>
                        <li class="mb-2">3. Pilih metode pembayaran yang tersedia.</li>
                        <li class="mb-2">4. Masukkan nomor WhatsApp aktif. (optional)</li>
                        <li class="mb-2">5. Selesaikan pembayaran, dan item akan dikirim otomatis ke akun Anda.</li>
                    </ol>
                    <p>Catatan:</p>
                    <p>Pastikan ID dan Server diisi dengan benar agar proses top up berjalan lancar.</p>
                    <p>Metode pembayaran yang tersedia meliputi QRIS, E-Wallet, Transfer Bank, pulsa, minimarket, dan metode
                        lainnya.</p>
                </div>
                <form action="{{ route('order') }}" method="POST" class="col-span-1 md:col-span-2">
                    <div class="flex flex-col gap-6 w-full">
                        @csrf
                        <div class="p-6 rounded-2xl border border-default shadow-lg flex flex-col">
                            <span class="text-heading font-bold text-lg pb-4">Masukan Data Akun Anda</span>
                            <div>
                                <label for="id_account" class="block mb-2.5 text-sm font-medium text-heading">ID</label>
                                <input type="number" id="id_account" name="id_account"
                                    class=" block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                            @error('id_account')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            "
                                    placeholder="Masukkan ID Akun" />
                                @error('id_account')
                                    <p class="mt-2.5 text-sm text-fg-danger-strong">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="p-6 rounded-2xl border border-default shadow-lg flex flex-col">
                            <span class="text-heading font-bold text-lg pb-4">Pilih Nominal Top Up</span>
                            <div class="flex flex-col gap-4">
                                @forelse ($categories->sortByDesc('priority') as $category)
                                    <span class="text-heading font-semibold text-sm">{{ $category->name }}</span>
                                    <ul class="select-none grid w-full gap-4 grid-cols-2 md:grid-cols-4">
                                        @foreach ($category->product as $product)
                                            <li class="h-full">
                                                <input type="radio" id="{{ $product->id }}" value="{{ $product->id }}"
                                                    name="product_id" class="hidden peer" required>
                                                <label data-price="Rp.{{ number_format($product->price, 0, ',', '.') }}"
                                                    data-discount="{{ $discount }}"
                                                    data-final-price="Rp.{{ number_format($product->price - ($product->price * $discount) / 100, 0, ',', '.') }}"
                                                    for="{{ $product->id }}"
                                                    class="product h-full inline-flex items-start justify-between w-full p-3 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer  peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                                                    <div class="w-full flex justify-between items-center gap-2">
                                                        <div class="">
                                                            <div class="w-full font-semibold text-sm text-dark mb-2">
                                                                @if ($product->name)
                                                                    {{ $product->name }}
                                                                @else
                                                                    {{ $product->amount }} {{ $product->category->name }}
                                                                @endif
                                                            </div>
                                                            <div class="w-full text-xs">Rp.
                                                                {{ number_format($product->price, 0, ',', '.') }}
                                                            </div>
                                                        </div>
                                                        @if (isset($product->image))
                                                            <img src="{{ asset('storage/images/product/' . $product->image) }}"
                                                                alt="..." class="w-8">
                                                        @else
                                                            <img src="{{ asset('storage/images/category/' . $product->category->default_image) }}"
                                                                alt="..." class="w-8">
                                                        @endif
                                                    </div>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                @empty
                                    <div class="w-full text-center">Belum ada produk</div>
                                @endforelse
                            </div>
                        </div>
                        <div class="p-6 rounded-2xl border border-default shadow-lg flex flex-col">
                            <span class="text-heading font-bold text-lg pb-4">Masukan Jumlah Total</span>
                            <div>
                                <label for="quantity" class="block mb-2.5 text-sm font-medium text-heading">Jumlah</label>
                                <input type="number" id="quantity" name="quantity" value="1"
                                    class=" block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                            @error('quantity')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            " />
                                @error('quantity')
                                    <p class="mt-2.5 text-sm text-fg-danger-strong">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="p-6 rounded-2xl border border-default shadow-lg flex flex-col">
                            <span class="text-heading font-bold text-lg pb-4">No. WhatsApp (optional)</span>
                            <div>
                                <label for="no" class="block mb-2.5 text-sm font-medium text-heading">Nomor</label>
                                <input type="number" id="no" name="no"
                                    class=" block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                            @error('no')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            "
                                    placeholder="Masukan nomor whatsapp anda" />
                                <label for="no" class="block mt-1 text-xs text-heading">Nomor ini akan dihubungi
                                    jika ada
                                    masalah</label>
                                @error('no')
                                    <p class="mt-2.5 text-sm text-fg-danger-strong">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="hidden sticky bottom-0 pb-3" id="order_summary">
                            <div class="p-4 bg-white flex justify-between items-center shadow-2xl border border-default rounded-lg">
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-2 hidden" id="discount_container">
                                        <span class="font-base text-sm line-through text-gray-500" id="real_price">
                                        </span>
                                        <span
                                            class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded-full"
                                            id="discount"></span>
                                    </div>
                                    <span class="font-bold text-xl text-red-600" id="final_price">
                                    </span>
                                </div>
                                <button type="submit"
                                    class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-full text-sm px-4 py-2.5 focus:outline-none flex justify-center items-center gap-2"><svg
                                        class="" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                    </svg>
                                    Beli
                                    Sekarang</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener("click", function(e) {
            const button = e.target.closest(".product");
            if (!button) return;

            document.getElementById("order_summary").classList.remove("hidden");

            console.log(button.dataset.discount);

            if (button.dataset.discount > 0) {
                document.getElementById("discount_container").classList.remove("hidden");
            }
            document.getElementById("discount").textContent = `${button.dataset.discount}%`;
            document.getElementById("real_price").textContent = button.dataset.price;
            document.getElementById("final_price").textContent = button.dataset.finalPrice;

        });
    </script>
@endpush
