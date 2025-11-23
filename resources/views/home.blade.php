@extends('layouts.app')

@section('title', 'Bienvenue sur le blog')

@section('content')
<div class="bg-gray-900 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2
                class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">
                👑 CodingQueen40</h2>
            <p class="mt-2 text-lg/8 text-gray-300">Salut, moi c’est Grey –
                maman solo, dev en reconversion, fondatrice de
                CodingQueen40 💻🌺.
                Ici, je partage mes apprentissages sur Laravel, le web, et
                l’indépendance des femmes de 40+.</p>
        </div>
        <div
            class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse ($articles as $article)
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-400">Mar 16,
                        2020</time>
                    <a href="#"
                        class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800">Marketing</a>
                </div>
                <div class="group relative grow">
                    <h3
                        class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">
                        {{ Str::limit($article->content, 120) }}</p>
                </div>
                <div
                    class="relative mt-8 flex items-center gap-x-4 justify-self-end">
                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="" class="size-10 rounded-full bg-gray-800" />
                    <div class="text-sm/6">
                        <p class="font-semibold text-white">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Michael Foster
                            </a>
                        </p>
                        <p class="text-gray-400">Co-Founder / CTO</p>
                    </div>
                </div>
            </article>
            @empty
            <p class="text-gray-300">Aucun article publié pour l’instant.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection