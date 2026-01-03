@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <div class="flex flex-col lg:flex-row w-full gap-10 px-4 lg:px-14 mt-10">

        <div class="lg:w-8/12">
            <h1 class="font-bold text-xl lg:text-2xl mb-6 text-center lg:text-left">
                {{ $news->title }}
            </h1>
            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full max-h-96 rounded-xl object-cover mb-6">
            <div class="prose max-w-none">
                {!! $news->content !!}
            </div>
        </div>

        <div class="lg:w-4/12 flex flex-col">
            <div class="sticky top-24 z-40">
                <h2 class="font-bold mb-8 text-xl lg:text-2xl">Berita Terbaru Lainnya</h2>
                <div class="gap-5 flex flex-col">
                    @foreach ($newests as $new)
                        {{-- Ganti 'news.show' dengan nama route detail berita Anda --}}
                        <a href="{{ route('news.show', $new) }}">
                            <div class="flex gap-3 border border-slate-300 hover:border-primary p-3 rounded-xl">
                                <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}"
                                    class="w-32 h-24 rounded-xl object-cover">
                                <div class="flex-1">
                                    {{-- Kategori bisa ditambahkan di sini jika perlu --}}
                                    <p class="font-bold text-sm lg:text-base line-clamp-2">{{ $new->title }}</p>
                                    <p class="text-slate-400 mt-2 text-xs">
                                        {{ \Carbon\Carbon::parse($new->created_at)->format('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-col gap-4 mb-10 p-4 lg:p-10 lg:px-14 w-full lg:w-2/3 mt-10">
        <h2 class="font-semibold text-xl lg:text-2xl mb-2">Author</h2>
        {{-- Ganti 'author.show' dengan nama route profil author Anda jika ada --}}
        <a href="#">
            <div class="flex flex-col lg:flex-row gap-4 items-center border border-slate-300 rounded-xl p-6 lg:p-8 hover:border-primary">
                <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="{{ $news->author->name }}"
                    class="rounded-full w-24 h-24 lg:w-28 lg:h-28 border-2 border-primary object-cover">
                <div class="text-center lg:text-left">
                    <p class="font-bold text-lg lg:text-xl">{{ $news->author->name }}</p>
                    <p class="text-sm lg:text-base leading-relaxed mt-2">
                        {{ \Str::limit($news->author->bio, 150) }}
                    </p>
                </div>
            </div>
        </a>
    </div>
@endsection