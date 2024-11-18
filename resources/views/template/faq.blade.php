<!-- FAQ: Start -->
<section class="mt-5 ">
    <div class="container mx-auto shadow-sm px-4 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
        <h2 class="text-3xl font-bold text-center text-primary">FAQ</h2>
        <h3 class="text-xl text-center text-muted-foreground">Ada pertanyaan? Lihat disini</h3>
        <p class="text-center text-muted-foreground mb-8">Jelajahi FAQ kami untuk menemukan jawaban cepat dan mudah tentang layanan kami. Kami di sini untuk membantu Anda!.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($faqs as $item)
                <div class="bg-card p-4 rounded-lg shadow-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div class="flex items-center mb-2">
                        <div class="bg-secondary text-secondary-foreground rounded-full p-2 mr-2">
                            <span class="text-xl">?</span>
                        </div>
                        <h4 class="text-lg font-semibold">{!! Illuminate\Support\Str::markdown( $item->question ) !!}</h4>
                    </div>
                    <span class="markdown-content"> {!! Illuminate\Support\Str::markdown( $item->answer ) !!} </span>
                </div>
            @endforeach
        </div>
        @if ($total_faqs > 4)
            <!-- Pagination: Start -->
            <div class="flex justify-between mt-8 pb-4">
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $faqs->firstItem() }}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $faqs->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $total_faqs }}</span> Entries
                </span>
                <nav class="relative z-0 inline-flex">
                    <a href="{{ route('faq.index') }}" style="text-decoration: underline">Lihat selengkapnya</a>
                </nav>
            </div>
            <!-- Pagination: End -->
        @endif
    </div>
</section>
<!-- FAQ: End -->
