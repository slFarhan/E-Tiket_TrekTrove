<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-5">
            <a href="{{route('dashboard')}}" class="flex items-center space-x-2 rtl:space-x-reverse">
                <img src="images/logo2.png" class="h-12" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Trektrove</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="images/Download Social Media Chatting Online Blank Profile Picture Head And Body Icon People Standing Icon Grey Background for free.jpg"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <x-responsive-nav-link :href="route('profile.edit')" class="text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>
                        </li>
                        <x-responsive-nav-link :href="route('user.tickets')" class="text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            {{ __('Tiket') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('profile.edit')" class="text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            {{ __('Pengaturan') }}
                        </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link class="text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </ul>
                </div>

                <!-- Navbar -->
            </div>

            <div class="flex items-center space-x-8">
                <!-- Menu Links -->
                <a href="{{route('dashboard')}}" class="text-gray-900 hover:text-gray-700 dark:text-white">Home</a>
                <a href="{{route('destinasi')}}" class="text-gray-900 hover:text-gray-700 dark:text-white">Destination</a>
                <a href="{{route('gallery')}}" class="text-gray-900 hover:text-gray-700 dark:text-white">Gallery</a>
                <!-- <a href="{{route('login')}}" class="text-white hover:text-gray-700 dark:text-white">Sudah punya akun?</a> -->
            </div>
        </div>
        </div>
    </nav>

    <!-- Form Filter dan Search -->
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ $judul }}</h2>
            <form method="get" action="{{ route('destinasi') }}" class="mt-6">
                <div class="flex gap-4 mb-8">
                    <!-- Pencarian Destinasi -->
                    <input type="text" name="search" class="border border-gray-300 rounded-lg px-4 py-2 w-2/3" placeholder="Cari Destinasi..." value="{{ request('search') }}" />

                    <!-- Filter Kategori -->
                    <select name="kategori" class="border border-gray-300 rounded-lg px-4 py-2 w-1/3">
                        <option value="">Semua Kategori</option>
                        <option value="alam" {{ request('kategori') == 'alam' ? 'selected' : '' }}>Alam</option>
                        <option value="kuliner" {{ request('kategori') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                        <option value="hiburan" {{ request('kategori') == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
                    </select>

                    <!-- Tombol Filter -->
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Filter
                    </button>
                </div>
            </form>

            <!-- Destinasi Card -->
            <div class="mt-8 grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($filteredDestinasi as $item)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <img class="h-48 w-full object-cover rounded-md" src="{{ asset('storage/'. $item->gambar)}}" alt="{{ $item['nama'] }}">
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item['nama'] }}</h3>
                        <p class="text-gray-500 dark:text-gray-400">
                            {{ \Illuminate\Support\Str::words($item['deskripsi'], 9, '...') }}
                        </p>
                        <p class="mt-2 text-blue-600 dark:text-blue-400 font-semibold">Rp. {{ number_format($item['harga'], 0, ',', '.') }}</p>
                        <a href="{{ route('destinasi.show', ['id' => $item['id']]) }}" class="mt-4 inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                            Lihat Detail
                        </a>
                        <a href="{{ route('tickets.create', ['destinasiId' => $item['id']]) }}"
                            class="mt-2 inline-block px-4 py-2 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-700">
                            Pesan Tiket
                        </a>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>