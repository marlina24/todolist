<?php

// Marlina

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Aide l'ORM à définir le modèle et génère la table "hebergements".
 * Étend la classe "Model" pour pouvoir utiliser l'ORM pour interagir avec la base de données.
 */
class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'date_fin',
        'user_id'
    ];
}
