@extends('layout.user')

@section('content')
    <section id="hero">
        <div style="background-image: url('{{ asset('assets/images/hero2.png') }}');" class="bg-cover bg-center">
            <div class="bg-gradient-to-t from-white via-white/30 to-white/20 w-full h-full">
                <div class="container mx-auto md:px-4 max-w-screen-xl">
                    <div class="md:p-20">
                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-base md:h-96">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                    <img src="{{ asset('assets/images/slider1.webp') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/images/slider2.webp') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/images/slider3.webp') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div
                                class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                <button type="button" class="w-3 h-3 rounded-base" aria-current="true" aria-label="Slide 1"
                                    data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-base" aria-current="false"
                                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-base" aria-current="false"
                                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <!-- Slider controls -->
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
                            {{-- <p class="text-body text-[0.625rem] md:text-sm">{{ $game->publisher }}</p> --}}
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
                <!-- Pricing Card -->
                @foreach ($memberships as $membership)
                    <div
                        class="flex flex-col flex flex-col h-full mx-auto max-w-lg text-center text-gray-900 bg-white overflow-hidden rounded-lg border border-gray-100 shadow dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        <div class="xl:p-8 p-6 flex flex-col flex-1">
                            <h3 class="mb-4 text-3xl font-semibold">{{ $membership->name }}</h3>
                            <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $membership->description }}
                            </p>
                            <div class="flex-1 flex flex-col justify-end">
                                <div class="flex justify-center items-baseline my-8">
                                    <span
                                        class="mr-2 text-5xl font-extrabold">Rp.{{ number_format($membership->price, 0, ',', '.') }}</span>
                                    <span class="text-gray-500 dark:text-gray-400">/bulan</span>
                                </div>
                                <a href="#"
                                    class="w-full text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Langganan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
