<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Carousel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'promo_id',
        'name',
        'title',
        'description',
        'image_url_mobile',
        'image_url_desktop',
        'status',
    ];

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $oldImagePathMobile = $model->getOriginal('image_url_mobile');
            $oldImagePathDesktop = $model->getOriginal('image_url_desktop');
            $newImagePathMobile = $model->image_url_mobile;
            $newImagePathDesktop = $model->image_url_desktop;

            if ($oldImagePathMobile && $oldImagePathMobile !== $newImagePathMobile) {
                Storage::disk('public')->delete($oldImagePathMobile);
            }

            if ($oldImagePathDesktop && $oldImagePathDesktop !== $newImagePathDesktop) {
                Storage::disk('public')->delete($oldImagePathDesktop);
            }
        });

        static::deleting(function ($model) {
            $imagePathMobile = $model->getOriginal('image_url_mobile');
            $imagePathDesktop = $model->getOriginal('image_url_desktop');

            if ($imagePathMobile) {
                Storage::disk('public')->delete($imagePathMobile);
            }

            if ($imagePathDesktop) {
                Storage::disk('public')->delete($imagePathDesktop);
            }
        });
    }
}
