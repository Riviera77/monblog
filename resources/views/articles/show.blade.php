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
@endsection