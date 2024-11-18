
<!-- Paket: Start-->
<section id="paket" class="my-10">
    <div class="relative mx-2">
        <div class="bg-fbt bg-gradient-to-br from-fbt to-fbt-100 absolute w-full h-96 top-0 left-0 z-[-1] pattern-wavy rounded-lg"></div>
        <div class="container mx-auto p-4">

            <div class="container mx-auto text-center">
                <div class="relative inline-block text-center text-white">
                    <h2 class="text-3xl font-bold text-foreground">Harga Paket</h2>
                    <h3 class="text-2xl font-bold text-foreground">Tentukan Bandwidth Sesuai Kebutuhanmu</h3>
                    <p class="mt-4 text-muted-foreground">Sekarang saatnya menikmati kecepatan baru internet fiber dan unlimited dari Fiberconnect. Langganan Sekarang.</p>
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

                <div id="paket-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($paket as $item)
                        <div class="bg-white shadow-lg rounded-lg p-6 relative hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <h2 class="text-xl font-bold mb-2">{{ $item->nama_paket }}</h2>
                            <span class="bg-gradient-to-br from-pink-500 to-orange-400 text-white rounded-full px-3 py-1 text-lg">{{ $item->kecepatan }}</span>
                            <div class="mt-4 flex flex-col">
                                <div class="flex items-center space-x-2">
                                    <span class="line-through text-zinc-500">@money($item->harga + 55000)</span>
                                    <span class="bg-red-100 text-red-600 font-semibold rounded-full px-3 py-1 text-sm">26.8% OFF</span>
                                </div>
                                <span class="text-red-600 font-bold text-2xl mt-2">@money($item->harga)/Bulan</span>
                                <span class="text-zinc-500 text-sm mt-2">*Harga belum termasuk PPN & berlaku syarat dan ketentuan</span>
                            </div>
                            <a href="{{ $socialUrl . "?text=Halo, saya tertarik untuk berlangganan paket internet $item->nama_paket ($item->kecepatan). Mohon informasi lebih lanjut mengenai paket tersebut dan proses pendaftaran. Terima kasih!" }}" target="_BLANK" type="button" class="mt-4 w-full bg-gradient-to-br from-pink-500 to-orange-400 text-white py-2 rounded-lg text-center hover:bg-red-500">Berlangganan Sekarang</a>
                            <h3 class="font-bold mt-4">Benefit</h3>
                            <span class="markdown-content">{!! Illuminate\Support\Str::markdown($item->fitur) !!}</span>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</section>
<!-- Paket: End-->

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
            var paketContainer = document.getElementById('paket-container');
            paketContainer.innerHTML = '';

            data.paket.forEach(function(paket) {
                var paketDiv = `
                        <div class="bg-white shadow-lg rounded-lg p-6 relative hover:bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <h2 class="text-xl font-bold mb-2">${paket.nama_paket}</h2>
                            <span class="bg-gradient-to-br from-pink-500 to-orange-400 text-white rounded-full px-3 py-1 text-lg">${paket.kecepatan}</span>
                            <div class="mt-4 flex flex-col">
                                <div class="flex items-center space-x-2">
                                <span class="line-through text-zinc-500">${formatCurrency(paket.harga + 55000)}</span>
                                    <span class="bg-red-100 text-red-600 font-semibold rounded-full px-3 py-1 text-sm">26.8% OFF</span>
                                </div>
                                <span class="text-red-600 font-bold text-2xl mt-2">${formatCurrency(paket.harga)}/Bulan</span>
                                <span class="text-zinc-500 text-sm mt-2">*Harga belum termasuk PPN & berlaku syarat dan ketentuan</span>
                            </div>
                            <button class="mt-4 w-full bg-gradient-to-br from-pink-500 to-orange-400 text-white py-2 rounded-lg hover:bg-red-500">Berlangganan Sekarang</button>
                            <h3 class="font-bold mt-4">Benefit</h3>
                            <span class="markdown-content">${marked.parse(paket.fitur)}</span>
                        </div>`;
                paketContainer.innerHTML += paketDiv;
            });
        })
        .catch(error => console.error('Error fetching data:', error));
    });
</script>
