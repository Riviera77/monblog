@extends('layouts.app')

@section('title', 'Créer un article')

@section('content')
<h1 class="text-2xl font-bold mb-4">📝 Créer un article</h1>

<form action="{{ route('admin.articles.store') }}" method="POST"
    class="space-y-4">
    @csrf

    <div>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title"
            class="w-full border px-3 py-2 bg-white text-black rounded focus:outline-none focus:ring focus:ring-purple-400"
            value="{{ old('title') }}" required>
        @error('title') <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="content">Contenu</label>
        <textarea name="content" id="content" rows="6"
            class="w-full border px-3 py-2 bg-white text-black rounded focus:outline-none focus:ring focus:ring-purple-400"
            required>{{ old('content') }}</textarea>
        @error('content') <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
        class="bg-purple-600 text-white px-4 py-2 rounded">Publier</button>
</form>
@endsection