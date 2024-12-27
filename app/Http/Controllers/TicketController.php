<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Destinasi;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // Menampilkan form pemesanan
    public function create($destinasiId)
    {
        $destinasi = Destinasi::findOrFail($destinasiId);
        return view('tickets.create', compact('destinasi'));
    }

    // Menyimpan data ke database
    public function store(Request $request, $destinasiId)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date|after_or_equal:today',
            'jumlah' => 'required|integer|min:1',
        ]);

        $destinasi = Destinasi::findOrFail($destinasiId);

        $totalHarga = $destinasi->harga * $request->jumlah;

        // Simpan data ke tabel tickets
        Ticket::create([
            'user_id' =>Auth::id(),
            'destinasi_id' => $destinasi->id,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('destinasi')->with('success', 'Tiket berhasil dipesan!');
    }

    public function userTickets()
    {
        // Ambil tiket berdasarkan user yang sedang login, dengan relasi destinasi
        $tickets = Ticket::where('user_id', Auth::id())
                         ->with('destinasi') // Memuat relasi destinasi
                         ->get();
    
        // Mengirimkan data tiket ke view
        return view('tickets.user_tickets', compact('tickets'));
    }
    

    

    
}
