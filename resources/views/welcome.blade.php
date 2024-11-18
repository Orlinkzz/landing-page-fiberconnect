<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Fiberconnect - Internet Cepat dan Andal di Cirebon, Bandung, Madiun, dan Magetan" />
        <meta name="keywords" content="@yield('keywords', 'ISP, Fiberconnect, internet cepat, internet andal, Cirebon, Bandung, Madiun, Magetan, internet fiber optic, layanan internet, provider internet, koneksi internet stabil, internet rumahan, internet kantor, internet murah, ISP Fiberconnect')" />
        <meta name="description" content="@yield('description', 'Fiberconnect menyediakan layanan internet cepat dan andal untuk kebutuhan rumah dan bisnis Anda. Kantor pusat di Cirebon dengan cabang di Bandung, Madiun, dan Magetan.')" />
        <meta name="author" content="Humaedi">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('storage/perusahaan/fbtnew.png') }}">
        <meta name="theme-color" content="#ffffff">

        <title>Fiberconnect, @yield('title', 'Home')</title>

		<!-- Twitter -->
		<meta property="twitter:card" content="summary">
        <meta property="twitter:url" content="https://www.Fiberconnect.com/" />
		<meta property="twitter:site" content="@">
		<meta property="twitter:creator" content="@">
        <meta property="twitter:title" content="Fiberconnect - Internet Cepat dan Andal di Cirebon, Bandung, Madiun, dan Magetan" />
        <meta property="twitter:description" content="Fiberconnect menyediakan layanan internet cepat dan andal untuk kebutuhan rumah dan bisnis Anda. Kantor pusat di Cirebon dengan cabang di Bandung, Madiun, dan Magetan." />
		<meta property="twitter:image" content="https://senimankode.com/img/logo.png">
		<!-- Facebook -->
        <meta property="og:url" content="https://www.Fiberconnect.com/" />
        <meta property="og:title" content="Humaedi">
        <meta property="og:description" content="Fiberconnect menyediakan layanan internet cepat dan andal untuk kebutuhan rumah dan bisnis Anda. Kantor pusat di Cirebon dengan cabang di Bandung, Madiun, dan Magetan." />
		<meta property="og:type" content="article">
		<meta property="og:image" content="https://senimankode.com/img/logo.png">
		<meta property="og:image:type" content="image/png">
		<meta property="og:locale" content="id_ID" />
		<meta property="og:type" content="office" />
		<meta property="og:title" content="Fiberconnect" />
		<meta property="og:url" content="https://www.Fiberconnect.id"/>
		<meta property="og:site_name" content="PT Bina Informatika Solusi | Fiberconnect" />

		<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/perusahaan/fbtnew.png') }}">
		<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('storage/perusahaan/fbtnew.ico') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/perusahaan/fbtnew.ico') }}">
		<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('storage/perusahaan/fbtnew.ico') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/perusahaan/fbtnew.ico') }}">
		<link rel="manifest" href="author.json">

		<link rel="canonical" href="https://www.Fiberconnect.id" />
		<link rel="shortcut icon" href="{{ asset('storage/perusahaan/fbtnew.ico') }}" />

		<link href="{{ asset('css/flowbite.min.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('css/app.css')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" href="{{ asset('storage/perusahaan/fbtnew.png') }}"type="image/x-icon" />
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/animate.css')}}" />

        <!-- ==== WOW JS ==== -->
        <script src="{{ asset('js/wow.min.js')}}"></script>
        <script>
            new WOW().init();
        </script>

    </head>
    <body class="dark:bg-gray-900 pattern-dots-dark">
        <div id="top"></div>
        @include('template.navbar')

        <!-- Content: Start-->
        <div class="max-w-screen-xl items-center justify-between mx-auto">
            @unless(View::hasSection('content'))
                @include('template.carousel', ['carousel' => $carousel])
                @include('template.nikmati-layanan-kami')
                @include('template.paket-home', ['perusahaan' => $perusahaan, 'paket' => $paket, 'perusahaanCode' => $perusahaanCode])
                @include('template.faq', ['faqs' => $faqs])
                @include('template.brands')
            @endunless
            @yield('content')
        </div>
        <!-- Content: End-->

        @include('template.footer', ['social' => $social])
        @yield('script')
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset ('js/flowbite.min.js') }}"></script>
        <script src="{{ asset ('js/marked.min.js') }}"></script>
    </body>
</html>
