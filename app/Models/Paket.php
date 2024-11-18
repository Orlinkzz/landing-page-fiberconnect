<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Paket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_paket',
        'gambar',
        'kuota',
        'kecepatan',
        'harga',
        'fitur',
        'status',
        'perusahaan_id'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $oldImagePath = $model->getOriginal('gambar');
            $newImagePath = $model->gambar;

            if ($oldImagePath && $oldImagePath !== $newImagePath) {
                // Menghapus gambar lama dari storage
                Storage::disk('public')->delete($oldImagePath);
            }
        });

        static::deleting(function ($model) {
            $imagePath = $model->getOriginal('gambar');
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        });
    }
}
