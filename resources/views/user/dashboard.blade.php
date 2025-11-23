@extends('layouts.app')

@section('title', 'Mon tableau de bord')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold mb-4">👤 Mon tableau de bord</h1>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mon espace personnel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bienvenue {{ $user->name }} !

                    <hr class="my-4">

                    <h3 class="text-lg font-bold mb-2">📚 Articles sur lesquels
                        tu as voté :</h3>

                    @if ($votedArticles->count())
                    <ul class="list-disc list-inside text-sm text-gray-700">
                        @foreach ($votedArticles as $article)
                        <li>
                            <a href="{{ route('articles.show', $article) }}"
                                class="text-blue-600 hover:underline">
                                {{ $article->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-gray-500">Tu n’as encore voté sur aucun
                        article.</p>
                    @endif

                    <hr class="my-4">

                    <a href="{{ route('profile.edit') }}"
                        class="inline-block mt-4 bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                        ✏️ Modifier mon profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection