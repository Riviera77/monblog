<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    // Autorise les champs remplis via create([...])
    protected $fillable = ['title', 'content', 'user_id'];

    /**
     * L’auteur de l’article
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Commentaires validés uniquement
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('is_validated', true);
    }
}