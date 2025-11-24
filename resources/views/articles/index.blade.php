@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div class="bg-gray-900 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">📰 Tous les articles</h1>

        @auth
        @if(Auth::user()->is_admin)
        <a href="{{ route('admin.articles.create') }}"
            class="bg-purple-600 text-white px-4 py-2 rounded mb-4 inline-block">
            ✍️ Écrire un nouvel article
        </a>
        @endif
        @endauth

        <div
            class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse ($articles as $article)
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="group relative grow">
                    <h3
                        class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                        <a href="{{ route('articles.show', $article) }}"
                            class="relative block">
                            <span class="absolute inset-0"></span>
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">
                        {{ Str::limit($article->content, 120) }}</p>
                    <small class="text-gray-500">
                        Par {{ $article->user->name }} le
                        {{ $article->created_at->format('d/m/Y') }}
                    </small>
                    <div class="mt-2 space-x-4">
                        <a href="{{ route('articles.show', $article) }}"
                            class="text-blue-600">Voir</a>
                        @auth
                        @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.articles.edit', $article) }}"
                            class="text-yellow-600">Modifier</a>
                        <form
                            action="{{ route('admin.articles.destroy', $article) }}"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Supprimer ?')"
                                class="text-red-600">
                                Supprimer
                            </button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </article>
            @empty
            <p class="text-gray-400">Aucun article pour le moment.</p>
            @endforelse
        </div>
    </div>



    {{ $articles->links() }} {{-- Pagination --}}
    @endsection