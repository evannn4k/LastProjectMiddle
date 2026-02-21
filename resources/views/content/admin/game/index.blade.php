@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4 flex items-center justify-between space-x-4">
                <label for="input-group-1" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="input-group-1"
                        class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                        placeholder="Search">
                </div>
                <div class="flex gap-3">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="shrink-0 inline-flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none"
                        type="button">
                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                        </svg>
                        Filter by
                        <svg class="w-4 h-4 ms-1.5 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-32">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Color</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Category</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Price</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                    
                    <button type="button" class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                        Tambah Game
                        </button>
                </div>

            </div>
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
                    <tr>
                        <th scope="col" class="p-4">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="w-4 p-4">
                            1.
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-fg-brand hover:underline">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- pagination --}}
            {{-- <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-body mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span
                            class="font-semibold text-heading">1-10</span> of <span
                            class="font-semibold text-heading">1000</span></span>
                    <ul class="flex -space-x-px text-sm">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-9 focus:outline-none">Previous</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center text-fg-brand bg-brand-softer box-border border border-default-medium hover:bg-brand-soft hover:text-fg-brand font-medium text-sm w-9 h-9 focus:outline-none">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">...</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">5</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-9 focus:outline-none">Next</a>
                        </li>
                    </ul>
                </nav> --}}
        </div>
    </div>
@endsection
