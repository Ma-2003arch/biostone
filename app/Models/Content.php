<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
    'category',
    'title',
    'description',
    'file_path',
    'publish_date',
        
    ];
    protected $casts = [

    'publish_date' => 'date'
];
}
