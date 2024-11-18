@extends('welcome')
@section('keywords', $tentang->tentang_kami)
@section('description', Illuminate\Support\Str::markdown($tentang->pilih_kami) )
@section('title', 'Tentang Kami')
@section('content')
<!-- Main Tentang Kami: Start--->
<section class="my-4 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
    <div class="container mx-auto px-4 py-12 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4 dark:text-white ">Tentang Kami</h2>
        <p class="mt-2 text-gray-600 mb-8 dark:text-white">Kami hadir memberikan layanan terbaik untuk kamu <b>#TheFasterTheBetter</b>.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-5 relative hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <h3 class="text-xl font-semibold mb-2">Fiberconnect</h3>
                <p class="text-left">{{ $tentang->tentang_kami }}</p>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-5 relative hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <h3 class="text-xl font-semibold mb-2">Visi</h3>
                <p class="text-left">{{ $tentang->visi }}</p>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-5 relative hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <h3 class="text-xl font-semibold mb-2">Misi</h3>
                <span class="markdown-content text-left">{!! Illuminate\Support\Str::markdown($tentang->misi) !!}</span>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-5 relative hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <h3 class="text-xl font-semibold mb-2">Tim</h3>
                <p class="text-left">{{ $tentang->tentang_tim }}</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 mt-8 relative hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <h3 class="text-xl font-semibold mb-2">Mengapa Memilih Fiberconnect?</h3>
            <span class="markdown-content text-left text-md">{!! Illuminate\Support\Str::markdown($tentang->pilih_kami) !!}</span>
        </div>
        <p class="mt-8 text-gray-600 dark:text-white">Terima kasih telah memilih Fiberconnect sebagai penyedia layanan internet Anda. Kami bangga menjadi bagian dari pengalaman digital Anda dan berkomitmen untuk terus melayani Anda dengan cara terbaik. Untuk informasi lebih lanjut atau pertanyaan, jangan ragu untuk menghubungi kami!</p>
    </div>
</section>
<!-- Main Tentang Kami: End -->


<!-- Main hubungi kami: Start-->
<section class="my-4 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
    <div class="container mx-auto text-center">
        <div class="bg-background p-6">
            <h2 class="text-3xl font-bold text-foreground">Nikmati layanan kami</h2>
            <p class="text-muted-foreground mt-2">Kepuasan kamu merupakan prioritas utama bagi kami. Kami hadir memberikan layanan terbaik untuk kamu <b>#TheFasterTheBetter</b>.</p>
            <!-- Sosial Media -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-center">
                @foreach ($socialsByPerusahaan as $companyId => $socials)
                    @foreach ($socials as $index => $s)
                        <div id="social-{{ $companyId }}-{{ $index }}" class="social-item hidden hover:bg-gray-100 dark:hover:bg-gray-600 bg-card p-4 rounded-lg shadow-md dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 flex items-center gap-4">
                            {{ svg($s->icon, 'w-16 h-16') }}
                            <div class="text-left">
                                <h2 class="font-semibold text-lg text-primary">{{ $s->platform }}</h2>
                                <p class="text-muted-foreground">Senin - Sabtu (Jam Kerja)</p>
                                <a href="{{ $s->url }}" class="hover:underline">{{ $s->parsed_url }} </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <div class="my-10">
                <h2 class="text-2xl font-bold mt-8 text-primary">Lokasi Kantor</h2>
                <p class="text-muted-foreground">Sambutlah Tim kami yang ramah selalu siap untuk berbincang-bincang denganmu.</p>
                <div class="mt-4 flex flex-col lg:flex-row">
                    <style>
                        input[type="radio"]:checked + span { display:  contents;}
                    </style>
                    <div class="w-full lg:w-1/2 bg-card p-2 rounded-lg">
                        @foreach ($perusahaan as $p)
                            <!--  {{$p->city}}  -->
                            <label for="plan-{{$p->id}}" class="flex items-center bg-white p-2 my-2 rounded-lg shadow-md cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <input type="radio" name="plan" id="plan-{{$p->id}}" value="{{$p->id}}" class="hidden peer" {{ $p->id == 1 ? 'checked' : '' }} onclick="updateContent({{$p->id}})"/>
                                <span aria-hidden="true" class="hidden peer-checked:block inherit inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
                                    <span class="top-4 right-4 h-6 w-6 mr-2 inline-flex items-center justify-center rounded-xl bg-green-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-green-600">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                                </svg>
                                <div class="text-left">
                                    <span class="font-bold text-gray-500 leading-tight px-2 dark:text-white">{{ $p->city }}</span>
                                    <br>
                                    <span class="text-gray-500 leading-tight px-2 dark:text-white">{{ $p->address }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    <div class="w-full lg:w-1/2 mt-4 lg:mt-0 p-2">
                        @foreach ($perusahaan as $m)
                            <!--  {{$m->city}}  -->
                            <iframe id="map-{{ $m->id }}" class="map-item w-full h-96 hidden rounded-lg" src="{{ $m->maps }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main hubungi kami: End -->
@endsection

@section('script')
    <script>
        function updateContent(location) {
            // Update map
            document.querySelectorAll('.map-item').forEach(iframe => iframe.classList.add('hidden'));
            document.getElementById('map-' + location).classList.remove('hidden');

            // Update social
            document.querySelectorAll('.social-item').forEach(item => item.classList.add('hidden'));
            document.querySelectorAll('.social-item').forEach(item => {
                if (item.id.startsWith('social-' + location)) {
                    item.classList.remove('hidden');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const defaultMap = document.querySelector('input[name="plan"]:checked')?.value || 1;
            updateContent(defaultMap);
        });
    </script>
@endsection
