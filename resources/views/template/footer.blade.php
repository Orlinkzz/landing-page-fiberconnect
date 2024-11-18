
	<!-- Footer: Start-->
	<footer class="bg-white rounded-lg shadow dark:bg-gray-800">
		<div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
			<div class="grid w-full gap-6 md:grid-cols-2">
				<div class="mb-6 md:mb-0">
					<a href="/" class="flex items-center">
						<img src="{{ asset('storage/perusahaan/fbtnew.png') }}" class="h-8 me-3" alt="Fiberconnect Logo" />
						<span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Fiberconnect</span>
					</a>
					<span class="self-center whitespace-pre-line  dark:text-white">
						Provider internet terbaik dengan koneksi cepat
						kini hadir dengan layanan Broadbrand dan internet service terbesar.
						dimana kamu dapat memilih sesuai dengan kebutuhan kamu.
					</span>
				</div>
					<div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
							<div>
								<h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Tentang Kami</h2>
								<ul class="text-gray-500 dark:text-gray-400 font-medium">
									<li>
										<a href="{{ route('paket.dacen') }}" target="_BLANK" class="hover:underline">Data Center</a>
									</li>
									<li>
										<a href="{{ route('paket.index')}}" class="hover:underline">Produk</a>
									</li>
									<li>
										<a href="{{ route('karir.index') }}" class="hover:underline">Karir
											<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Hiring!
											</span>
										</a>
									</li>
								</ul>
							</div>
							<div>
								<h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Ikuti Kami</h2>
								<ul class="text-gray-500 dark:text-gray-400 font-medium">
                                    @foreach($social as $item)
									<li>
										<a href="{{ $item->url }}" class="hover:underline" target="_BLANK">{{ $item->platform }}</a>
									</li>
                                    @endforeach
								</ul>
							</div>
							<div>
								<h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Bantuan</h2>
								<ul class="text-gray-500 dark:text-gray-400 font-medium">
									<li>
										<a href="{{ route('home.hubungi') }}" class="hover:underline">Hubungi Kami</a>
									</li>
									<li>
										<a href="{{ route('home.sdank') }}" class="hover:underline">Syarat dan Ketentuan</a>
									</li>
									<li>
										<a href="{{ route('home.metode') }}" class="hover:underline">Metode Pembayaran</a>
									</li>
								</ul>
							</div>
					</div>
			</div>
			<div class="grid w-full gap-6 md:grid-cols-2">
				<div>
				</div>
				<div>
					<h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">ISO</h2>
					<div class="flex items-center">
						<img src="{{ asset('storage/perusahaan/cer1.jpeg') }}" class="ms-1 h-12" alt="Certificate ISO 27001">
						<img src="{{ asset('storage/perusahaan/cer2.jpeg') }}" class="ms-1 h-12" alt="Certificate ISO 9001">
						<img src="{{ asset('storage/perusahaan/cer3.jpeg') }}" class="ms-1 h-12" alt="Certificate ISO 20000">
					</div>
				</div>
			</div>

			<hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="flex flex-col items-center justify-center md:flex-row md:items-center md:justify-between">
                <span class="text-sm text-gray-500 text-center dark:text-gray-400">© 2024 <a href="https://Fiberconnect.id/" class="hover:underline">Fiberconnect</a>. All Rights Reserved.</span>
                <div class="flex md:justify-center">
                    <a href="{{ route('home.sdank') }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">Terms &amp; Conditions</a>
                </div>
            </div>
		</div>
	</footer>
	<!-- Footer: End-->

	<!-- Back To Top Start -->
	<a href="#top" id="back-to-top" class="fixed bottom-6 right-6 right-4 hidden p-2 bg-gray-800 text-white rounded-full shadow-lg hover:bg-gray-600 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 transition-transform transform hover:scale-110">
		<svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
			<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"></path>
		</svg>
	</a>
	<!-- Back To Top End -->
