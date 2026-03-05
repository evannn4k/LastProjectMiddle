@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4 flex items-start justify-between space-x-4 border-b border-default">
                <div class="flex flex-col">
                    <span class="text-2xl font-semibold">Tabel game</span>
                    <span class="text-sm">Halaman untuk mengelola data game</span>
                </div>

                <button type="button" data-modal-target="create" data-modal-toggle="create"
                    class="inline-flex items-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                    <svg class="w-4 h-4 me-1.5 -ms-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    Tambah Game
                </button>

            </div>
            <div class="relative overflow-x-hidden p-4">
                <table id="main-table" class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
                        <tr>
                            <th scope="col" class="p-4">
                                <span class="flex gap-1">
                                    #
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>

                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Gambar
                                </span>

                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Nama
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>

                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Region
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>

                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Publisher
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>

                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Ditambahkan Pada
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>

                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Aktif
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>

                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($games->sortByDesc("created_at") as $game)
                            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                <td class="w-4 p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/images/game/' . $game->image) }}"
                                        alt="{{ $game->name }}" class="max-h-10 object-cover rounded">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $game->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $game->region }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $game->publisher }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $game->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4">
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
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button id="{{ $game->id }}" data-dropdown-toggle="{{ $game->id }}-dropdown"
                                        class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{ $game->id }}-dropdown"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm" aria-labelledby="{{ $game->id }}-dropdown-button">
                                            <li>
                                                <button type="button" data-id="{{ $game->id }}"
                                                    data-name="{{ $game->name }}" data-region="{{ $game->region }}"
                                                    data-publisher="{{ $game->publisher }}"
                                                    data-is_active="{{ $game->is_active }}"
                                                    data-description="{{ $game->description }}"
                                                    data-modal-target="update" data-modal-toggle="update"
                                                    class="update flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
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
                                                <a href="{{ route('admin.game.show', $game) }}"
                                                    class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                    </svg>
                                                    Preview
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('admin.game.destroy', $game) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                        <svg class="w-4 h-4 mr-2" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                        </svg>
                                                        Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="text-center bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium py-3">
                                    Tidak ada data game</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- create modal --}}
    <div id="create" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Tambah game
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="create">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.game.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

                        <div class="col-span-2 md:col-span-1">
                            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nama Game</label>
                            <input type="text" name="name" id="name"
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
                            <label for="region" class="block mb-2.5 text-sm font-medium text-heading">Wilayah</label>
                            <input type="text" name="region" id="region"
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
                            <label for="publisher" class="block mb-2.5 text-sm font-medium text-heading">Penerbit</label>
                            <input type="text" name="publisher" id="publisher"
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
                            <label for="is_active" class="block mb-2.5 text-sm font-medium text-heading">Status</label>
                            <div class="grid gap-2 grid-cols-2">

                                <div
                                    class="block w-full px-3 py-2.5 
                                @error('is_active')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                @enderror
                                px-3 py-2.5 shadow-xs placeholder:text-body">
                                    <input id="active" name="is_active" type="radio" value="1"
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
                                    <input id="non_active" name="is_active" type="radio" value="0"
                                        name="bordered-radio"
                                        class="w-4 h-4 text-neutral-primary border-default-medium bg-neutral-secondary-medium rounded-full checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border border-default appearance-none">
                                    <label for="non_active"
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
                            <label for="description"
                                class="block mb-2.5 text-sm font-medium text-heading">Deskripsi</label>
                            <textarea name="description" id="description" rows="4"
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
                            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Gambar</label>

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
                            Tambah game
                        </button>
                        <button data-modal-hide="create" type="button"
                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- update modal --}}
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
                                <label for="image_update"
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
                                    <input id="image_update" name="image" type="file" class="hidden" />
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
    </script>
@endpush
