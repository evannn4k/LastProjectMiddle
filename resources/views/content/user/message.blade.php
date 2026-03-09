@extends('layout.user')

@section('content')
    <div class="flex-1">
        <section class="bg-white dark:bg-gray-900">
            <div class="mx-auto max-w-2xl py-8">
                <div class="border border-default rounded-3xl shadow lg:py-16 py-8 px-4">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Hubungi kami</h2>
                    <form action="{{ route("message.store") }}" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
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
                                    placeholder="Masukan namamu">
                                @error('name')
                                    <p class="mt-2.5 text-sm text-fg-danger-strong">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-2">
                                <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Email</label>
                                <input type="email" name="email" id="email"
                                    class="
                                @error('email')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                                block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                    placeholder="email@example.com">
                                @error('email')
                                    <p class="mt-2.5 text-sm text-fg-danger-strong">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-2">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan</label>
                                <textarea id="message" name="message" rows="8"
                                    class="block p-2.5 w-full text-sm @error('message')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                @enderror"
                                    placeholder="Masukan isi pesanmu"></textarea>
                            </div>
                            <div class="col-span-2">
                                <button type="submit"
                                    class="w-full text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
