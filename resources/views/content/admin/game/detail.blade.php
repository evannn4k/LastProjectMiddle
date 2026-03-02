@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14 flex flex-col gap-4">
        <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4 flex items-start justify-between space-x-4 border-b border-default">
                <div class="flex flex-col">
                    <span class="text-2xl font-semibold">Detail Game</span>
                    <span class="text-sm">{{ $game->name }}</span>
                </div>

                <a href="{{ route('admin.game.index') }}"
                    class="inline-flex items-center text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                    <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>

                    Kembali
                </a>
            </div>
            <div class="p-4">
@if ($errors->any())
    <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">
        <ul class="list-disc ps-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <img src="{{ asset('storage/images/game/' . $game->image) }}" alt="{{ $game->name }}"
                            class="w-full h-auto rounded-base">
                    </div>
                    <div class="col-span-3 md:col-span-2 flex flex-col gap-4">
                        <h2 class="mb-2 text-xl font-semibold text-gray-900 md:text-2xl dark:text-white">{{ $game->name }}
                        </h2>
                        <div class="">
                            <div class="mb-2 font-semibold text-gray-900 dark:text-white">Detail</div>
                            <div
                                class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                                <table class="w-full text-sm text-left rtl:text-right text-body">
                                    <tbody>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Nama game
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $game->name }}
                                            </td>
                                        </tr>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Wilayah
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $game->region }}
                                            </td>
                                        </tr>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Penerbit
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $game->publisher }}
                                            </td>
                                        </tr>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Status
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4 flex gap-2">
                                                <form action="{{ route('admin.game.status', $game) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <label class="inline-flex items-center cursor-pointer">
                                                        <input type="checkbox" class="sr-only peer"
                                                            {{ $game->is_active == true ? 'checked' : '' }}>
                                                        <button type="submit"
                                                            class="relative w-9 h-5 bg-neutral-quaternary peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-soft dark:peer-focus:ring-brand-soft rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-buffer after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand">
                                                        </button>
                                                    </label>
                                                </form>

                                                <div class="">
                                                    @if ($game->is_active == true)
                                                        <span
                                                            class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded-full">Aktif</span>
                                                    @else
                                                        <span
                                                            class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded-full">Nonaktif</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Di tambahkan pada
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $game->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2 font-semibold text-gray-900 dark:text-white">Deskripsi</div>
                            <div class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $game->description }}
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" data-id="{{ $game->id }}" data-name="{{ $game->name }}"
                            data-region="{{ $game->region }}" data-publisher="{{ $game->publisher }}"
                            data-is_active="{{ $game->is_active }}" data-description="{{ $game->description }}"
                            data-modal-target="update" data-modal-toggle="update"
                            class="inline-flex items-center gap-2 text-white bg-success box-border border border-transparent hover:bg-success-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none update">
                            <svg class="w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                            </svg>
                            Edit</button>

                        <form action="{{ route('admin.game.destroy', $game) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button
                                class="inline-flex items-center gap-2 text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                <svg class="w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                                Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4">
                <div class="p-4 flex items-start justify-between space-x-4 border-b border-default mb-4">
                    <div class="flex flex-col">
                        <span class="text-2xl font-semibold">Produk Game {{ $game->name }}</span>
                    </div>

                    <button type="button" data-modal-target="createProduct" data-modal-toggle="createProduct"
                        class="inline-flex items-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        <svg class="w-4 h-4 me-1.5 -ms-0.5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                        Tambah Produk
                    </button>
                </div>
                <ul class="select-none grid w-full gap-4 grid-cols-2 md:grid-cols-4">
                    @forelse ($game->product as $product)
                        <li>
                            <label for="react-option"
                                class="inline-flex items-center justify-between w-full p-3 text-body bg-neutral-primary-soft border-1 border-default rounded-base cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-neutral-secondary-medium peer-checked:text-fg-brand-strong">
                                <div class="w-full flex justify-between items-center gap-2">
                                    <div class="">
                                        <div class="w-full font-semibold text-sm text-dark mb-2">
                                            @if ($product->name)
                                                {{ $product->name }}
                                            @else
                                                {{ $product->amount }} {{ $product->category->name }}
                                            @endif
                                        </div>
                                        <div class="w-full text-xs">Rp. {{ number_format($product->price, 0, ',', '.') }}
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
                                <button id="{{ $product->id }}" data-dropdown-toggle="{{ $product->id }}-dropdown"
                                    class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $product->id }}-dropdown"
                                    class="ms-2 hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm" aria-labelledby="{{ $product->id }}-dropdown-button">
                                        <li>
                                            <button type="button" data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" data-amount="{{ $product->amount }}"
                                                data-price="{{ $product->price }}"
                                                data-is_active="{{ $product->is_active }}"
                                                data-stock="{{ $product->stock }}"
                                                data-category_id="{{ $product->category_id }}"
                                                data-modal-target="updateProduct" data-modal-toggle="updateProduct"
                                                class="updateProduct flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                <svg class="w-4 h-4 mr-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                                Edit</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                data-name="{{ $product->name ?: $product->amount . ' ' . $product->category->name }}"
                                                data-amount="{{ $product->amount }}"
                                                data-price="Rp. {{ number_format($product->price, 0, ',', '.') }}"
                                                data-is_active="{{ $product->is_active }}"
                                                data-stock="{{ $product->stock }}"
                                                data-category="{{ $product->category->name }}"
                                                data-image="
                                                @if (isset($product->image)) 
                                                    {{ asset('storage/images/product/' . $product->image) }} 
                                                @else
                                                    {{ asset('storage/images/category/' . $product->category->default_image) }} 
                                                @endif
                                                "
                                                data-created_at="{{ $product->created_at->diffForHumans() }}"
                                                data-modal-target="preview" data-modal-toggle="preview"
                                                class="preview flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                                Preview
                                            </button>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                    <svg class="w-4 h-4 mr-2" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>
                                                    Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </label>
                        </li>
                    @empty
                        <li class="w-full text-center">
                            Belum ada produk
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    {{-- detail produk --}}
    <div id="preview" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Detail produk
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="preview">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <img src="" alt="" class="preview-image h-24 object-cover rounded-base my-4">
                <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                    <table class="w-full text-sm text-left rtl:text-right text-body">
                        <tbody>
                            <tr class="bg-neutral-primary border-b border-default">
                                <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    Nama game
                                </td>
                                <td class="py-4" style="width: 10px">
                                    :
                                </td>
                                <td class="px-6 py-4">
                                    <div class="preview-name"></div>
                                </td>
                            </tr>
                            <tr class="bg-neutral-primary border-b border-default">
                                <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    Kategori
                                </td>
                                <td class="py-4" style="width: 10px">
                                    :
                                </td>
                                <td class="px-6 py-4">
                                    <div class="preview-category"></div>
                                </td>
                            </tr>
                            <tr class="bg-neutral-primary border-b border-default">
                                <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    Jumlah
                                </td>
                                <td class="py-4" style="width: 10px">
                                    :
                                </td>
                                <td class="px-6 py-4">
                                    <div class="preview-amount"></div>
                                </td>
                            </tr>
                            <tr class="bg-neutral-primary border-b border-default">
                                <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    Harga
                                </td>
                                <td class="py-4" style="width: 10px">
                                    :
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <div class="preview-price"></div>
                                </td>
                            </tr>
                            <tr class="bg-neutral-primary border-b border-default">
                                <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    Stock
                                </td>
                                <td class="py-4" style="width: 10px">
                                    :
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <div class="preview-stock"></div>
                                </td>
                            </tr>
                            <tr class="bg-neutral-primary border-b border-default">
                                <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    Status
                                </td>
                                <td class="py-4" style="width: 10px">
                                    :
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <div class="preview-status"></div>
                                </td>
                            </tr>
                            <tr class="bg-neutral-primary border-b border-default">
                                <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    Di tambahkan pada
                                </td>
                                <td class="py-4" style="width: 10px">
                                    :
                                </td>
                                <td class="px-6 py-4">
                                    <div class="preview-created_at"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- tambah produk --}}
    <div id="createProduct" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Tambah produk
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="createProduct">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                        <div class="col-span-2 md:col-span-1">
                            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nama</label>
                            <input type="text" name="name" id="name"
                                class="
                            @error('name')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="nama kategori">
                            @error('name')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                            <label for="name" class="block mt-1 text-xs text-heading">Jika tidak diisi maka
                                akan berformat (jumlah + kategori)</label>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <label for="amount" class="block mb-2.5 text-sm font-medium text-heading">Jumlah
                                produk</label>
                            <input type="text" name="amount" id="amount"
                                class="
                                @error('amount')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="jumlah produk">
                            @error('amount')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="price" class="block mb-2.5 text-sm font-medium text-heading">Harga
                                produk</label>
                            <input type="number" name="price" id="price"
                                class="
                                @error('price')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                                w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Rp. 0">
                            @error('price')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="stock" class="block mb-2.5 text-sm font-medium text-heading">Stok</label>
                            <input type="number" name="stock" id="stock"
                                class="
                                @error('stock')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="0">
                            @error('stock')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="is_active_update"
                                class="block mb-2.5 text-sm font-medium text-heading">Status</label>
                            <div class="grid gap-2 grid-cols-2">

                                <div
                                    class="block w-full px-3 py-2.5 
                                    @error('is_active')
                                    bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                    @else
                                    bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                    @enderror
                                    px-3 py-2.5 shadow-xs placeholder:text-body">
                                    <input id="active_update" name="is_active" type="radio" value="1"
                                        name="bordered-radio"
                                        class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
                                    <label for="active"
                                        class="w-full py-4 select-none ms-2 text-sm font-medium text-heading">Aktif</label>
                                </div>
                                <div
                                    class="block w-full px-3 py-2.5 
                                    @error('is_active')
                                    bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                    @else
                                    bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                    @enderror
                                    px-3 py-2.5 shadow-xs placeholder:text-body">
                                    <input id="non_active_update" name="is_active" type="radio" value="0"
                                        name="bordered-radio"
                                        class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
                                    <label for="non_active_update"
                                        class="w-full py-4 select-none ms-2 text-sm font-medium text-heading">Tidak
                                        Aktif</label>
                                </div>
                            </div>

                            @error('is_active')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="category_id"
                                class="block mb-2.5 text-sm font-medium text-heading">Kategori</label>

                            <select name="category_id" id="category_id"
                                class="
                            block w-full px-3 py-2.5 
                            @error('category_id')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                            ">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Gambar</label>
                            <label for="image" class="block mb-2.5 text-xs text-heading">Jika tidak diisi maka akan
                                mengambil gambar dari kategori</label>

                            <div class="flex items-center justify-center w-full">
                                <label for="image"
                                    class="flex flex-col items-center justify-center w-full h-64 @error('image')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror">
                                    <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm"><span class="font-semibold">Click to upload</span> or drag
                                            and drop</p>
                                        <p class="text-xs">jepg,jpg,png,jfif,webp,gif,svg (MAX. 2040kb)</p>
                                    </div>
                                    <input id="image" name="image" type="file" class="hidden" />
                                </label>
                            </div>
                            @error('image')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                        <button type="submit"
                            class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 0 1 1-1h11.586a1 1 0 0 1 .707.293l2.414 2.414a1 1 0 0 1 .293.707V19a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Z" />
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M8 4h8v4H8V4Zm7 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Simpan perubahan
                        </button>
                        <button data-modal-hide="createProduct" type="button"
                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit produk --}}
    <div id="updateProduct" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Edit produk
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="updateProduct">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form id="updateProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                        <div class="col-span-2 md:col-span-1">
                            <label for="name_update" class="block mb-2.5 text-sm font-medium text-heading">Nama</label>
                            <input type="text" name="name" id="name_update"
                                class="
                            @error('name')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="nama kategori">
                            @error('name')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                            <label for="name" class="block mt-1 text-xs text-heading">Jika tidak diisi maka
                                akan berformat (jumlah + kategori)</label>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <label for="amount_update" class="block mb-2.5 text-sm font-medium text-heading">Jumlah
                                produk</label>
                            <input type="text" name="amount" id="amount_update"
                                class="
                                @error('amount')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="jumlah produk">
                            @error('amount')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="price_update" class="block mb-2.5 text-sm font-medium text-heading">Harga
                                produk</label>
                            <input type="number" name="price" id="price_update"
                                class="
                                @error('price')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                                w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Rp. 0">
                            @error('price')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="stock_update" class="block mb-2.5 text-sm font-medium text-heading">Stok</label>
                            <input type="number" name="stock" id="stock_update"
                                class="
                                @error('stock')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="0">
                            @error('stock')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="is_active_update"
                                class="block mb-2.5 text-sm font-medium text-heading">Status</label>
                            <div class="grid gap-2 grid-cols-2">

                                <div
                                    class="block w-full px-3 py-2.5 
                                    @error('is_active')
                                    bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                    @else
                                    bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                    @enderror
                                    px-3 py-2.5 shadow-xs placeholder:text-body">
                                    <input id="active_update_product" name="is_active" type="radio" value="1"
                                        class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
                                    <label for="active_update_product"
                                        class="w-full py-4 select-none ms-2 text-sm font-medium text-heading">Aktif</label>
                                </div>
                                <div
                                    class="block w-full px-3 py-2.5 
                                    @error('is_active')
                                    bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                    @else
                                    bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                    @enderror
                                    px-3 py-2.5 shadow-xs placeholder:text-body">
                                    <input id="non_active_update_product" name="is_active" type="radio" value="0"
                                        name="bordered-radio"
                                        class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
                                    <label for="non_active_update_product"
                                        class="w-full py-4 select-none ms-2 text-sm font-medium text-heading">Tidak
                                        Aktif</label>
                                </div>
                            </div>

                            @error('is_active')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="category_id"
                                class="block mb-2.5 text-sm font-medium text-heading">Kategori</label>

                            <select name="category_id" id="category_id"
                                class="
                            block w-full px-3 py-2.5 
                            @error('category_id')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                            ">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" class="option_category">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Ganti
                                Gambar</label>
                            <label for="image" class="block mb-2.5 text-xs text-heading">Jika tidak diisi maka akan
                                mengambil gambar dari kategori</label>

                            <div class="flex items-center justify-center w-full">
                                <label for="image"
                                    class="flex flex-col items-center justify-center w-full h-64 @error('image')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror">
                                    <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm"><span class="font-semibold">Click to upload</span> or drag
                                            and drop</p>
                                        <p class="text-xs">jepg,jpg,png,jfif,webp,gif,svg (MAX. 2040kb)</p>
                                    </div>
                                    <input id="image" name="image" type="file" class="hidden" />
                                </label>
                            </div>
                            @error('image')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                        <button type="submit"
                            class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 0 1 1-1h11.586a1 1 0 0 1 .707.293l2.414 2.414a1 1 0 0 1 .293.707V19a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Z" />
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M8 4h8v4H8V4Zm7 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Simpan perubahan
                        </button>
                        <button data-modal-hide="updateProduct" type="button"
                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- update game --}}
    <div id="update" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Edit game
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="update">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="formUpdate">
                    @csrf
                    @method('put')
                    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

                        <div class="col-span-2 md:col-span-1">
                            <label for="name_update" class="block mb-2.5 text-sm font-medium text-heading">Nama
                                Game</label>
                            <input type="text" name="name" id="name_update"
                                class="
                                @error('name')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="nama game">
                            @error('name')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="region_update"
                                class="block mb-2.5 text-sm font-medium text-heading">Wilayah</label>
                            <input type="text" name="region" id="region_update"
                                class="
                                @error('region')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                                w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="wilayah game">
                            @error('region')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="publisher_update"
                                class="block mb-2.5 text-sm font-medium text-heading">Penerbit</label>
                            <input type="text" name="publisher" id="publisher_update"
                                class="
                            @error('publisher')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="penerbit game">
                            @error('publisher')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="is_active_update"
                                class="block mb-2.5 text-sm font-medium text-heading">Status</label>
                            <div class="grid gap-2 grid-cols-2">

                                <div
                                    class="block w-full px-3 py-2.5 
                                @error('is_active')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                @enderror
                                px-3 py-2.5 shadow-xs placeholder:text-body">
                                    <input id="active_update" name="is_active" type="radio" value="1"
                                        name="bordered-radio"
                                        class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
                                    <label for="active"
                                        class="w-full py-4 select-none ms-2 text-sm font-medium text-heading">Aktif</label>
                                </div>
                                <div
                                    class="block w-full px-3 py-2.5 
                            @error('is_active')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            px-3 py-2.5 shadow-xs placeholder:text-body">
                                    <input id="non_active_update" name="is_active" type="radio" value="0"
                                        name="bordered-radio"
                                        class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
                                    <label for="non_active_update"
                                        class="w-full py-4 select-none ms-2 text-sm font-medium text-heading">Tidak
                                        Aktif</label>
                                </div>
                            </div>

                            @error('is_active')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="description_update"
                                class="block mb-2.5 text-sm font-medium text-heading">Deskripsi</label>
                            <textarea name="description" id="description_update" rows="4"
                                class="@error('description')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="deskripsi game"></textarea>
                            @error('description')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Ganti
                                Gambar</label>

                            <div class="flex items-center justify-center w-full">
                                <label for="image"
                                    class="flex flex-col items-center justify-center w-full h-64 @error('image')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror">
                                    <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm"><span class="font-semibold">Click to upload</span> or drag
                                            and drop</p>
                                        <p class="text-xs">jepg,jpg,png,jfif,webp,gif,svg (MAX. 2040kb)</p>
                                    </div>
                                    <input id="image" name="image" type="file" class="hidden" />
                                </label>
                            </div>
                            @error('image')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                        <button type="submit"
                            class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 0 1 1-1h11.586a1 1 0 0 1 .707.293l2.414 2.414a1 1 0 0 1 .293.707V19a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Z" />
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M8 4h8v4H8V4Zm7 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Simpan perubahan
                        </button>
                        <button data-modal-hide="update" type="button"
                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("click", function(e) {
            const btn = e.target.closest(".update");
            if (!btn) return;

            document.getElementById("name_update").value = btn.dataset.name;
            document.getElementById("region_update").value = btn.dataset.region;
            document.getElementById("publisher_update").value = btn.dataset.publisher;
            document.getElementById("description_update").value = btn.dataset.description;

            if (btn.dataset.is_active === "1") {
                document.getElementById("active_update").checked = true;
            } else {
                document.getElementById("non_active_update").checked = true;
            }

            document.getElementById("formUpdate").action = `/admin/game/${btn.dataset.id}`;
        });

        document.addEventListener("click", function(e) {
            const btn = e.target.closest(".updateProduct");
            if (!btn) return;

            document.getElementById("name_update").value = btn.dataset.name;
            document.getElementById("amount_update").value = btn.dataset.amount;
            document.getElementById("price_update").value = btn.dataset.price;
            document.getElementById("stock_update").value = btn.dataset.stock;

            document.querySelectorAll(".option_category").forEach(option => {
                if (option.value === btn.dataset.category_id) {
                    option.selected = true;
                } else {
                    option.selected = false;
                }
            });

            if (btn.dataset.is_active === "1") {
                document.getElementById("active_update_product").checked = true;
            } else {
                document.getElementById("non_active_update_product").checked = true;
            }

            document.getElementById("updateProductForm").action = `/admin/product/${btn.dataset.id}`;
        });

        document.addEventListener("click", function(e) {
            const btn = e.target.closest(".preview");
            if (!btn) return;

            document.querySelector(".preview-image").src = btn.dataset.image;
            document.querySelector(".preview-name").textContent = btn.dataset.name;
            document.querySelector(".preview-category").textContent = btn.dataset.category;
            document.querySelector(".preview-amount").textContent = btn.dataset.amount;
            document.querySelector(".preview-price").textContent = btn.dataset.price;
            document.querySelector(".preview-stock").textContent = btn.dataset.stock;
            document.querySelector(".preview-status").textContent = btn.dataset.is_active === "1" ? "Aktif" :
                "Non-Aktif";
            document.querySelector(".preview-created_at").textContent = btn.dataset.created_at;

        });
    </script>
@endpush
