<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPromo extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_id', 'paket_id', 'harga_khusus', 'kecepatan_khusus', 'diskon', 'tipe_diskon',
    ];

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
