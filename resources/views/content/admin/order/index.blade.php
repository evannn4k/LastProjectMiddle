@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14">
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4 flex items-start justify-between space-x-4 border-b border-default">
                <div class="flex flex-col">
                    <span class="text-2xl font-semibold">Daftar pesanan</span>
                    <span class="text-sm">Halaman untuk melihat aktivitas pesanan</span>
                </div>
            </div>

            <div class="relative overflow-x-auto p-4">
                <table id="main-table" class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
                        <tr>
                            <th scope="col" class="p-4">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Invoice
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Transaksi
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Produk
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Game
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                <span class="flex gap-1">
                                    Status
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
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders->sortByDesc("created_at") as $order)
                            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                <td class="w-4 p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->invoice_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->product->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->product->game->name }}
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
                                <td class="px-6 py-4">
                                    {{ $order->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4">
                                    <button id="{{ $order->id }}" data-dropdown-toggle="{{ $order->id }}-dropdown"
                                        class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{ $order->id }}-dropdown"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm" aria-labelledby="{{ $order->id }}-dropdown-button">
                                            <li>
                                                <a href="{{ route('admin.order.show', $order) }}"
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
                                                <form action="{{ route('admin.order.destroy', $order) }}" method="post">
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
                                    Tidak ada data transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection