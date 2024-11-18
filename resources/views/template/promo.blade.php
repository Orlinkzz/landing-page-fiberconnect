@extends('welcome')
@section('keywords', 'Promo' )
@section('description', 'Nikmati berbagai pilihan promo dari paket internet dan pembayaran dengan penawaran terbaru setiap bulan.' )
@section('content')
<!-- Promo: Start-->
<section id="promo" class="my-5">
    <div class="relative mx-2">
        <div class="bg-fbt bg-gradient-to-br from-fbt to-fbt-100 absolute w-full {{ $promo->isEmpty() ? 'h-72' : 'h-96'}} top-0 left-0 z-[-1] pattern-wavy rounded-lg"></div>
            <div class="container mx-auto p-4">
                <div class="container mx-auto text-center mb-10">
                    <div class="relative inline-block text-center text-white">
                        <h2 class="text-3xl font-bold text-foreground">PROMO!</h2>
                        <h3 class="text-2xl font-bold text-foreground">Jangan lewatkan <b>promo</b> bulanan kami!</h3>
                        <p class="text-muted-foreground">Nikmati berbagai pilihan promo dari paket internet dan pembayaran dengan penawaran terbaru setiap bulan.</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="relative inline-block text-left">
                        <select id="perusahaan-select" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($perusahaan as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $perusahaanCode ? 'selected' : '' }}>
                                    {{ $item->city }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="promo-container">
                    @if($promo->isEmpty())
                    <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col justify-between h-full relative dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <p>Tidak ada promo yang tersedia.</p>
                    </div>
                    @else
                        @foreach($promo as $item)
                            <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col justify-between h-full relative dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <img src="{{ asset('storage/'.$item->gambar) }}" class="block w-full rounded-lg" alt="{{ $item->nama_promo }}">
                                <div class="mt-4 flex flex-col flex-grow">
                                    <h3 class="font-bold text-lg">{{ $item->nama_promo }}</h3>
                                    <p class="mt-2">{!! Str::limit($item->deskripsi, 30, ' ...') !!}</p>
                                </div>

                                <div class="mt-4 flex flex-col">
                                    <p class="font-semibold">Periode Promo:</p>
                                    <span class="text-gray-700 dark:text-gray-300 flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                                            <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                        </svg>
                                        <span>{{ date('d M Y', strtotime($item->tanggal_mulai)) }} - {{ date('d M Y', strtotime($item->tanggal_selesai)) }}</span>
                                    </span>
                                </div>
                                <a href="{{ route('promo.show', ['promo' => $item->id]) }}" class="w-full bg-gradient-to-br from-pink-500 to-orange-400 text-white text-center py-2 rounded-lg mt-4 hover:bg-red-500 transition-colors duration-300 mt-auto">Lihat promo</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Promo: End-->
@endsection

@section('script')
    <script>
        function formatCurrency(amount, currencySymbol = 'Rp') {
            const formattedAmount = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            return `${currencySymbol}${formattedAmount}`;
        }
        document.getElementById('perusahaan-select').addEventListener('change', function() {
            var perusahaanCode = this.value;

            fetch(`{{ url()->current() }}?perusahaan=${perusahaanCode}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                var promoContainer = document.getElementById('promo-container');
                promoContainer.innerHTML = '';
                if (data.promo.length === 0) {
                    promoContainer.innerHTML = `
                        <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col justify-between h-full relative dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <p>Tidak ada promo yang tersedia.</p>
                        </div>`;
                } else {
                    data.promo.forEach(function(promo) {
                        var paketDiv = `
                            <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col justify-between h-full relative dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <img src="{{ asset('storage/${promo.gambar}') }}" class="block w-full rounded-lg" alt="${promo.nama_promo}">
                                <div class="mt-4 flex flex-col flex-grow">
                                    <h3 class="font-bold text-lg">${promo.nama_promo}</h3>
                                    <p class="mt-2">${promo.deskripsi}</p>
                                    <p class="mt-2 font-semibold">Periode Promo:</p>
                                    <span class="text-gray-700 dark:text-gray-300">${promo.tanggal_mulai} - ${promo.tanggal_selesai}</span>
                                </div>
                                <a href="promo/${promo.id}" class="w-full bg-gradient-to-br from-pink-500 to-orange-400 text-white text-center py-2 rounded-lg mt-4 hover:bg-red-500 transition-colors duration-300 mt-auto">Lihat promo</a>
                            </div>`;
                        promoContainer.innerHTML += paketDiv;
                    });
                }
            })
            .catch(error => console.error('Error fetching data:', error));
        });
    </script>
@endsection
