@extends('layouts.app')

@section('title', 'Modifier l’article')

@section('content')
<h1 class="text-2xl font-bold mb-4">✏️ Modifier l’article</h1>

<form action="{{ route('admin.articles.update', $article) }}" method="POST"
    class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title"
            class="w-full border px-3 py-2 rounded"
            value="{{ old('title', $article->title) }}" required>
        @error('title') <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="content">Contenu</label>
        <textarea name="content" id="content" rows="6"
            class="w-full border px-3 py-2 rounded"
            required>{{ old('content', $article->content) }}</textarea>
        @error('content') <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
        class="bg-yellow-500 text-white px-4 py-2 rounded">Mettre à
        jour</button>
</form>
@endsection