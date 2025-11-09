@extends('layouts.app')

@section('title', 'Bienvenue sur le blog')

@section('content')
<section class="mb-8">
    <h1 class="text-3xl font-bold mb-6 text-center">👑 CodingQueen40</h1>
    <p class="leading-relaxed text-white text-xl sm:text-2xl max-w-3xl mx-auto">
        Salut, moi c’est Grey – maman solo, dev en reconversion, fondatrice de
        CodingQueen40 💻🌺.
        Ici, je partage mes apprentissages sur Laravel, le web, et
        l’indépendance des femmes de 40+.
    </p>
</section>

<section>
    <h2 class="text-2xl font-semibold mb-4 text-center text-white">📰 Découvrez
        mes derniers articles sur le développement web, la tech, et la vie de
        femme libre
        à 40+ 💪🏾
    </h2>

    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($articles as $article)
        <div
            class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-bold text-purple-700">{{ $article->title }}
            </h3>
            <p class="text-gray-600">{{ Str::limit($article->content, 120) }}
            </p>
            <a href="{{ route('articles.show', $article) }}"
                class="text-indigo-600 hover:underline font-medium">Lire
                l’article</a>
        </div>
        @empty
        <p class="text-gray-300">Aucun article publié pour l’instant.</p>
        @endforelse
    </div>

</section>
@endsection