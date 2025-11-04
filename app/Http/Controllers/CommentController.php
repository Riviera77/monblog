<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // store() for submit a comment
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();

        Comment::create([
        'content' => $data['content'],
        'rating' => $data['rating'],
        'user_id' => Auth::id(),
        'article_id' => $data['article_id'],
        'is_validated' => false,
    ]);

        return redirect()->back()->with('success', 'Commentaire soumis pour validation.');
    }
    // index() et update() pour l’admin (modération)
}