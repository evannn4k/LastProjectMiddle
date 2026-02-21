@extends('layout.main')

@section('main')
    <div class="container mx-auto px-4">
        <div class="h-screen flex justify-center items-center">

            <div class="shadow-2xl p-5 rounded-2xl md:w-2/7">
                <h3 class="mt-4 mb-6 text-center text-2xl font-bold">Login</h3>
                <form class="mx-auto" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Masukan Nama</label>
                        <input type="text" id="name" name="name"
                            class=" block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                            @error('name')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            "
                            placeholder="nama anda" />
                        @error('name')
                            <p class="mt-2.5 text-sm text-fg-danger-strong">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Masukan Email</label>
                        <input type="email" id="email" name="email"
                            class=" block w-full px-3 py-2.5 shadow-xs placeholder:text-body
                            @error('email')
                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                            @else
                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                            @enderror
                            "
                            placeholder="contoh@gmail.com" />
                        @error('email')
                            <p class="mt-2.5 text-sm text-fg-danger-strong">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Masukan Password</label>
                        <input type="password" id="password" name="password"
                            class="
                        @error('password')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                        block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="••••••••" />
                        @error('password')
                            <p class="mt-2.5 text-sm text-fg-danger-strong">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password_confirmation" class="block mb-2.5 text-sm font-medium text-heading">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="
                        @error('password_confirmation')
                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                        @else
                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                        @enderror
                        block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="••••••••" />
                        @error('password_confirmation')
                            <p class="mt-2.5 text-sm text-fg-danger-strong">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <button type="submit"
                            class="w-full text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Submit</button>
                    </div>
                    <div class="text-center mb-3">
                        Sudah punya akun? silahkan <a href="{{ route('login') }}"
                            class="text-brand hover:underline">Masuk</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
