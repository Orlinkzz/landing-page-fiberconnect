<div>
    <!-- Berita: Start--->
    <section class="px-2 py-6 my-4 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-foreground">Berita terbaru</h2>
            <p class="mt-2 text-muted-foreground">Dapatkan informasi terbaru dari <b>Fiberconnect</b> di sini!</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-10">
                @foreach ($news as $item)
                    <div class="flex flex-col items-center p-6 bg-card rounded-lg shadow-lg transition-transform duration-300 hover:scale-105 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
                        <div class="mb-4">
                            <img src="{{ asset('storage/'.$item->gambar) }}" alt="news {{ $item->judul }}" class="h-auto transition-transform duration-300 hover:animate-bounce" />
                        </div>
                        <h3 class="text-lg font-semibold text-foreground">{{ $item->judul }}</h3>
                        <p class="mt-2 text-muted-foreground text-left">{!! Illuminate\Support\Str::markdown( Str::limit($item->konten, 200, ' ...') ) !!}</p>
                        <div class="flex-1 mt-4"></div>
                        <a href="{{ route('news.show', ['news' => $item->id]) }}" class="inline-flex items-center text-gray-900 rounded font-medium hover:underline hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fbt md:p-0 dark:text-white md:dark:hover:text-fbt-100 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Baca selengkapnya
                            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>

            @if ($totalEntries > 8)
            <!-- Pagination: Start -->
            <div class="flex justify-between mt-8">
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $news->firstItem() }}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $news->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $totalEntries }}</span> Entries
                </span>
                <nav class="relative z-0 inline-flex shadow-sm">
                    <!-- Buttons -->
                    <button wire:click="previousPage" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-lg border-gray-700 rounded-l-lg hover:bg-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ $news->onFirstPage() ? 'disabled' : '' }}>
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                        </svg>
                        Prev
                    </button>
                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $news->lastPage(); $i++)
                        <button wire:click="gotoPage({{ $i }})" class="relative inline-flex items-center px-3 text-sm font-medium {{ $i == $news->currentPage() ? 'bg-gray-500 text-white' : 'text-white bg-gray-800' }}  leading-tight text-gray-500 hover:bg-gray-300 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            {{ $i }}
                        </button>
                    @endfor
                    <button wire:click="nextPage" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-lg border-gray-700 rounded-e hover:bg-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ !$news->hasMorePages() ? 'disabled' : '' }}>
                        Next
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>

                </nav>
            </div>
            <!-- Pagination: End -->
            @endif
        </div>
    </section>
</div>
