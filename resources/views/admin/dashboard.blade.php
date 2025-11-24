@extends('layouts.app')

@section('title', 'Tableau de bord admin')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">📊 Tableau de bord administratrice</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-purple-700 text-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold">Articles</h2>
            <p class="text-4xl mt-2">{{ $totalArticles }}</p>
        </div>
        <div class="bg-blue-700 text-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold">Commentaires validés</h2>
            <p class="text-4xl mt-2">{{ $totalComments }}</p>
        </div>
    </div>

    <h2 class="text-xl font-bold mb-4">🎛️ Administration</h2>

    <div class="space-y-4">
        <a href="{{ route('articles.index') }}"
            class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 inline-block">
            ✍️ Gérer les articles
        </a>
    </div>

    <h2 class="text-2xl font-semibold mt-8 mb-4">📝 Derniers articles</h2>
    <ul class="space-y-2">
        @foreach($latestArticles as $article)
        <li class="bg-white p-4 rounded shadow text-black">
            <a href="{{ route('admin.articles.edit', $article) }}"
                class="text-purple-700 font-semibold hover:underline">
                {{ $article->title }}
            </a>
            <span class="text-sm text-gray-600">—
                {{ $article->created_at->format('d/m/Y') }}</span>
        </li>
        @endforeach
    </ul>
</div>
@endsection