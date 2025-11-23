<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Si les votes sont des commentaires ou des notes liées à des articles :
        $votedArticles = $user->comments()
                            ->where('is_validated', true)
                            ->with('article')
                            ->get()
                            ->pluck('article')
                            ->unique('id');

        return view('user.dashboard', compact('user', 'votedArticles'));
    }
}