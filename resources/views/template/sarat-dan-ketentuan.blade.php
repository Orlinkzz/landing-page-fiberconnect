@extends('welcome')
@section('keywords', 'Syarat-syarat dan Ketentuan Umum Berlangganan' )
@section('description', 'Bergabunglah dengan kami dan nikmati layanan terbaik yang kami tawarkan!' )
@section('title', 'Syarat dan Ketentuan')
@section('content')
    <style> h2, h3{ padding: 10px 0px 10px 0px; } </style>

    <!-- Main Syarat Dan Ketentuan: Start-->
    <section class="px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
        <div class="container mx-auto">
            <div class="bg-fbt bg-gradient-to-br from-fbt to-fbt-100 top-0 left-0 pettren-complex-circle rounded-lg w-full">
                <div class="container mx-auto text-center">
                    <div class="relative inline-block text-center text-white my-8">
                        <h2 class="text-3xl font-bold text-foreground">Syarat-syarat dan Ketentuan Umum Berlangganan</h2>
                        <h3 class="text-2xl font-bold text-foreground">Temukan kemudahan berlangganan dengan syarat dan ketentuan yang jelas dan transparan.</h3>
                        <p class="text-muted-foreground">Bergabunglah dengan kami dan nikmati layanan terbaik yang kami tawarkan!</p>
                    </div>
                </div>
            </div>
            <div class="bg-background p-6">
                <span class="markdown-content">
                    {!! Illuminate\Support\Str::markdown($syarat->syarat_dan_ketentuan) !!}
                </span>
            </div>
            <div class="pb-10">
                <p class="text-lg text-gray-600 dark:text-white">Jelajahi berbagai paket internet yang kami tawarkan untuk memenuhi kebutuhan Anda
                    <a href="{{ route('paket.index') }}" class="text-fbt-100 font-semibold hover:underline">Klik di sini</a></p>
                <p class="text-lg text-gray-600 dark:text-white">untuk melihat pilihan paket dan temukan yang paling sesuai untuk Anda!</p>
            </div>
        </div>
    </section>
    <!-- Main Syarat Dan Ketentuan: End -->
@endsection
