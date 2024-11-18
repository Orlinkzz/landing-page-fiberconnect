<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
    use HasFactory;

    // protected $table = 'beritas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'gambar',
        'konten',
        'tanggal',
        'kategori_id',
        'status'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
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
