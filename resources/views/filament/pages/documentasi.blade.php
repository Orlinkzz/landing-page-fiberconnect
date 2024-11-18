<x-filament-panels::page>
<!-- In your Livewire component blade file -->
<div>
    <main class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:text-white">
        <h2 id="pendahuluan" class="text-2xl font-semibold mb-2">Pendahuluan</h2>
        <p>Selamat datang di Fiberconnect! Dokumentasi ini bertujuan untuk memberikan panduan lengkap tentang cara menggunakan berbagai fitur dan halaman di website Fiberconnect. Pastikan Anda membaca setiap bagian untuk memahami semua fungsi yang tersedia.</p>
        <ol>
            <li>
                <h3 id="kategori-beritas" class="text-xl font-semibold mb-2 mt-2 flex items-center gap-x-2">
                    Penting
                    <span style="--c-50:var(--primary-50);--c-400:var(--primary-400);--c-600:var(--primary-600);" class="fi-badge flex items-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-primary">
                            <x-fas-triangle-exclamation class="h-5"/>
                    </span>
                </h3>
                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                    <li><strong>Database:</strong>
                        <p style="margin-left: 1.5rem">Saat ini, aplikasi ini menggunakan SQLite untuk penyimpanan data, yang tersimpan di direktori Database. Jika Anda ingin beralih ke MySQL, Anda dapat mengubah pengaturannya di file .env yang terletak di folder root aplikasi ini.</p>
                        <br>
                        <p style="margin-left: 1.5rem">Data dummy telah disediakan untuk memudahkan proses deploy. Anda dapat menggunakan seeder yang telah disediakan. Untuk informasi lebih lanjut, silakan baca dokumentasi lengkap di Laravel.</p>
                        <br>
                        <p style="margin-left: 1.5rem">Jika Anda perlu mengedit file SQLite, gunakan aplikasi seperti <strong>DB Browser (SQLite)</strong>. Anda dapat mengunduh file SQLite, melakukan perubahan, lalu mengunggahnya kembali ke direktori yang sama.</p>
                    </li>
                    <li><strong>Ukuran Gambar yang Diupload</strong>
                        <ul style="margin-left: 1.5rem">
                            <li class="ps-5 mt-2 space-y-1"><strong>Carousels:</strong>
                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                                    <li>Desktop: 1280 x 320 piksel</li>
                                    <li>Mobile: Rasio 1:1, resolusi dapat disesuaikan</li>
                                </ul>
                            </li>
                            <li class="ps-5 mt-2 space-y-1"><strong>Logo Mitra:</strong>
                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                                    <li>156 x 156 piksel atau rasio 1:1</li>
                                </ul>
                            </li>
                            <li class="ps-5 mt-2 space-y-1"><strong>Banner Promo:</strong>
                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                                    <li>235 x 304 piksel, atau dengan rasio 1:1. Ukuran pixel bisa disesuaikan selama gambar tidak pecah.</li>
                                </ul>
                            </li>
                            <li class="ps-5 mt-2 space-y-1"><strong>Penghargaan:</strong>
                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                                    <li>Bisa berupa foto atau logo/ikon tertentu</li>
                                    <li>Ukuran: 200 x 200 piksel</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><strong>Lainnya:</strong>
                        <p style="margin-left: 1.5rem">Anda tidak diperbolehkan mengubah urutan <strong>Info Pembayaran</strong> pada menu <strong>Carousels</strong> karena perubahan ini akan memengaruhi halaman Metode Pembayaran. Anda hanya diperbolehkan mengubah kontennya, seperti gambar dan deskripsi, jika diperlukan.</p>
                        <br>
                        <p style="margin-left: 1.5rem">Daftar <strong>Media Sosial</strong> ini mempengaruhi tampilan akun media sosial yang ada. Jika Anda menghapus atau menonaktifkan item, maka media sosial tersebut tidak akan ditampilkan.</p>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <h3 id="kategori-beritas" class="text-xl font-semibold mb-2 mt-2">Home:</h3>
                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                    <li><strong>Beritas:</strong>
                        <p style="margin-left: 1.5rem">Halaman Beritas ini anda bisa menyajikan informasi terbaru dan berita terkini tentang perusahaan dan industri terkait.</p>
                    </li>
                    <li><strong>Carousels:</strong>
                        <p style="margin-left: 1.5rem">Jangan hapus carousel dengan ID <strong>2</strong> dan nama <strong>Info Pembayaran</strong>, karena ini akan mempengaruhi menu <strong>Metode Pembayaran</strong>.</p>
                        <br>
                        <p style="margin-left: 1.5rem">Halaman Carousels di halaman depan website menampilkan gambar dan informasi penting secara bergantian, termasuk penawaran khusus, berita terbaru, dan pemberitahuan lainnya.</p>
                        <br>
                        <p style="margin-left: 1.5rem">Isi field promo untuk mengganti redirect carousels ke menu promo. Jika tidak, akan menampilkan deskripsi yang Anda tuliskan di carousels.</p>
                    </li>
                    <li><strong>Faqs:</strong>
                        <p style="margin-left: 1.5rem">Halaman Faqs (Frequently Asked Questions) berisi jawaban atas pertanyaan yang sering ditanyakan oleh costumer baik tentang produk, layanan, dan kebijakan perusahaan.</p>
                    </li>
                    <li><strong>Karirs:</strong>
                        <p style="margin-left: 1.5rem">Halaman Karirs menyediakan informasi tentang peluang kerja di perusahaan.</p>
                    </li>
                    <li><strong>Pakets:</strong>
                        <p style="margin-left: 1.5rem">Halaman Pakets menampilkan berbagai paket layanan atau paket yang ditawarkan.</p>
                    </li>
                    <li><strong>Promos:</strong>
                        <p style="margin-left: 1.5rem">Halaman Promos menampilkan penawaran dan diskon khusus yang berlaku saat ini.</p>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <h3 id="kategori-beritas" class="text-xl font-semibold mb-2 mt-2">Master data:</h3>
                <p>Berisi informasi penting tentang struktur dan data di website. Ini termasuk:</p>
                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                    <li><strong>Kategori Beritas:</strong>
                        <p style="margin-left: 1.5rem">Menampilkan Kategori yang digunakan untuk mengelompokkan berita.</p>
                    </li>
                    <li><strong>Kategori Faqs:</strong>
                        <p style="margin-left: 1.5rem">Menampilkan Kategori pertanyaan di halaman FAQ.</p>
                    </li>
                    <li><strong>Kategori Karirs:</strong>
                        <p style="margin-left: 1.5rem">Menampilkan Kategori pekerjaan yang tersedia.</p>
                    </li>
                    <li><strong>Perusahaans:</strong>
                        <p style="margin-left: 1.5rem">Menampilkan Informasi tentang perusahaan.</p>
                    </li>
                    <li><strong>Social Media:</strong>
                        <p style="margin-left: 1.5rem">Jangan hapus Media Sosial dengan ID <strong>1</strong> karena ini akan mempengaruhi semua data yang terhubung ke WhatsApp dan dapat mengubah seluruh data yang terkait dengan perusahaan. Perubahan ini akan berdampak pada semua informasi yang ditampilkan.</p>
                        <br>
                        <p style="margin-left: 1.5rem">Menampilkan tautan ke akun media sosial perusahaan.</p>
                    </li>
                    <li><strong>Syarat dan Ketentuan:</strong>
                        <p style="margin-left: 1.5rem">Menampilkan kebijakan dan ketentuan yang berlaku untuk penggunaan website.</p>
                    </li>
                    <li><strong>Tentang Kami:</strong>
                        <p style="margin-left: 1.5rem">Menampilkan informasi mengenai perusahaan dan tim.</p>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <h3 id="kategori-beritas" class="text-xl font-semibold mb-2 mt-2">Users:</h3>
                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                    <li><strong>User:</strong>
                        <p style="margin-left: 1.5rem">Halaman ini memungkinkan Anda untuk menambah dan menghapus user baru. Semua user memiliki permission yang sama tanpa perbedaan role.</p>
                    </li>
                    <li><strong>Profile:</strong>
                        <p style="margin-left: 1.5rem">Menampilkan detail profile dan memungkinkan Anda untuk melakukan perubahan sandi pada akun Anda.</p>
                    </li>
                </ul>
            </li>
        </ol>
        <br>

        <span style="--c-50:var(--primary-50);--c-400:var(--primary-400);--c-600:var(--primary-600);" class="fi-badge flex items-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-primary">
            <p style="margin-left: 1.5rem">Jika Anda perlu mengubah dokumentasi atau memiliki pertanyaan lebih lanjut, silakan hubungi <strong>[Tim Fiberconnect]</strong> melalui <strong>[ SPV NOC ]</strong> atau langsung ke <strong>[Programmer]</strong>.</p>
        </span>
    </main>
</div>
</x-filament-panels::page>
