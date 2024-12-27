<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasi';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'kategori',
    ];

    public function tickets()
{
    return $this->hasMany(Ticket::class, 'destinasi_id');
}

}
