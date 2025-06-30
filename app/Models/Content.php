<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Content extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'file_type',
        'publish_date'
    ];

    protected $casts = [
        'publish_date' => 'datetime'
        
    ];

    protected $appends = ['image_url'];
    

    

    /**
     * URL complète de l'image
     */
    public function getImageUrlAttribute()
    {
        if (!$this->file_path) {
            return asset('images/default-news.jpg');
        }

        return Storage::url($this->file_path);
    }

    /**
     * Suppression du fichier associé
     */
    protected static function booted()
    {
        static::deleted(function ($content) {
            if ($content->file_path && Storage::exists($content->file_path)) {
                Storage::delete($content->file_path);
            }
        });
    }
}
