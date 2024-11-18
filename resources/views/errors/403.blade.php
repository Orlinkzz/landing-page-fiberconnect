@extends('welcome')
@section('title', __($exception->getMessage() ?: 'Forbidden'))
@section('content')
<!-- 403 Forbidden: Start -->
<section class="my-10 px-2 bg-white dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-foreground">403 Forbidden</h2>
        <p class="mt-2 text-muted-foreground"><b>#{{ __($exception->getMessage() ?: 'Forbidden') }}</b></p>
    </div>
    <div class="gap-8 mt-10">
        <div class="flex flex-col items-center text-white p-6 bg-card bg-fbt pettren-complex-circle bg-gradient-to-br from-fbt to-fbt-100 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-lg">
            <img src="images/hero/cs.svg" alt="elements icon" class="h-72 transition-transform duration-300 hover:animate-bounce" />
            <h2 class="text-4xl mt-4">Anda tidak memiliki otoritas untuk akses halaman ini!</h2>
            <p class="mt-2 text-lg text-muted-foreground">Kami mohon maaf atas ketidaknyamanan ini. Anda tidak memiliki izin untuk mengakses halaman ini.</p>
            <p><strong>Harap diperhatikan:</strong> Mengakses halaman yang tidak diizinkan dapat melanggar kebijakan keamanan kami dan dapat mengakibatkan tindakan lebih lanjut.</p>
            <p>Halaman ini akan mengarahkan Anda kembali ke beranda dalam beberapa detik.</p>
            <div class="mt-6">
                <div id="loadingSpinner" class="flex flex-col items-center hidden">
                    <svg class="animate-spin h-8 w-8 mx-auto text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <p class="mt-2 text-lg text-muted-foreground">Mengalihkan Anda...</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 403 Forbidden: End -->

<script>
    window.addEventListener('load', function() {
        document.getElementById('loadingSpinner').classList.remove('hidden');
        setTimeout(function() {
            window.history.back();
        }, 3000);
    });
</script>

@endsection
