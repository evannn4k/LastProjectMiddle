@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14 flex flex-col gap-4">
        <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4 flex items-start justify-between space-x-4 border-b border-default">
                <div class="flex flex-col">
                    <span class="text-2xl font-semibold">Detail membership</span>
                    <span class="text-sm">{{ $membership->name }}</span>
                </div>

                <a href="{{ route('admin.membership.index') }}"
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
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <img src="{{ asset('storage/images/membership/' . $membership->image) }}"
                            alt="{{ $membership->name }}" class="w-full h-auto rounded-base">
                    </div>
                    <div class="col-span-3 md:col-span-2 flex flex-col gap-4">
                        <h2 class="mb-2 text-xl font-semibold text-gray-900 md:text-2xl dark:text-white">
                            {{ $membership->name }}
                        </h2>
                        <div class="">
                            <div class="mb-2 font-semibold text-gray-900 dark:text-white">Detail</div>
                            <div
                                class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                                <table class="w-full text-sm text-left rtl:text-right text-body">
                                    <tbody>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Nama membership
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $membership->name }}
                                            </td>
                                        </tr>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Harga
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $membership->price }}
                                            </td>
                                        </tr>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Durasi
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $membership->duration }}
                                            </td>
                                        </tr>
                                        <tr class="bg-neutral-primary border-b border-default">
                                            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                                Diskon
                                            </td>
                                            <td class="py-4" style="width: 10px">
                                                :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $membership->discount }}
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
                                                {{ $membership->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2 font-semibold text-gray-900 dark:text-white">Deskripsi</div>
                            <div class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                {{ $membership->description }}
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" data-id="{{ $membership->id }}" data-name="{{ $membership->name }}"
                            data-description="{{ $membership->description }}" data-price="{{ $membership->price }}"
                            data-duration="{{ $membership->duration }}" data-discount="{{ $membership->discount }}"
                            data-modal-target="update" data-modal-toggle="update"
                            class="inline-flex items-center gap-2 text-white bg-success box-border border border-transparent hover:bg-success-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none update">
                            <svg class="w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                            </svg>
                            Edit</button>

                        <form action="{{ route('admin.membership.destroy', $membership) }}" method="post">
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
    </div>
    {{-- update modal --}}
    <div id="update" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Edit membership
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
                <form id="formUpdate" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                placeholder="nama membership">
                            @error('name')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="price_update" class="block mb-2.5 text-sm font-medium text-heading">Harga</label>
                            <input type="number" name="price" id="price_update"
                                class="
                                @error('price')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="0">
                            @error('price')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="duration_update" class="block mb-2.5 text-sm font-medium text-heading">Durasi
                                (hari)</label>
                            <input type="number" name="duration" id="duration_update"
                                class="
                                @error('duration')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="0">
                            @error('duration')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="discount_update" class="block mb-2.5 text-sm font-medium text-heading">Diskon
                                (persen)</label>
                            <input type="number" name="discount" id="discount_update"
                                class="
                                @error('discount')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="0">
                            @error('discount')
                                <p class="mt-2.5 text-sm text-fg-danger-strong">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="description_update"
                                class="block mb-2.5 text-sm font-medium text-heading">Deskripsi</label>
                            <textarea name="description" id="description_update" rows="6"
                                class="@error('description')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Deskripsi membership"></textarea>
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
                            Tambah membership
                        </button>
                        <button data-modal-hide="create" type="button"
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
            document.getElementById("description_update").value = btn.dataset.description;
            document.getElementById("price_update").value = btn.dataset.price;
            document.getElementById("duration_update").value = btn.dataset.duration;
            document.getElementById("discount_update").value = btn.dataset.discount;

            document.getElementById("formUpdate").action = `/admin/membership/${btn.dataset.id}`;
        });
    </script>
@endpush
