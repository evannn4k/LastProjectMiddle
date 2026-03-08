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
                            <h5 class="text-xs md:text-lg font-semibold tracking-tight text-heading">{{ $game->name }}</h5>
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
@endsection
