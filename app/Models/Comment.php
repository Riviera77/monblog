<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'content',
        'rating',
        'user_id',
        'article_id',
        'is_validated',
    ];

    // Relation with the User that write the comment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation with the Article being commented on
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}