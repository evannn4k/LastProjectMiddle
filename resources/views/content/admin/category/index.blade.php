@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4 flex items-start justify-between space-x-4 border-b border-default">
                <div class="flex flex-col">
                    <span class="text-2xl font-semibold">Tabel Kategori</span>
                    <span class="text-sm">Halaman untuk mengelola data kategori</span>
                </div>

                <button type="button" data-modal-target="create" data-modal-toggle="create"
                    class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                    <svg class="w-4 h-4 me-1.5 -ms-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    Tambah Kategori
                </button>
            </div>

            <div class="relative overflow-x-auto p-4">
                <table id="main-table" class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
                        <tr>
                            <th scope="col" class="p-4">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Prioritas
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Ditambahkan Pada
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories->sortByDesc("created_at") as $category)
                            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                <td class="w-4 p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="w-4 p-4">
                                    <img src="{{ asset("storage/images/category/$category->default_image") }}"
                                        alt="{{ $category->name }}" class="max-h-8">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($category->priority == true)
                                    <span class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded-full">Prioritas</span>
                                    @else
                                    <span class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded-full">Bukan Prioritas</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">

                                        <button type="button" data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}" data-priority="{{ $category->priority }}" data-modal-target="update"
                                            data-modal-toggle="update"
                                            class="font-medium text-green-600 hover:underline flex items-center update">
                                            <svg class="w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                            Edit</button>

                                        <form action="{{ route('admin.category.destroy', $category) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="font-medium text-red-600 hover:underline flex items-center update">
                                                <svg class="w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                                Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="text-center bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium py-3">
                                    Tidak ada data kategori</td>
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
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Tambah kategori
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="create">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

                        <div class="col-span-2">
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
                        </div>

                        <div class="col-span-2">
                            <label for="default_image"
                                class="block mb-2.5 text-sm font-medium text-heading">Gambar</label>

                            <div class="flex items-center justify-center w-full">
                                <label for="default_image"
                                    class="flex flex-col items-center justify-center w-full h-64 @error('default_image')
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
                                    <input id="default_image" name="default_image" type="file" class="hidden" />
                                </label>
                            </div>
                            @error('default_image')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 ">
                            <label for="priority" class="block mb-2.5 text-sm font-medium text-heading">Prioritas</label>
                            <div class="flex items-center mb-4">
                                <input id="priority" name="priority" type="checkbox" value="1"
                                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                <label for="priority"
                                    class="select-none ms-2 text-sm font-medium text-heading">Proritaskan
                                    kategori</label>
                            </div>
                            @error('priority')
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
                            Tambah kategori
                        </button>
                        <button data-modal-hide="create" type="button"
                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- update modao --}}
    <div id="update" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Edit kategori
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
                <form method="POST" enctype="multipart/form-data" id="formUpdate">
                    @csrf
                    @method('put')
                    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

                        <div class="col-span-2">
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
                        </div>

                        <div class="col-span-2">
                            <label for="default_image_update" class="block mb-2.5 text-sm font-medium text-heading">Ganti
                                Gambar</label>

                            <div class="flex items-center justify-center w-full">
                                <label for="default_image_update"
                                    class="flex flex-col items-center justify-center w-full h-64 @error('default_image')
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
                                    <input id="default_image_update" name="default_image" type="file"
                                        class="hidden" />
                                </label>
                            </div>
                            @error('default_image')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 ">
                            <label for="priority_update" class="block mb-2.5 text-sm font-medium text-heading">Prioritas</label>
                            <div class="flex items-center mb-4">
                                <input id="priority_update" name="priority" type="checkbox" value="1"
                                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                <label for="priority"
                                    class="select-none ms-2 text-sm font-medium text-heading">Proritaskan
                                    kategori</label>
                            </div>
                            @error('priority')
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
                            Simpan Perubahan
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
            document.getElementById("priority_update").checked = btn.dataset.priority === "1" ? true : false;

            document.getElementById("formUpdate").action = `/admin/category/${btn.dataset.id}`;
        });
    </script>
@endpush
