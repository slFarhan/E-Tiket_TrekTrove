<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket</title>
    <script>
        // Fungsi untuk menghitung total harga
        function calculateTotal() {
            var harga = parseInt(document.getElementById("harga").value); // Ambil harga dari field hidden
            var quantity = parseInt(document.getElementById("quantity").value); // Ambil jumlah tiket
            if (isNaN(harga) || isNaN(quantity)) {
                document.getElementById("totalPrice").innerText = "Total Harga: Rp 0";
                return;
            }
            var totalPrice = harga * quantity; // Hitung total harga
            document.getElementById("totalPrice").innerText = "Total Harga: Rp " + totalPrice.toLocaleString(); // Tampilkan total harga
        }

        // Fungsi untuk menampilkan konfirmasi sebelum mengirimkan form
        function confirmOrder(event) {
            event.preventDefault();  // Mencegah pengiriman form langsung

            // Menanyakan konfirmasi kepada pengguna
            var isConfirmed = confirm("Apakah Anda yakin ingin memesan tiket ini?");
            if (isConfirmed) {
                // Jika pengguna menekan "OK", kirimkan form
                document.getElementById("orderForm").submit();
            } else {
                // Jika pengguna menekan "Cancel", kembali ke halaman sebelumnya
                window.history.back();
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<form id="orderForm" action="{{ route('ticket.store') }}" method="POST" onsubmit="confirmOrder(event)">
    @csrf
    <input type="hidden" name="destination_id" value="{{ $destinasi->id }}">
    <input type="hidden" name="price" id="harga" value="{{ $destinasi->harga }}">

    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-orange-600">TREKTROVE</h1>
            <nav>
                <ul class="flex space-x-6 text-gray-600">
                    <li><a href="#" class="hover:text-orange-600">Home</a></li>
                    <li><a href="{{ route('destinasi.destinasi') }}" class="hover:text-orange-600">Destinasi</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-8 p-6 bg-white shadow-lg rounded-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Order Tiket</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Section -->
            <div>
                <label for="name" class="block text-gray-700 font-medium">Nama Pemesan</label>
                <input type="text" name="name" required class="border p-2 w-full">

                <label for="date" class="block text-gray-700 font-medium mt-4">Tanggal</label>
                <input type="date" name="date" required class="border p-2 w-full">

                <label for="quantity" class="block text-gray-700 font-medium mt-4">Jumlah Tiket</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" required class="border p-2 w-full" oninput="calculateTotal()">
            </div>

            <!-- Right Section -->
            <div>
                <img src="{{ asset($destinasi->gambar) }}" alt="{{ $destinasi->nama }}" class="rounded-md mb-4">
                <h3 class="text-xl font-semibold text-gray-800">{{ $destinasi->nama }}</h3>
                <p class="text-red-500 text-sm mt-2">Non refundable</p>

                <div class="mt-6 bg-gray-100 p-4 rounded-md">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Detail Harga</h4>
                    <div class="flex justify-between text-gray-700">
                        <span>Harga Tiket</span>
                        <span>Rp {{ number_format($destinasi->harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-gray-800 font-bold mt-2">
                        <p id="totalPrice">Total Harga: Rp {{ number_format($destinasi->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="w-full mt-6 bg-green-500 text-white font-semibold py-2 rounded-md hover:bg-green-600 transition">
            Pesan Tiket
        </button>
    </main>
</form>

</body>
</html>