<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\destinasi;
use App\Models\User;
use App\Models\Ticket;

class AdminController extends Controller
{
    public function index(){
        $countDestinasi = destinasi::count();
        $countUser = User::count();
        $countTicket = Ticket::count();
        // dd($countDestinasi, $countUser, $countTicket);
        return view("admin.dashboard",compact("countDestinasi","countUser","countTicket"));
    }

    public function destinasi(){
        $data = destinasi::all();
        return view('admin.destinasi', compact('data'));
    }

    public function showEdit ($id){
    $data = destinasi::find($id);
    return view('destinasi.edit',compact('data'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'nama'=> 'required|string',
            'deskripsi' =>'required|string',
            'harga' => 'required|string',
            'kategori'=> 'required|string',
            'foto' =>'required|image|max:10240',
        ]);

        $pathGambar = $request->file('foto')->store('public/gambar');
        
        $data = destinasi::findOrFail($id);
        // dd($data);
        $data->update([
            'nama'=> $request->nama,
            'deskripsi' =>  $request->deskripsi,
            'harga' =>  $request->harga,
            'kategori'=>  $request->kategori,
            'gambar' => $pathGambar,
        ]);

        return redirect('/admin/destinasi');
    }

    public function destroy($id){
        $data = destinasi::find($id);
        $data->delete();

        return redirect('/admin/destinasi');
    }

    public function store(Request $request){
        $request->validate([
            'nama'=> 'required|string',
            'deskripsi' =>'required|string',
            'harga' => 'required|string',
            'kategori'=> 'required|string',
            'foto' =>'required|image|max:10240',
        ]);

        $pathGambar = $request->file('foto')->store('public/gambar');
        
        Destinasi::create([
            'nama'=> $request->nama,
            'deskripsi' =>  $request->deskripsi,
            'harga' =>  $request->harga,
            'kategori'=>  $request->kategori,
            'gambar' => $pathGambar,
        ]);

        return redirect()->route('destinasi')->with('success','');
    }

    public function tickets()
    {
        $tickets = Ticket::all(); // Ambil semua data tiket
        // dd($tickets); // Untuk melihat data tiket yang ada
        return view('admin.ticket', compact('tickets'));
    }
    

}
