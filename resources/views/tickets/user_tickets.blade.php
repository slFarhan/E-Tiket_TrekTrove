<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
     <!-- Navbar -->
     <nav x-data ="{ open: false }"class="bg-white border-gray-200 dark:bg-gray-900">
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
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="flex text-bold w-full text-xl py-4 px-4"> 
        <strong>Pesanan Saya</strong>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
    <th scope="col" class="px-4 py-3">Nama Pemesan</th>
    <th scope="col" class="px-4 py-3">Destinasi</th>
    <th scope="col" class="px-4 py-3">Tanggal</th>
    <th scope="col" class="px-4 py-3">Jumlah</th>
    <th scope="col" class="px-4 py-3">Total Harga</th>
    <th scope="col" class="px-4 py-3">Status</th>
</tr>
</thead>
<tbody>
    @forelse($tickets as $ticket)
    <tr class="border-b dark:border-gray-700">
        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $ticket->nama ?? 'N/A' }}
        </th>
        <td class="px-4 py-3">{{ $ticket->destinasi->nama ?? 'N/A' }}</td>
        <td class="px-4 py-3">{{ $ticket->tanggal }}</td>
        <td class="px-4 py-3">{{ $ticket->jumlah }}</td>
        <td class="px-4 py-3">Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="px-4 py-3 text-center">Data tiket tidak tersedia</td>
    </tr>
    @endforelse
</tbody>

        </table>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
