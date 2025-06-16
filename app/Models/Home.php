<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    // Si vous voulez remplir certains champs automatiquement
    protected $fillable = ['titre', 'contenu', 'image'];
}
