<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Article;
Use App\Models\Comment;

class AdminDashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard', [
            'totalArticles' => Article::count(),
            'totalComments' => Comment::where('is_validated', true)->count(),
            'latestArticles' => Article::latest()->take(5)->get(),
        ]);
    }
}