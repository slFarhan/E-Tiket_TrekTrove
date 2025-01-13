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

        // Fungsi untuk menampilkan modal konfirmasi
        function showModal(event) {
            event.preventDefault();  // Mencegah pengiriman form langsung
            document.getElementById("confirmationModal").classList.remove("hidden"); // Tampilkan modal
        }

        // Fungsi untuk mengonfirmasi pesanan
        function confirmOrder() {
            // Jika pengguna menekan "OK", kirimkan form
            document.getElementById("orderForm").submit();
        }

        // Fungsi untuk membatalkan pesanan
        function cancelOrder() {
            // Sembunyikan modal dan kembali ke halaman sebelumnya
            document.getElementById("confirmationModal").classList.add("hidden");
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<form id="orderForm" action="{{ route('tickets.checkout', ['destinasiId' => $destinasi->id]) }}" method="POST" onsubmit="showModal(event)">
    @csrf
    <input type="hidden" name="destinasi_id" value="{{ $destinasi->id }}">
    <input type="hidden" name="price" id="harga" value="{{ $destinasi->harga }}">

    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-orange-600">TREKTROVE</h1>
            <nav>
                <ul class="flex space-x-6 text-gray-600">
                    <li><a href="#" class="hover:text-orange-600">Home</a></li>
                    <li><a href="{{ route('destinasi') }}" class="hover:text-orange-600">Destinasi</a></li>
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
                <input type="text" name="nama" required class="border p-2 w-full">

                <label for="date" class="block text-gray-700 font-medium mt-4">Tanggal</label>
                <input type="datetime-local" name="tanggal" required class="border p-2 w-full" min="{{ now()->toDateString() }}">

                <label for="quantity" class="block text-gray-700 font-medium mt-4">Jumlah Tiket</label>
                <input type="number" id="quantity" name="jumlah" value="1" min="1" required class="border p-2 w-full" oninput="calculateTotal()">
            </div>

            <!-- Right Section -->
            <div>
                <img src="{{ asset('storage/'. $destinasi->gambar)}}" alt="{{ $destinasi['nama'] }}" class="rounded-md mb-4">
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

        <!-- Form Pemesanan Tiket -->
<<form id="orderForm" action="{{ route('tickets.checkout', ['destinasiId' => $destinasi->id]) }}" method="POST" >
    @csrf
    <button type="button" onclick="showConfirmationModal()"
        class="w-full mt-6 bg-green-500 text-white font-semibold py-2 rounded-md hover:bg-green-600 transition">
        Pesan Tiket
    </button>
</form>

<!-- Modal Konfirmasi -->
<div id="confirmationModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-96">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Pemesanan</h3>
        <p class="text-gray-700 mb-4">Apakah Anda yakin ingin memesan tiket ini?</p>
        <div class="flex justify-end space-x-4">
            <!-- Tombol Batal -->
            <button onclick="cancelOrder()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Batal</button>
            <!-- Tombol Ya, Pesan -->
            <button id="confirmButton" onclick="confirmOrder()" class="px-4 py-2 bg-green-500 text-white rounded-md">Ya, Pesan</button>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan modal konfirmasi
    function showConfirmationModal() {
        document.getElementById("confirmationModal").classList.remove("hidden");
    }

    // Fungsi untuk menutup modal konfirmasi
    function cancelOrder() {
        document.getElementById("confirmationModal").classList.add("hidden");
    }

    // Fungsi untuk mengonfirmasi pemesanan
    function confirmOrder() {
        document.querySelector("form").submit(); // Mengirim form setelah konfirmasi
    }
</script>


</body>
</html>
