<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Tampilan Detail Destinasi -->
    <div class="mx-auto max-w-screen-md px-4 py-12">
        <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800">
            <img class="w-full h-64 object-cover" src="{{ asset($destinasi['gambar']) }}" alt="{{ $destinasi['nama'] }}">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $destinasi['nama'] }}</h2>
                <p class="mt-4 text-gray-700 dark:text-gray-300">{{ $destinasi['deskripsi'] }}</p>
                <p class="mt-4 text-blue-600 dark:text-blue-400 font-semibold">Harga: Rp. {{ number_format($destinasi['harga'], 0, ',', '.') }}</p>
                <a href="{{ route('destinasi') }}" class="mt-6 inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                    Kembali
                </a>
                <a href="#" class="mt-2 inline-block px-4 py-2 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-700">
                    Pesan Tiket
                </a>
            </div>
        </div>

        <!-- Form untuk Rating dan Ulasan -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Berikan Rating dan Ulasan</h3>
            <form method="POST" action="{{ route('destinasi', ['id' => $destinasi['id']]) }}" class="mt-4">
                @csrf
                <label for="rating" class="text-gray-700 dark:text-gray-300">Rating:</label>
                <select id="rating" name="rating" class="mt-2 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="0">Pilih Rating</option>
                    <option value="1">1 - Buruk</option>
                    <option value="2">2 - Cukup</option>
                    <option value="3">3 - Baik</option>
                    <option value="4">4 - Sangat Baik</option>
                    <option value="5">5 - Luar Biasa</option>
                </select>

                <label for="ulasan" class="mt-4 text-gray-700 dark:text-gray-300">Ulasan:</label>
                <textarea id="ulasan" name="ulasan" rows="4" class="mt-2 block w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600" placeholder="Tuliskan ulasan Anda"></textarea>

                <button type="submit" class="mt-4 inline-block px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                    Kirim Ulasan
                </button>
            </form>
        </div>

        <!-- Menampilkan History Ulasan -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Ulasan Pengunjung</h3>
            @if (!empty($destinasi['ulasan']))
                @foreach ($destinasi['ulasan'] as $ulasan)
                    <div class="mt-4 p-4 border-b border-gray-200 dark:border-gray-600">
                        <p class="text-yellow-500">Rating: {{ str_repeat('★', $ulasan['rating']) . str_repeat('☆', 5 - $ulasan['rating']) }}</p>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $ulasan['ulasan'] }}</p>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500 dark:text-gray-400">Belum ada ulasan untuk destinasi ini.</p>
            @endif
        </div>
    </div>
</body>

</html>
