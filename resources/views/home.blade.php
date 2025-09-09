@extends('layouts.app')

@section('title', 'Bienvenue sur le blog')

@section('content')
<section class="mb-8">
    <h1 class="text-3xl font-bold text-purple-800 mb-2">👑 CodingQueen40</h1>
    <p class="text-gray-700 leading-relaxed">
        Salut, moi c’est Grey – maman solo, dev en reconversion, fondatrice de
        CodingQueen40 💻🌺.
        Ici, je partage mes apprentissages sur Laravel, le web, et
        l’indépendance des femmes de 40+.
    </p>
</section>

<section>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">📰 Derniers articles
    </h2>
    @forelse ($articles as $article)
    <div class="bg-white p-4 mb-4 rounded shadow">
        <h3 class="text-xl font-bold text-purple-700">{{ $article->title }}</h3>
        <p class="text-gray-600">{{ Str::limit($article->content, 120) }}</p>
        <a href="{{ route('articles.show', $article) }}"
            class="text-blue-600">Lire l’article</a>
    </div>
    @empty
    <p class="text-gray-500">Aucun article publié pour l’instant.</p>
    @endforelse
</section>
@endsection