<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class DestinasiController extends Controller
{
    public function show($id)
    {
        // Mencari destinasi berdasarkan ID, jika tidak ditemukan akan menghasilkan error 404
        $destinasi = Destinasi::findOrFail($id);
        
        // Mengirim data destinasi ke view
        return view('destinasi.show', ['destinasi' => $destinasi]);
    }
    public function destinasi(Request $request)
    {
        // Menentukan judul berdasarkan pencarian atau kategori
        $judul = "Destinasi TrekTrove";
        if ($request->has('search') && !empty($request->search)) {
            $judul = "Destinasi " . htmlspecialchars($request->search);
        } elseif ($request->has('kategori') && !empty($request->kategori)) {
            $judul = "Destinasi " . ucfirst($request->kategori);
        }

        // Ambil data destinasi dari database
        $query = Destinasi::query();

        // Pencarian berdasarkan nama dan deskripsi
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        // Ambil data destinasi dari database
        $filteredDestinasi = $query->get(); // Pastikan variabel ini didefinisikan

        // Kirim data destinasi dan judul ke view
        return view('destinasi.destinasi', compact('filteredDestinasi', 'judul')); // Kirimkan data ke view
    }
}
