<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPromo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket', 'kecepatan_dasar', 'harga_dasar',
    ];

    public function detailPromos()
    {
        return $this->hasMany(DetailPromo::class, 'paket_id');
    }
}
