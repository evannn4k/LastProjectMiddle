@extends('layout.user')

@section('content')
    <section id="hero">
        <div style="background-image: url('{{ asset('assets/images/hero2.png') }}');" class="bg-cover bg-center">
            <div class="bg-gradient-to-t from-white via-white/30 to-white/20 w-full h-full">
                <div class="container mx-auto md:px-4 max-w-screen-xl">
                    <div class="md:p-20">
                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                            <div class="relative h-56 overflow-hidden rounded-base md:h-96">
                                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                    <img src="{{ asset('assets/images/slider1.webp') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/images/slider2.webp') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/images/slider3.webp') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <div
                                class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                <button type="button" class="w-3 h-3 rounded-base" aria-current="true" aria-label="Slide 1"
                                    data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-base" aria-current="false"
                                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-base" aria-current="false"
                                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m15 19-7-7 7-7" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m9 5 7 7-7 7" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="product">
        <div class="container mx-auto px-4 max-w-screen-xl pb-10">
            <h2 class="text-2xl font-semibold text-heading mb-6">Game Populer 🔥</h2>
            <div class="grid grid-cols-3 lg:grid-cols-5 gap-3 md:gap-5">
                @forelse ($games as $game)
                    <a href="{{ route('game.detail', $game->slug) }}"
                        class="group bg-neutral-primary-soft block max-w-sm border border-default rounded-base overflow-hidden shadow-md md:shadow-lg hover:scale-102 hover:shadow-xl transition duration-300">
                        <div class="w-full h-30 md:h-54 bg-cover bg-center group-hover:scale-102 transition duration-350"
                            style="background-image: url('{{ asset("storage/images/game/$game->image") }}');">
                        </div>
                        <div class="px-2 py-1 flex flex-col items-center">
                            <h5 class="text-xs md:text-lg font-semibold tracking-tight text-heading">{{ $game->name }}
                            </h5>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-10">
                        Belum ada game yang tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Pilih Paket Membership
                    Anda</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Temukan paket yang paling sesuai
                    dengan kebutuhan Anda. Setiap membership memberikan fitur dan keuntungan berbeda untuk mendukung
                    aktivitas Anda.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                @foreach ($memberships->sortBy('price') as $membership)
                    <div
                        class="flex flex-col flex flex-col h-full mx-auto max-w-lg text-center text-gray-900 bg-white overflow-hidden rounded-lg border border-gray-100 shadow dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        <div class="xl:p-8 p-6 flex flex-col flex-1">
                            <h3 class="mb-4 text-3xl font-semibold">{{ $membership->name }}</h3>
                            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $membership->description }}
                            </p>
                            <div class="flex-1 flex flex-col justify-end">
                                <div class="flex justify-center items-baseline my-8">
                                    <span
                                        class="mr-2 text-4xl font-extrabold">Rp.{{ number_format($membership->price, 0, ',', '.') }}</span>
                                    <span class="text-gray-500 dark:text-gray-400">/{{ $membership->duration }} hari</span>
                                </div>
                                <button data-membership-id="{{ $membership->id }}"
                                    data-membership-name="{{ $membership->name }}"
                                    data-membership-price="Rp.{{ number_format($membership->price, 0, ',', '.') }}"
                                    data-membership-description="{{ $membership->description }}"
                                    data-membership-discount="{{ $membership->discount }}"
                                    data-membership-duration="{{ $membership->duration }}"
                                    data-modal-target="membership-modal" data-modal-toggle="membership-modal"
                                    class="membership w-full text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Langganan</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div id="membership-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Membership
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="membership-modal">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="space-y-4 md:space-y-6 py-4 md:py-6">
                    <h5 class="text-2xl font-medium text-heading text-center" id="membership-name">
                    </h5>
                    <div class="w-full flex items-center flex-col p-6 rounded-lg">
                        <p class="leading-relaxed text-body">
                            Hanya dengan
                        </p>
                        <div class="space-y-1">
                            <span class="text-5xl font-bold text-heading" id="membership-price">
                            </span>
                            <span class="leading-relaxed text-body" id="membership-duration"></span>
                        </div>
                    </div>
                    <div class="bg-green-100 border border-green-500 text-green-600 rounded-lg p-4">
                        <p class="leading-relaxed text-body" id="membership-discount">
                        </p>
                    </div>
                    <div class="space-y-2">
                        <p class="font-medium text-gray-400">
                            Deskripsi layanan
                        </p>
                        <p class="leading-relaxed text-body" id="membership-description">
                            Paket membership 3 bulan dengan harga paling hemat. Ideal bagi pengguna yang ingin menggunakan
                            layanan lebih lama dengan biaya lebih efisien.
                        </p>
                    </div>
                </div>
                <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                    @if (Auth::guard('user')->check())
                        @if ($user->subscription && $user->subscription->status == 'successful')
                            <div class="w-full flex items-center justify-center">
                                <p class="leading-relaxed text-body">
                                    Anda sudah menjadi member
                                </p>
                            </div>
                        @else
                            <form action="{{ route('membership.buy') }}" method="POST">
                                @csrf
                                <input type="hidden" name="membership_id" id="membership-id">
                                <button type="submit"
                                    class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Konfirmasi
                                    Pembelian</button>
                            </form>
                            <button data-modal-hide="membership-modal" type="button"
                                class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Batal</button>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Silahkan
                            login terlebih dahulu</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("click", function(e) {
            const button = e.target.closest(".membership");
            if (!button) return;

            let membershipId = document.getElementById("membership-id");
            if (membershipId) {
                membershipId.value = button.dataset.membershipId;
            };

            document.getElementById("membership-name").textContent = button.dataset.membershipName;
            document.getElementById("membership-price").textContent = button.dataset.membershipPrice;
            document.getElementById("membership-description").textContent = button.dataset
                .membershipDescription;
            document.getElementById("membership-discount").textContent =
                `Anda mendapatkan benefit potongan harga sampai dengan ${button.dataset.membershipDiscount}%`;
            document.getElementById("membership-duration").textContent =
                `/${button.dataset.membershipDuration} hari`;
        });
    </script>
@endpush
