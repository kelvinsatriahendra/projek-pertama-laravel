@extends('layouts.app')

@section('title', $author->name)

@section('content')
    {{-- Bagian Profil Author Utama --}}
    <div class="flex gap-4 items-center mb-10 text-white p-10 bg-cover rounded-xl" style="background-image: url('{{ asset('images/author-bg.jpg') }}')">
        <img src="{{ asset('storage/' . $author->avatar) }}" alt="profile" class="rounded-full max-w-28 border-4 border-white">
        <div class="">
            <h1 class="font-bold text-2xl">{{ $author->name }}</h1>
            <p class="mt-2 text-gray-200">
                {{ $author->bio }}
            </p>
        </div>
    </div>

    {{-- Daftar Berita yang Ditulis oleh Author --}}
    <div class="flex flex-col gap-5 px-4 lg:px-14">
        <h2 class="font-bold text-xl mb-4">Artikel oleh {{ $author->name }}</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

            @forelse ($author->news as $news)
                <a href="{{ route('news.show', $news->slug) }}" class="flex flex-col">
                    <div class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition h-full flex flex-col">
                        
                        <div class="relative">
                            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-40 object-cover rounded-xl mb-3">
                            <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal -ml-1 -mt-10 text-xs absolute top-0 left-0">
                                {{ $news->newsCategory->title }}
                            </div>
                        </div>

                        <p class="font-bold text-base mb-2 flex-grow">{{ $news->title }}</p>
                        <p class="text-slate-400 text-sm">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    <p>Penulis ini belum memiliki artikel.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection