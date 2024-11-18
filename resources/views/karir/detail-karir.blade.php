@extends('welcome')
@section('keywords', $karir->title )
@section('description', Illuminate\Support\Str::markdown($karir->requirements))
@section('title', 'Detail Karir')
@section('content')
    <!-- Karir: Start -->
    <section class="mt-4 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
        <div class="container mx-auto">
            <div class="my-5">
                <h2 class="text-3xl font-bold text-foreground">{{ $karir->title }}</h2>
                <span class="font-semibold">{{ $karir->work_location." | " }}</span>
                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                        <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                    </svg> --}}
                    {{ $karir->work_type }}
                </span>
            </div>
            <p class="mt-2 text-muted-foreground flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                    <path d="M184 48l144 0c4.4 0 8 3.6 8 8l0 40L176 96l0-40c0-4.4 3.6-8 8-8zm-56 8l0 40L64 96C28.7 96 0 124.7 0 160l0 96 192 0 128 0 192 0 0-96c0-35.3-28.7-64-64-64l-64 0 0-40c0-30.9-25.1-56-56-56L184 0c-30.9 0-56 25.1-56 56zM512 288l-192 0 0 32c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-32L0 288 0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-128z"/>
                </svg>
                <span>{{ $karir->perusahaan->name }}</span>
            </p>

            <p class="mt-2 text-muted-foreground flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5">
                    <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                </svg>
                <span>{{ $karir->perusahaan->address }}</span>
            </p>

            <p class="mt-2 text-muted-foreground flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5">
                    <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z"/>
                </svg>
                <span>{{ date('d F Y', strtotime($karir->closing_date)) }}</span>
            </p>

            <div class="my-10">
                <p class="my-2 text-3xl font-semibold">Description: </p>
                <span class="markdown-content">{!! Illuminate\Support\Str::markdown($karir->description) !!}</span>

                <p class="my-2 text-3xl font-semibold">Requirements: </p>
                <span class="markdown-content">{!! Illuminate\Support\Str::markdown($karir->requirements) !!}</span>

                <p class="my-2 text-3xl font-semibold">Salary:</p>
                <span>{{ $karir->salary }}</span>

                <p class="my-2 text-3xl font-semibold">Kandidat yang dibutuhkan:</p>
                <span>{{ $karir->candidate_needed }} Kandidat</span>
        </div>
    </section>
    <!-- Karir: End -->
@endsection
