<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'maps',
        'branch_type',
    ];

    public function karirs()
    {
        return $this->hasMany(Karir::class, 'perusahaan_id');
    }

    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }

    public function promos()
    {
        return $this->hasMany(Promo::class);
    }
}
