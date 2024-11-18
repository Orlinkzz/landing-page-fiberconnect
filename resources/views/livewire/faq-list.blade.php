<div id="faq-container">
    <section class="my-5">
        <div class="container mx-auto px-4 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
            <h2 class="text-3xl font-bold text-center text-primary">FAQ</h2>
            <h3 class="text-xl text-center text-muted-foreground">Ada pertanyaan? Lihat disini</h3>
            <p class="text-center text-muted-foreground mb-8">Jelajahi FAQ kami untuk menemukan jawaban cepat dan mudah tentang layanan kami. Kami di sini untuk membantu Anda!</p>

            <div class="max-w-screen-xl mx-auto">
                <div class="flex flex-col md:flex-row">
                    <!-- Kategori di sebelah kiri -->
                    <div class="flex-none w-full md:w-64">
                        <a wire:click="selectCategory(null)" class="block text-lg font-semibold mb-2 cursor-pointer p-2 rounded-lg mx-4 {{ $categoryId == null ? 'bg-fbt-100 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                            All
                        </a>
                        @foreach ($kategori_faqs as $item)
                            <a wire:click="selectCategory({{ $item->id }})" class="block text-lg font-semibold mb-2 cursor-pointer p-2 rounded-lg mx-4 {{ $categoryId == $item->id ? 'bg-fbt-100 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                                {{ $item->name }}
                            </a>
                        @endforeach
                    </div>

                    <!-- FAQ di sebelah kanan -->
                    <div class="flex-1 border-8">
                        @forelse ($faqs as $item)
                            <div id="kategori-{{ $item->kategori_id }}" class="bg-card p-4 mb-4 rounded-lg shadow-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div class="flex items-center mb-2">
                                    <div class="bg-secondary text-secondary-foreground rounded-full p-2 mr-2">
                                        <span class="text-xl">?</span>
                                    </div>
                                    <h4 class="text-lg font-semibold">{!! Illuminate\Support\Str::markdown($item->question) !!}</h4>
                                </div>
                                <span class="markdown-content"> {!! Illuminate\Support\Str::markdown($item->answer) !!} </span>
                            </div>
                        @empty
                            <p class="text-center text-muted-foreground">Tidak ada FAQ untuk kategori ini.</p>
                        @endforelse

                        <!-- Pagination: Start -->
                        @if ($totalEntries > 4)
                            <div class="flex flex-col md:flex-row items-center justify-between mt-8">
                                <span class="text-sm text-gray-700 dark:text-gray-400">
                                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $faqs->firstItem() }}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $faqs->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $totalEntries }}</span> Entries
                                </span>
                                <nav class="relative z-0 inline-flex shadow-sm mt-2 md:mt-0">
                                    <!-- Buttons -->
                                    <button wire:click="previousPage" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-lg border-gray-700 rounded-l-lg hover:bg-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ $faqs->onFirstPage() ? 'disabled' : '' }}>
                                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                        </svg>
                                        Prev
                                    </button>
                                    <!-- Page Numbers -->
                                    @for ($i = 1; $i <= $faqs->lastPage(); $i++)
                                        <button wire:click="gotoPage({{ $i }})" class="relative inline-flex items-center px-3 text-sm font-medium {{ $i == $faqs->currentPage() ? 'bg-gray-500 text-white' : 'text-white bg-gray-800' }}  leading-tight text-gray-500 hover:bg-gray-300 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            {{ $i }}
                                        </button>
                                    @endfor
                                    <button wire:click="nextPage" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-lg border-gray-700 rounded-e hover:bg-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ !$faqs->hasMorePages() ? 'disabled' : '' }}>
                                        Next
                                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </button>
                                </nav>
                            </div>
                        @endif
                        <!-- Pagination: End -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
