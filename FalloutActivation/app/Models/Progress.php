<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_laporan', 'pesan', // Atau tambahkan kolom lain yang perlu diisi
    ];

    // Jika Anda ingin menggunakan timestamp yang diatur oleh Laravel
    public $timestamps = true;

    // Jika Anda ingin menggunakan nama tabel yang berbeda
    protected $table = 'progress';

    // Relasi dengan model Laporan
    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'id_laporan');
    }
}
