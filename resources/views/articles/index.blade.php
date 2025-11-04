@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<h1 class="text-2xl font-bold mb-4">📰 Tous les articles</h1>

<a href="{{ route('articles.create') }}"
    class="bg-purple-600 text-white px-4 py-2 rounded mb-4 inline-block">
    ✍️ Écrire un nouvel article
</a>

@foreach ($articles as $article)
<div class="bg-white p-4 rounded shadow mb-4">
    <h2 class="text-xl font-semibold">{{ $article->title }}</h2>
    <p class="text-gray-700">{{ Str::limit($article->content, 100) }}</p>
    <small class="text-gray-500">
        Par {{ $article->user->name }} le
        {{ $article->created_at->format('d/m/Y') }}
    </small>
    <div class="mt-2 space-x-4">
        <a href="{{ route('articles.show', $article) }}"
            class="text-blue-600">Voir</a>
        <a href="{{ route('articles.edit', $article) }}"
            class="text-yellow-600">Modifier</a>
        <form action="{{ route('articles.destroy', $article) }}" method="POST"
            class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Supprimer ?')"
                class="text-red-600">
                Supprimer
            </button>
        </form>
    </div>
</div>
@endforeach

{{ $articles->links() }} {{-- Pagination --}}
@endsection