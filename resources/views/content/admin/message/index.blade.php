@extends('layout.admin')

@section('content')
    <div class="p-4 sm:ml-64 mt-14 flex flex-col gap-4">
        <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <div class="p-4 flex items-start justify-between space-x-4 border-b border-default">
                <span class="text-2xl font-semibold">Pesan masuk</span>

                @if ($notification > 0)
                    <form action="{{ route('admin.message.read.all') }}" method="POST">
                        @method('patch')
                        @csrf
                        <button
                            class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                            <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                    clip-rule="evenodd" />
                            </svg>

                            Tandai dibaca semua
                        </button>
                    </form>
                @endif
            </div>
            <div class="p-4 flex flex-col">
                @forelse ($messages->sortByDesc('created_at') as $message)
                    <div class="p-3 border-b border-default">
                        <div class="gap-3 sm:gap-12 sm:flex sm:items-start">
                            <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
                                <div class="space-y-0.5">
                                    <h6 class="mb-2">Pengirim :</h6>
                                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $message->name }}
                                    </p>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        {{ $message->email }}</p>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        {{ $message->created_at }}</p>
                                </div>
                            </div>

                            <div class="my-4 min-w-0 flex-1 space-y-4 sm:mt-0">
                                <h6 class="mb-2">Pesan :</h6>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $message->message }}
                                </p>
                            </div>
                            <div class="flex gap-3 justify-between">
                                @if ($message->already_read == false)
                                    <div class="">
                                        <span
                                            class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0 mb-2 rounded-full">baru</span>
                                    </div>
                                    <form action="{{ route('admin.message.read', $message) }}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <button
                                            class="inline-flex items-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-xs px-3 py-1.5 focus:outline-none">
                                            <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            Tandai dibaca
                                        </button>
                                    </form>
                                @else
                                    <div class="">
                                        <span class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded-full">Dilihat</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-3 border-b border-default text-center">
                        Belum ada pesan
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
