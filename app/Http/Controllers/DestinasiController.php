<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\destinasi;

class DestinasiController extends Controller
{
    public function destinasi(Request $request)
    {
        // Data destinasi wisata (sumber data sementara)
        $destinasi = [
            [
                "id" => 1,
                "nama" => "Situ Patenggang",
                "deskripsi" => "Danau alam dengan pemandangan indah di Bandung.",
                "harga" => 30000,
                "gambar" => "images/destinasi1.jpg",
                "kategori" => "alam"
            ],
            [
                "id" => 2,
                "nama" => "Kawah Putih",
                "deskripsi" => "Danau kawah vulkanik dengan air berwarna cerah.",
                "harga" => 25000,
                "gambar" => "images/destinasi2.jpg",
                "kategori" => "alam"
            ],
            [
                "id" => 3,
                "nama" => "Taman Hutan Raya",
                "deskripsi" => "Kawasan hutan dan taman yang cocok untuk rekreasi keluarga.",
                "harga" => 20000,
                "gambar" => "images/destinasi3.jpg",
                "kategori" => "alam"
            ],
            [
                "id" => 4,
                "nama" => "Restoran Sate",
                "deskripsi" => "Restoran dengan berbagai pilihan sate lezat.",
                "harga" => 100000,
                "gambar" => "images/destinasi4.jpg",
                "kategori" => "kuliner"
            ],
            [
                "id" => 5,
                "nama" => "Cafe Sejuk",
                "deskripsi" => "Cafe dengan suasana sejuk dan makanan khas daerah.",
                "harga" => 50000,
                "gambar" => "images/destinasi5.jpg",
                "kategori" => "kuliner"
            ],
            [
                "id" => 6,
                "nama" => "Warung Makan Khas",
                "deskripsi" => "Warung makan dengan menu khas daerah yang menggugah selera.",
                "harga" => 40000,
                "gambar" => "images/destinasi6.jpg",
                "kategori" => "hiburan"
            ],
        ];

        // Menentukan judul berdasarkan pencarian atau kategori
        $judul = "Destinasi TrekTrove";
        if ($request->has('search') && !empty($request->search)) {
            $judul = "Destinasi " . htmlspecialchars($request->search);
        } elseif ($request->has('kategori') && !empty($request->kategori)) {
            $judul = "Destinasi " . ucfirst($request->kategori);
        }

        // Filter destinasi berdasarkan kategori dan pencarian
        $filteredDestinasi = collect($destinasi)->filter(function ($item) use ($request) {
            $search = $request->search;
            $kategori = $request->kategori;

            // Pencarian berdasarkan nama destinasi dan deskripsi
            $matchSearch = stripos($item['nama'], $search) !== false || stripos($item['deskripsi'], $search) !== false;

            // Filter berdasarkan kategori
            $matchCategory = !$kategori || $item['kategori'] == $kategori;

            return $matchSearch && $matchCategory;
        });

        // Kirim data destinasi dan judul ke view
        return view('destinasi.destinasi', compact('filteredDestinasi', 'judul'));
    }

   
    

    public function show($id)
    {
        $destinasi = destinasi::findOrFail($id);
        return view('destinasi.show', ['destinasi' => $destinasi]);
    }
}
