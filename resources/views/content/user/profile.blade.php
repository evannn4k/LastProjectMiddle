@extends('layout.user')

@section('content')
    <div class="flex-1">
        <section class="bg-white dark:bg-gray-900">
            <div class="mx-auto max-w-2xl py-4 px-4 md:py-12 md:px-0">
                <div class="border border-default rounded-3xl shadow p-6">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Edit
                        Profile</h2>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col pb-8 pt-4 border-b border-default">

                            <div class="flex flex-col gap-4 border-b border-default py-8">
                                <span class="text-xl font-semibold text-gray-800">Informasi Akun</span>
                                <div class="">
                                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="
                                        @error('name')
                                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                            @else
                                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                            @enderror
                                            block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="Masukan namamu" value="{{ $user->name }}">
                                    @error('name')
                                        <p class="mt-2.5 text-sm text-fg-danger-strong">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="">
                                    <label for="email"
                                        class="block mb-2.5 text-sm font-medium text-heading">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="
                                    @error('email')
                                            bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                        @else
                                            bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                        @enderror
                                        block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="email@example.com" value="{{ $user->email }}">
                                    @error('email')
                                        <p class="mt-2.5 text-sm text-fg-danger-strong">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="">
                                    <label for="phone" class="block mb-2.5 text-sm font-medium text-heading">Nomor
                                        Telepon (optional)</label>
                                    <input type="number" name="phone" id="phone"
                                        class="
                                        @error('phone')
                                        bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                        @else
                                        bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                        @enderror
                                        block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="08xxxxxxxxxx" value="{{ $user->phone }}">
                                    @error('phone')
                                        <p class="mt-2.5 text-sm text-fg-danger-strong">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-col gap-4 py-8">
                                <span class="text-xl font-semibold text-gray-800">Ganti Password</span>

                                <div class="">
                                    <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Password
                                        Baru</label>
                                    <input type="password" name="password" id="password"
                                        class="
                                        @error('password')
                                        bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                        @else
                                        bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                        @enderror
                                        block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="">

                                    @error('password')
                                        <p class="mt-2.5 text-sm text-fg-danger-strong">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="">
                                    <label for="password_confirmation"
                                        class="block mb-2.5 text-sm font-medium text-heading">Konfirmasi
                                        Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="
                                            @error('password_confirmation')
                                                bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger
                                                @else
                                                bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand
                                                @enderror
                                            block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="" />
                                    @error('password_confirmation')
                                        <p class="mt-2.5 text-sm text-fg-danger-strong">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col gap-4 border-b border-default pb-8">
                            <button type="submit"
                                class="inline-flex items-center justify-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M4 5a1 1 0 0 1 1-1h11.586a1 1 0 0 1 .707.293l2.414 2.414a1 1 0 0 1 .293.707V19a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Z" />
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M8 4h8v4H8V4Zm7 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Simpan perubahan
                            </button>
                        </div>
                    </form>

                    @if ($user->subscription)
                        <div class="flex flex-col gap-4 border-b border-default py-8">
                            <span class="text-xl font-semibold text-gray-800">Membership</span>
                            <table class="w-full text-sm">
                                <tr>
                                    <td class="w-1/2 text-heading p-1">Nama Membership</td>
                                    <td class="w-1/2 text-body p-1">{{ $user->subscription->membership->name }}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/2 text-heading p-1">Tanggal Mulai</td>
                                    <td class="w-1/2 text-body p-1">{{ $user->subscription->start_date }}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/2 text-heading p-1">Tanggal Berakhir</td>
                                    <td class="w-1/2 text-body p-1">{{ $user->subscription->end_date }}</td>
                                </tr>
                                <tr>
                                    <td class="w-1/2 text-heading p-1">Benefit</td>
                                    <td class="w-1/2 text-body p-1">Diskon sebesar
                                        {{ $user->subscription->membership->discount }}%</td>
                                </tr>
                            </table>
                            <div class="">
                                <form action="{{ route('membership.delete', $user->subscription->id) }}" method="POST"
                                    id="delete-membership">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" form="delete-membership"
                                        class="inline-flex items-center text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                        Batalkan Langganan
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                    
                    <div class="flex flex-col gap-4 pt-8">
                        <span class="text-xl font-semibold text-gray-800">Hapus akun</span>
                        <form action="{{ route('account.delete') }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="inline-flex items-center text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                                Hapus Akun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
