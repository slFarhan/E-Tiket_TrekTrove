@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tiket</h1>
    @foreach ($tickets as $ticket)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $ticket->nama }}</h5>
                <p class="card-text">
                    Destinasi: {{ $ticket->destinasi->nama }}<br>
                    Jumlah: {{ $ticket->jumlah }}<br>
                    Tanggal: {{ $ticket->tanggal }}<br>
                    Total Harga: Rp {{ number_format($ticket->total_harga, 2) }}
                </p>
                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
