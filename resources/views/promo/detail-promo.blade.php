@extends('welcome')
@section('keywords', $promo->nama_promo )
@section('description', Illuminate\Support\Str::markdown($promo->deskripsi) )
@section('title', 'Detail Promo')
@section('content')
    <!-- promo: Start -->
    <section class="mt-4 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
        <div class="container mx-auto">

            <style>
                .image { display: block; width: 100%; height: auto; }
                .overlay { position: absolute; top: 0; bottom: 0; left: 0; right: 0; height: 100%; width: 100%; opacity: 0; transition: .5s ease; background-color: #ba000040   ; }
                .text { color: white; font-size: 20px; position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); text-align: center; }
                #modal:hover .overlay { opacity: 1;}
            </style>

            <figure class="relative max-w-sm mx-auto transition-all duration-300 cursor-pointer filter hover:grayscale-0">
                <a data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="block hover:overlay" id="modal">
                    <img src="{{ asset('storage/'. $promo->gambar) }}" class="block w-72 rounded-lg cursor-pointer image" alt="{{ $promo->nama_promo }}">
                    <div class="overlay">
                        <div class="text">Tampilkan popup!</div>
                    </div>
                </a>
            </figure>

            <div class="my-5">
                <h2 class="text-3xl font-bold text-foreground">{{ $promo->nama_promo }}</h2>
                <span class="text-gray-700 dark:text-gray-300 flex items-center space-x-2 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                        <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                    </svg>
                    <span>{{ date('d M Y', strtotime($promo->tanggal_mulai)) }} - {{ date('d M Y', strtotime($promo->tanggal_selesai)) }}</span>
                </span>
            </div>
            <div class="my-5">
                <p class="my-2 text-2xl font-semibold">Description: </p>
                <span class="markdown-content">{!! Illuminate\Support\Str::markdown($promo->deskripsi) !!}</span>
                <p class="my-2 text-2xl font-semibold">Tipe Promo:</p>
                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                    {{ ucfirst($promo->tipe_promo) }}
                </span>
            </div>
        </div>
    {{-- </section> --}}
    <!-- promo: End -->


    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <img src="{{ asset('storage/'. $promo->gambar) }}" class="block w-full rounded-lg" alt="{{ $promo->nama_promo }}">
                {{-- w-auto h-full --}}
                {{-- <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Main hubungi kami: Start-->
    {{-- <section class="my-8 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg"> --}}
        <div class="pb-6">
            <p class="text-lg text-gray-600 dark:text-white">Jangan lewatkan kesempatan ini! Hubungi tim kami sekarang juga dan nikmati promo {{ $promo->nama_promo }} ini!</p>
            <p class="text-lg text-gray-600 dark:text-white"><a href="{{ route('paket.index') }}" class="text-fbt-100 font-semibold hover:underline">Klik di sini</a> untuk melihat pilihan paket dan temukan yang paling sesuai untuk Anda!</p>
        </div>
        <div class="container mx-auto text-center">
            <div class="bg-background p-6">
                <h2 class="text-3xl font-bold text-foreground">Hubungi layanan kami</h2>
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
