<div>
        <!-- Karir: Start -->
        <section class="mt-4 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-foreground text-center">Karir</h2>
                <p class="mt-2 text-muted-foreground text-center">Mari bergabung bersama Fiberconnect dan bersama wujudkan <b>#TheFasterTheBetter</b>.</p>

                <div class="my-10">
                    <h1 class="text-2xl font-bold mb-4">Daftar Pekerjaan Terbaru</h1>

                    <form id="filter-form" method="GET" action="{{ route('karir.index') }}" class="mb-6">
                        <div class="space-y-4">
                            @if($kategoriList->isNotEmpty())
                                <div class="overflow-x-auto">
                                    <ul class="flex space-x-4 text-sm font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-900 dark:border-gray-600 dark:text-white">
                                        <div class="w-full md:w-1/2">
                                            <form id="filter-form" action="{{ route('karir.index') }}">
                                                <label for="search" class="sr-only">Search</label>
                                                <div class="relative w-full">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <input type="text" name="search" id="search" value="{{ request('search') }}" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                            <div class="flex items-center w-full space-x-3 md:w-auto">
                                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4 mr-2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span id="filter-label">Filter</span>
                                                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                                    </svg>
                                                </button>
                                                <!-- Dropdown menu -->
                                                <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                                        Category
                                                    </h6>
                                                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                                        <li class="flex items-center">
                                                            <input id="kategori-all" name="kategori" type="radio" value=""
                                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 {{ request('kategori') == '' ? 'checked' : '' }}" />
                                                            <label for="kategori-all" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                                {{ __('Semua Kategori') }}
                                                            </label>
                                                        </li>
                                                    @foreach($kategoriList as $kategori)
                                                        <li class="flex items-center">
                                                            <input id="kategori-{{ $kategori->id }}" name="kategori" type="radio" value="{{ $kategori->id }}"
                                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                                            <label for="kategori-{{ $kategori->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                                {{ $kategori->name }}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </ul>
                                </div>
                            @else
                                <select name="kategori" class="form-select mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                    <option value="">Semua Kategori</option>
                                    <option value="no-category" disabled>Tidak ada kategori</option>
                                </select>
                            @endif
                        </div>
                    </form>

                    <div id="jobs-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-5">
                        @if($karir->isEmpty())
                            <p>Tidak ada lowongan pekerjaan yang tersedia.</p>
                        @else
                            @foreach($karir as $item)
                                <a href="{{ route('karir.show', ['karir' => $item->id]) }}">
                                    <div class="flex flex-col shadow-lg transition-transform duration-300 dark:hover:bg-gray-600 hover:bg-gray-200 hover:scale-105 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
                                        <div class="dark:bg-gray-700 dark:bg-card dark:hover:bg-gray-600 hover:bg-gray-200 rounded-lg shadow p-4">
                                            <div class="flex items-center">
                                                <img src="{{ asset('storage/perusahaan/fbtnew.png') }}" alt="Fiberconnect Logo" class="mr-3 h-14" />
                                                <div>
                                                    <h2 class="text-xl font-semibold">{{ $item->title }}</h2>
                                                    <p class="text-zinc-600">{{ $item->salary }} per bulan</p>
                                                    <p class="text-zinc-500">{{ $item->perusahaan->name }}</p>
                                                    <p class="text-zinc-500">{{ $item->location }} | 0-3 tahun</p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="mt-2 text-sm text-zinc-400">
                                                <p>Dibuat pada {{ date('d F Y', strtotime($item->posted_date)) }}</p>
                                                <p>Batas akhir lamaran
                                                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                        {{ date('d F Y', strtotime($item->closing_date)) }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif

                    </div>
                    @if ($totalEntries > 6)
                        <!-- Pagination: Start -->
                        <div class="flex justify-between mt-8">
                            <span class="text-sm text-gray-700 dark:text-gray-400">
                                Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $karir->firstItem() }}</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $karir->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $totalEntries }}</span> Entries
                            </span>
                            <nav class="relative z-0 inline-flex shadow-sm">
                                <!-- Buttons -->
                                <button wire:click="previousPage" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-lg border-gray-700 rounded-l-lg hover:bg-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ $karir->onFirstPage() ? 'disabled' : '' }}>
                                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                    </svg>
                                    Prev
                                </button>
                                <!-- Page Numbers -->
                                @for ($i = 1; $i <= $karir->lastPage(); $i++)
                                    <button wire:click="gotoPage({{ $i }})" class="relative inline-flex items-center px-3 text-sm font-medium {{ $i == $karir->currentPage() ? 'bg-gray-500 text-white' : 'text-white bg-gray-800' }}  leading-tight text-gray-500 hover:bg-gray-300 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        {{ $i }}
                                    </button>
                                @endfor
                                <button wire:click="nextPage" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-lg border-gray-700 rounded-e hover:bg-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ !$karir->hasMorePages() ? 'disabled' : '' }}>
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

            </div>
        </section>
        <!-- Karir: End -->
</div>
