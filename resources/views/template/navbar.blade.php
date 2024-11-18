	<!-- Navbar: Start-->
	<nav class="sticky top-0 z-50 border-gray-200 bg-white dark:bg-gray-800">
		<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
			<a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('storage/perusahaan/fbtnew.png') }}" class="h-8" alt="Fiberconnect Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Fiberconnect</span>
			</a>
			<button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
			</button>
			<div class="hidden w-full md:block md:w-auto" id="navbar-default">
				<ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800 dark:border-gray-700">
					<li>
						<a href="/" class="{{ request()->routeIs('home') ? 'text-fbt-100 dark:text-fbt-100' : 'text-gray-900 dark:text-white' }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fbt md:p-0 md:dark:hover:text-fbt-100 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</a>
					</li>
					<li>
						<button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="{{ request()->routeIs('paket.index') || request()->routeIs('paket.dacen') ? 'text-fbt-100 dark:text-fbt-100' : 'text-gray-900 dark:text-white' }} hover:bg-gray-100 dark:hover:bg-gray-600 flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fbt md:p-0 md:dark:hover:text-fbt-100 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
							Produk
							<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
							</svg>
						</button>
						<div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
								<ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
									<li>
										<a href="{{ route('paket.dacen') }}" target="_BLANK" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Data Center</a>
									</li>
									<li>
										<a href="{{ route('paket.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Internet</a>
									</li>
								</ul>
						</div>
					</li>
					<li>
						<a href="{{ route('promo.index') }}" class="{{ request()->routeIs('promo.*') ? 'text-fbt-100 dark:text-fbt-100' : 'text-gray-900 dark:text-white' }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fbt md:p-0 md:dark:hover:text-fbt-100  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">Promo</a>
					</li>
					<li>
						<a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'text-fbt-100 dark:text-fbt-100' : 'text-gray-900 dark:text-white' }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fbt md:p-0 md:dark:hover:text-fbt-100  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Berita</a>
					</li>
					<li>
						<a href="{{ route('tentang-kami.index') }}" class="{{ request()->routeIs('tentang-kami.index') ? 'text-fbt-100 dark:text-fbt-100' : 'text-gray-900 dark:text-white' }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fbt md:p-0 md:dark:hover:text-fbt-100  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tentang Kami</a>
					</li>
					<li>
                        <a id="theme-toggle" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fbt md:p-0 dark:text-white md:dark:hover:text-fbt-100  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
							<svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
							<svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Navbar: End-->
