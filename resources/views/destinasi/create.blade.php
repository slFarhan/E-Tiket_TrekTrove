<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6">
            <h2 class="font-semibold text-xl">Add Product</h2>
        </div>

        <div class="mt-4">
            <form enctype="multipart/form-data" method="POST" action="{{ route('destinasi.store') }}" class="flex gap-8">
                @csrf

                <div class="w-1/2">
                    <img src="{{ old('foto') ? asset('storage/' . old('foto')) : asset('storage/noimage.png') }}" class="rounded-md" id="previewImage" />
                </div>
                <div class="w-1/2">
                    <div class="mt-4">
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                        <input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" value="{{ old('foto') }}" required
                            onchange="previewImage(event)" />
                        @error('foto')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input id="nama" class="block mt-1 w-full border p-2" type="text" name="nama"
                            value="{{ old('nama') }}" required />
                        @error('nama')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input id="harga" class="block mt-1 w-full border p-2" type="text" name="harga"
                            value="{{ old('harga') }}" required />
                        @error('harga')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="deskripsi" class="block mt-1 w-full border p-2" name="deskripsi">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="kategori" name="kategori" class="block mt-1 w-full border p-2" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="elektronik">Elektronik</option>
                            <option value="pakaian">Pakaian</option>
                            <option value="makanan">Makanan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        @error('kategori')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="justify-center w-full mt-4 bg-blue-500 text-white py-2 px-4 rounded-md">
                        Submit
                    </button>
                </div>

            </form>
        </div>

    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const preview = document.getElementById('previewImage');
                preview.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
