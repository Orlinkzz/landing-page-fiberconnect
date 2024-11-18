<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'location',
        'salary',
        'posted_date',
        'closing_date',
        'work_location',
        'work_type',
        'candidate_needed',
        'perusahaan_id',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriKarir::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

}
