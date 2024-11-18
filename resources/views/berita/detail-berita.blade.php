@extends('welcome')
@section('keywords', $news->judul)
@section('description', Illuminate\Support\Str::markdown($news->konten) )
@section('title', 'Detail News')
@section('content')
    <!-- Karir: Start -->
    <section class="mt-4 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <img src="{{ asset('storage/'.$news->gambar) }}" class="block w-100 rounded-lg" alt="{{ $news->kategori->nama_kategori }}">
            </div>

            <div class="my-5">
                <h2 class="text-3xl font-bold text-foreground my-3">{{ $news->judul }}</h2>
                <span class="font-semibold">{{ $news->tanggal}}</span> | <span class="font-semibold">{{ $news->kategori->nama_kategori }}</span>
            </div>

        <div class="my-7">
            <span class="markdown-content">{!! Illuminate\Support\Str::markdown($news->konten) !!}</span>
        </div>
    </section>
    <!-- Karir: End -->
@endsection
