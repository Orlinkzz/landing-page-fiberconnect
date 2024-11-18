@extends('welcome')
@section('title', 'News')
@section('keywords', 'Portal Berita, Berita Terkini, Artikel, Informasi, Update Terbaru, Fiberconnect, Berita Teknologi')
@section('description', 'Dapatkan berita terkini dan informasi terbaru seputar teknologi, layanan, dan perkembangan industri di portal berita Fiberconnect. Ikuti update terbaru hanya di sini.')
@section('content')
    @livewire('news-list')
@endsection
