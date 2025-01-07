<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>AdminHub</title>
</head>

<body>
    <!-- SIDEBAR -->
     <!-- SIDEBAR -->
     <section id="sidebar">
	<a href="{{ route('admin.dashboard') }}" class="brand">
        <i class='bx bxs-leaf'></i>
            <span class="text">TrekTrove</span>
        </a>
        <ul class="side-menu top">
        <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.destinasi') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">My Store</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ticket') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Ticket</span>
                </a>
            </li>
        </ul>

    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <!-- <a href="#" class="nav-link">Categories</a> -->
            <form action="#">
                <div class="form-input">
                    <!-- <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button> -->
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/profile.jpg') }}" alt="Profile Image">
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown" class="hidden z-10 w-44 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <!-- Displaying the name of the logged-in admin -->
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="px-4 py-2">
                        <!-- Logout button inside dropdown -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Destinasi</title>
                <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
            </head>

            <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
            <script src="{{asset('js/script.js')}}"></script>
</body>

</html>


<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                <div>
                    <h5 class="mr-3 font-semibold dark:text-white">Kelola Destinasi</h5>
                    <p class="text-gray-500 dark:text-gray-400">Trektrove solusi tempat wisata di Bandung</p>
                </div>
                <button type="button"
                    id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex items-center justify-center px-4 py-2 text-sm font-medium dark:text-white rounded-lg bg-green-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                    </svg>
                    Add new Destination
                </button>
            </div>
        </div>
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add a new Destinasi
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <form enctype="multipart/form-data" method="POST" action="{{ route('destinasi.store') }}" class="grid gap-6">
                        @csrf

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <!-- Destinasi Name -->
                            <div>
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destinasi Name</label>
                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Destinasi Name" value="{{ old('nama') }}" required>
                            </div>

                            <!-- Harga -->
                            <div>
                                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <input type="number" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('harga') }}" placeholder="Rp xxxx" required>
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="alam">Alam</option>
                                    <option value="kuliner">Kuliner</option>
                                    <option value="hiburan">Hiburan</option>
                                </select>
                            </div>

                            <!-- Gambar -->
                            <div>
                                <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                <input type="file" name="foto" id="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-span-full">
                                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your deskripsi here"></textarea>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-600">
                                Add Destinasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Destinasi Card -->
        <div class="mt-8 grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($data as $item)
            <!-- Contoh Destinasi Card -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <img class="h-48 w-full object-cover rounded-md" src="{{ asset('storage/'. $item->gambar)}}" alt="{{ $item['nama'] }}">
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item['nama'] }}</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        {{ \Illuminate\Support\Str::words($item['deskripsi'], 5, '...') }}
                    </p>
                    <p class="mt-2 text-blue-600 dark:text-blue-400 font-semibold">Rp. {{ number_format($item['harga'], 0, ',', '.') }}</p>
                    <a href="{{route('destinasi.showEdit',['id' => $item->id])}}" class="mt-4 inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                        Edit Destinasi
                    </a>
                    <form action="{{route('destinasi.delete',['id' => $item->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="mt-2 inline-block px-4 py-2 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-700">
                            Hapus Destinasi
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>