@extends('layout.user')

@section('content')
    <div class="flex-1">
        <header class="bg-cover bg-center" style="background-image: url('{{ asset('assets/images/hero.png') }}')">
            <div class="bg-black/60">
                <div class="container mx-auto px-4 max-w-screen-xl">
                    <div class="w-full flex justify-between items-center py-8">
                        <div class="flex flex-col">
                            <span
                                class="flex items-center gap-1 text-white ps-3 pe-1 py-1 text-xs rounded-full border border-white/50 w-max">
                                Aman dan Terpercaya
                                <svg class="h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </span>
                            <span class="text-white text-4xl my-2 font-semibold">Top Up {{ $game->name }}</span>
                            <p class="text-white/80 text-sm mt-1">Transaksi cepat, aman, dan otomatis untuk semua pengguna
                                {{ $game->name }}.</p>
                            <p class="text-white/80 text-sm mt-1">Dapatkan dengan harga terbaik hanya di VanStore!</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('storage/images/game/' . $game->image) }}"
                                class="h-38 rounded-3xl shadow-xl p-2 bg-white/30 border border-white/50"
                                alt="{{ $game->name }}">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="grid grid-cols-1 md:grid-cols-3 items-start p-6 gap-6">
                <div class="p-6 rounded-2xl border border-default shadow-lg col-span-1 text-sm flex flex-col gap-4">
                    <div class="flex gap-4">
                        <img src="{{ asset('storage/images/game/' . $game->image) }}"
                            class="h-24 rounded-xl shadow-xl"
                            alt="{{ $game->name }}">
                            <div class="flex flex-col gap-1">
                                <span class="text-xl font-semibold text-heading">{{ $game->name }}</span>
                                <table class="text-body text-sm">
                                    <tr>
                                        <td class="pe-2">Penerbit</td>
                                        <td class="pe-2">: {{ $game->publisher }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-2">Region</td>
                                        <td class="pe-2">: {{ $game->region }}</td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                    <hr class="border-default">
                    <p>Website ini menyediakan layanan top up berbagai game dan produk digital dengan proses
                        cepat, aman, dan otomatis.</p>
                    <p>Cara Top Up:</p>
                    <ol>
                        <li class="mb-2">1. Masukkan User ID / Game ID akun Anda.</li>
                        <li class="mb-2">2. Pilih nominal atau item yang ingin dibeli.</li>
                        <li class="mb-2">3. Pilih metode pembayaran yang tersedia.</li>
                        <li class="mb-2">4. Masukkan nomor WhatsApp aktif. (optional)</li>
                        <li class="mb-2">5. Selesaikan pembayaran, dan item akan dikirim otomatis ke akun Anda.</li>
                    </ol>
                    <p>Catatan:</p>
                    <p>Pastikan ID dan Server diisi dengan benar agar proses top up berjalan lancar.</p>
                    <p>Metode pembayaran yang tersedia meliputi QRIS, E-Wallet, Transfer Bank, pulsa, minimarket, dan metode
                        lainnya.</p>
                </div>
                <div class="p-6 rounded-2xl border border-default shadow-lg col-span-1 md:col-span-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quasi ut unde, optio voluptate excepturi
                    possimus provident? Optio et sequi, enim ab velit, nobis earum officiis placeat at minus ad in
                    consectetur facilis nemo voluptatem debitis id rem laborum, labore ducimus accusamus quisquam. Quidem
                    aliquid blanditiis iure odit maxime a nostrum consequuntur, amet, ipsam recusandae quo at ipsa
                    architecto ratione, consequatur veritatis dolorum. Tenetur aliquid deserunt quod earum enim nam, maiores
                    incidunt aliquam nostrum beatae quia sequi vitae doloremque commodi in cumque laborum esse. Sit rem quae
                    incidunt reprehenderit odio dolorum veritatis. Animi adipisci mollitia sed officia minima cum ut alias,
                    reiciendis nobis laborum, tempore molestiae consequatur rem non neque id cupiditate culpa vero possimus
                    dolores natus suscipit ducimus repudiandae? Accusantium quos, fuga corrupti officiis harum nesciunt ab,
                    ipsa veniam tenetur esse nobis laborum ratione minus expedita ipsum mollitia dolor atque? Illo iste nam
                    placeat, corporis aliquid quo delectus eaque impedit assumenda aspernatur excepturi vero fugit
                    voluptatem provident dolores sint voluptatum commodi beatae cumque deserunt reprehenderit ipsa
                    consectetur necessitatibus! Voluptatem quo dolor incidunt eligendi aspernatur tenetur nulla consequatur
                    nobis, mollitia beatae suscipit quaerat, debitis tempora cupiditate id libero aliquam et laudantium
                    adipisci obcaecati dolores enim. Quis atque praesentium aliquam quam molestiae? Repudiandae libero
                    mollitia, illum quos cum error dicta itaque? Maiores unde ex, ipsa enim magni voluptatem explicabo
                    suscipit ratione at voluptas laboriosam quas optio fugiat assumenda nihil natus architecto eum quasi
                    deleniti vero et sequi? Totam quos, earum quam doloremque distinctio nobis accusantium! Suscipit
                    accusantium earum repellat excepturi dolore quae corrupti assumenda vitae reiciendis sint, delectus sed
                    quasi eum hic exercitationem voluptatem corporis culpa repudiandae nesciunt? Recusandae nam nesciunt,
                    deserunt aperiam quod consequatur, voluptas ullam adipisci quaerat cupiditate beatae quam magni odio
                    quasi commodi. Blanditiis, quas tempora distinctio corporis fugit perferendis, laudantium nihil facilis
                    pariatur ad hic officiis velit expedita minus id? Quos consequuntur quisquam ducimus tempore, aspernatur
                    quis alias unde animi. Est recusandae aliquid quam, suscipit error sint doloribus quidem asperiores,
                    omnis placeat minima at. Illo hic autem obcaecati laboriosam quasi? Reprehenderit dolor ipsam
                    necessitatibus nihil vero similique in qui facilis natus atque delectus mollitia, ab cupiditate
                    recusandae vel nobis voluptas, sapiente rem expedita nulla numquam excepturi. Vero illo rerum aliquid
                    eveniet beatae assumenda, neque nihil quo quis soluta illum, laborum delectus est, natus blanditiis
                    pariatur debitis possimus. Magni ullam explicabo, vitae eligendi deserunt numquam incidunt perferendis
                    fugit, corrupti illo nisi. Maiores ut illum doloribus illo laborum voluptate porro vitae tempora
                    dignissimos, explicabo esse error praesentium. Excepturi voluptas soluta necessitatibus magnam omnis
                    beatae possimus non, cumque quod consectetur placeat eligendi, esse consequatur ducimus, velit quae
                    blanditiis vero! Exercitationem quasi asperiores fugit ab, voluptatum obcaecati eius ullam, sapiente
                    ipsum sint officia adipisci quisquam tempora, aliquam corrupti in quod possimus ducimus temporibus iusto
                    sit delectus. Velit nobis laborum pariatur sit doloribus. Nobis hic dignissimos quia magni ab
                    blanditiis, placeat amet perferendis nostrum fugit id pariatur sunt, voluptas repudiandae sint dolor
                    minus harum necessitatibus molestiae in, natus quidem? Iure, vel sed laborum nam necessitatibus possimus
                    doloremque commodi debitis quas vitae quae voluptatum inventore ipsam error natus. Iste exercitationem
                    eius tempore quidem necessitatibus fuga earum enim perspiciatis, deserunt autem explicabo quo ipsa
                    tempora, accusamus aliquam laborum, placeat maiores similique! Tempore excepturi rerum, sapiente ipsam
                    sit reprehenderit? Sapiente tempore saepe adipisci, illum eveniet voluptate delectus suscipit obcaecati
                    officiis animi. Iusto ea quisquam quasi repellat error ducimus atque aliquam reprehenderit nulla
                    cupiditate. Quod, magnam harum et inventore alias autem. Accusantium facere repellendus sint vel.
                    Voluptate corporis enim mollitia labore ea asperiores natus impedit vero praesentium optio culpa beatae,
                    modi eveniet non obcaecati! Molestias rem ex modi ut recusandae voluptates voluptas illo sequi quo.
                    Magni provident quaerat ratione, culpa veritatis totam officiis corporis illo quae quia dolor
                    exercitationem impedit at quo molestias voluptate veniam omnis eligendi, nihil officia ullam! Magnam,
                    mollitia culpa! Dolore, doloremque ratione possimus quasi deleniti nisi eveniet aut dolorum quae, totam
                    sunt optio ab illum qui numquam repudiandae aliquam quam, veniam ad nobis aperiam quod? Beatae, odio
                    eligendi modi ab molestias impedit possimus voluptatum esse eos. Fuga quam nemo, et quisquam soluta ex,
                    asperiores natus, rerum minus voluptatibus ullam id? Eos, voluptate omnis. Molestiae, quae. A
                    consequuntur, inventore fugit deserunt reiciendis maxime cum vel vero, natus rerum, suscipit beatae
                    consequatur unde odio officiis officia nam laudantium. Molestias assumenda veniam officia corporis
                    quaerat, totam aut repellat repudiandae eos odio fuga autem, sed ullam voluptatem ea ipsa provident
                    adipisci suscipit ipsam? Molestiae dolor cumque et delectus sint odio vitae commodi labore tempora,
                    vero, aliquam corrupti repudiandae consectetur corporis amet nemo ipsam debitis doloribus reiciendis id
                    similique inventore possimus voluptatum? Animi repudiandae, quis perferendis porro labore laborum veniam
                    debitis iure quo! Iure eius sequi ratione ea ipsa itaque, pariatur reiciendis eum recusandae dolorem est
                    atque illo qui consectetur tempore autem quo totam repudiandae inventore quos perferendis! Soluta
                    corporis numquam quisquam odit tempore ullam repellat? Illo similique ab at eius delectus eveniet magnam
                    cupiditate laudantium accusamus? Recusandae, maxime voluptate dolor asperiores, similique consequatur
                    vel quae dolorem esse, est nesciunt. Modi veniam molestiae quasi repellendus doloremque incidunt maiores
                    eius mollitia magni at fuga, ut odit soluta rem suscipit fugit similique tenetur assumenda laboriosam
                    repellat, iure unde quidem cum praesentium. Asperiores voluptas nemo beatae aperiam eius maiores error
                    necessitatibus commodi, minus aspernatur sed ab optio veritatis, maxime, iste quis temporibus velit.
                    Itaque animi sequi, dolor voluptatum consequatur suscipit ullam nesciunt sit quaerat fugiat. Quod
                    laboriosam sit placeat nisi eum impedit, suscipit aliquid quaerat exercitationem ullam minima fugiat
                    magni autem a magnam nobis cupiditate! Veritatis dolorum nemo ad quia ex soluta veniam impedit nam
                    cupiditate doloribus reiciendis eaque deserunt, ea perspiciatis maxime sequi sed corrupti! Neque
                    inventore facere reprehenderit id expedita cumque reiciendis vel eaque possimus vitae labore rerum
                    maiores, architecto perspiciatis magni, ab eius minima aliquid voluptas iste? Beatae magni
                    exercitationem impedit veniam corporis, mollitia alias perferendis natus odio ipsa quaerat repellendus
                    facere doloremque rem provident assumenda dicta ut iusto odit quod at. In illo impedit itaque
                    voluptatibus. Velit illo dicta, laboriosam numquam voluptatibus aperiam quas sed minima, dolore
                    asperiores sequi cupiditate aliquid debitis dignissimos, recusandae quis voluptas!
                </div>
            </div>
        </div>
    </div>
@endsection
