@extends('layouts.app')

@section('title', $article->title)

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $article->title }}</h1>
<p class="text-gray-700">{{ $article->content }}</p>
<p class="text-sm text-gray-500 mt-2">
    Publié par {{ $article->user->name }} le
    {{ $article->created_at->format('d/m/Y H:i') }}
</p>

<a href="{{ route('articles.index') }}"
    class="inline-block mt-4 text-blue-600">← Retour</a>

{{-- Form for let a comment --}}
@if (Auth::check())
<div class="mt-10">
    <h2 class="text-xl font-semibold mb-2">Laisser un commentaire</h2>

    @if (session('success'))
    <div class="p-4 mb-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('comments.store') }}" method="POST"
        class="space-y-4">
        @csrf

        <input type="hidden" name="article_id" value="{{ $article->id }}">

        <div>
            <label for="content" class="block font-medium">Commentaire :</label>
            <textarea name="content" id="content" rows="4" required
                class="w-full border border-gray-300 rounded px-3 py-2">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="rating" class="block font-medium">Note (1 à 5) :</label>
            <input type="number" name="rating" id="rating" min="1" max="5"
                value="{{ old('rating') }}"
                class="w-20 border border-gray-300 rounded px-3 py-2">
            @error('rating')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
            Soumettre mon commentaire
        </button>
    </form>
</div>
@else
<div class="mt-10 p-4 bg-yellow-100 text-yellow-800 rounded">
    Connectez-vous pour laisser un commentaire.
    <a href="{{ route('login') }}" class="underline text-blue-600">Se
        connecter</a>
</div>
@endif

{{-- List of comments validated --}}
@if ($article->comments->count())
<div class="mt-10">
    <h2 class="text-xl font-semibold mb-4">Commentaires</h2>

    @foreach ($article->comments as $comment)
    <div class="mb-4 p-4 border rounded shadow-sm bg-gray-50">
        <div class="flex justify-between">
            <span class="font-semibold">{{ $comment->user->name }}</span>
            <span class="text-sm text-gray-500">
                {{ $comment->created_at->format('d/m/Y H:i') }}
            </span>
        </div>

        <p class="mt-2">{{ $comment->content }}</p>

        <p class="text-yellow-600 text-sm mt-1">
            Note : {{ $comment->rating }} / 5
        </p>
    </div>
    @endforeach
</div>
@else
<p class="mt-10 text-gray-500 italic">Aucun commentaire pour le moment.</p>
@endif

@endsection