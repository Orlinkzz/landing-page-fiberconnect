<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@Fiberconnect.id',
                'email_verified_at' => Carbon::now()->format('Y-m-d'),
                'password' => Hash::make('admin@Fiberconnect.id'),
                'created_at' => now()
            ],
        ]);

        DB::table('kategori_beritas')->insert([
            [ 'nama_kategori' => 'Teknologi',],
            [ 'nama_kategori' => 'Kebijakan dan Regulasi', ],
            [ 'nama_kategori' => 'Layanan Pelanggan', ],
            [ 'nama_kategori' => 'Inovasi dan Produk Baru', ],
            [ 'nama_kategori' => 'Keamanan dan Privasi', ],
            [ 'nama_kategori' => 'Pembaruan Jaringan', ],
            [ 'nama_kategori' => 'Pendidikan dan Pelatihan', ],
            [ 'nama_kategori' => 'Kemitraan dan Kolaborasi', ],
            [ 'nama_kategori' => 'Statistik dan Riset Pasar', ],
            [ 'nama_kategori' => 'Acara dan Konferensi', ],
            [ 'nama_kategori' => 'Inisiatif Sosial', ],
            [ 'nama_kategori' => 'Pengumuman Perusahaan', ],
        ]);

        DB::table('kategori_karirs')->insert([
            ['name' => 'IT'],
            ['name' => 'Finance'],
            ['name' => 'Marketing'],
            ['name' => 'Human Resources'],
            ['name' => 'Engineering'],
            ['name' => 'Sales'],
            ['name' => 'Customer Service'],
            ['name' => 'Product Management'],
            ['name' => 'Design'],
            ['name' => 'Administration'],
            ['name' => 'Operations'],
            ['name' => 'Legal'],
            ['name' => 'Healthcare'],
            ['name' => 'Education'],
            ['name' => 'Construction'],
            ['name' => 'Transportation'],
            ['name' => 'Research & Development'],
            ['name' => 'Consulting'],
            ['name' => 'Manufacturing'],
            ['name' => 'Telecommunications'],
        ]);

        DB::table('perusahaans')->insert([
            [
                'name' => 'PT. Bina Informatika Solusi (Fiberconnect Cirebon)',
                'address' => 'Jl. Prakarsa Muda No.258, Bedeng Batu, Kec. Kesambi, Kota Cirebon, Jawa Barat 45131',
                'city' => 'Cirebon',
                'state' => 'Jawa Barat',
                'postal_code' => '45131',
                'country' => 'Indonesia',
                // 'maps' => 'https://maps.app.goo.gl/xLnRUmSEgxjuGk5y9',
                'maps' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.65187059477523!2d108.55410099951574!3d-6.717274233379789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee33fccd0f313%3A0x2f080a5b626b5120!2sFiberconnect!5e0!3m2!1sid!2sid!4v1723523466704!5m2!1sid!2sid",
                'branch_type' => 'Main',
            ], [
                'name' => 'PT. Bina Informatika Solusi (Fiberconnect Bandung)',
                'address' => 'Jl. Terusan Soreang-Cipatik No.71, Pamekaran, Kec. Soreang, Kabupaten Bandung, Jawa Barat 40912',
                'city' => 'Kab. Bandung',
                'state' => 'Jawa Barat',
                'postal_code' => '45131',
                'country' => 'Indonesia',
                // 'maps' => 'https://maps.app.goo.gl/w1VNgvYLqgvbXj5c7',
                'maps' => "https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d247.49274799797428!2d107.52212818808917!3d-7.022923035785148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDEnMjIuNCJTIDEwN8KwMzEnMTkuOSJF!5e0!3m2!1sid!2sid!4v1723530527566!5m2!1sid!2sid",
                'branch_type' => 'Branch',
            ], [
                'name' => 'PT. Bina Informatika Solusi (Fiberconnect Bengkulu)',
                'address' => 'Jl. B.Barisan III No.26, Sawah Lebar, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38222',
                'city' => 'Bengkulu',
                'state' => 'Bengkulu',
                'postal_code' => '45131',
                'country' => 'Indonesia',
                // 'maps' => 'https://maps.app.goo.gl/BPAdbm41z3aWwgqH7',
                'maps' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.939818300211!2d102.28449627600267!3d-3.8230632961507562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36ba9b6c90933b%3A0x3a32f60a909b0f9b!2sBitsnet%20Bengkulu!5e0!3m2!1sid!2sid!4v1723530731456!5m2!1sid!2sid",
                'branch_type' => 'Branch',
            ], [
                'name' => 'PT. Bina Informatika Solusi (Fiberconnect Madiun)',
                'address' => 'Komplek Bukit Cemara Hijau, Jl. Sedoro Blk. A No.4, Banjarejo, Kec. Taman, Kota Madiun, Jawa Timur 63137',
                'city' => 'Madiun',
                'state' => 'Jawa Timur',
                'postal_code' => '45131',
                'country' => 'Indonesia',
                // 'maps' => 'https://maps.app.goo.gl/SBjRHqawjpRH5Fvs5',
                'maps' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.296521048725!2d111.53178868595093!3d-7.651230572678703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bfb780941667%3A0x99fae66ad884d06e!2sFiberconnect%20Madiun!5e0!3m2!1sid!2sid!4v1723530771338!5m2!1sid!2sid",
                'branch_type' => 'Branch',
            ],
        ]);

        DB::table('promos')->insert([
            [
                'nama_promo' => 'PROKLAMASI (Promo Koneksi Lancar Aman Maksimal)',
                'deskripsi' => 'Internet Speed up to 17 Mbps dengan harga 170.845/bulan. Spesial discount up to 45%',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addMonth()->format('Y-m-d'),
                'gambar' => 'promo/01J5WFX57WEA0JN80Z14DWPPHY.png',
                'tipe_promo' => 'diskon',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_promo' => 'Harga Khusus Paket Premium',
                'deskripsi' => 'Harga khusus untuk paket premium',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addMonth()->format('Y-m-d'),
                'gambar' => 'promo/01J5WFX57WEA0JN80Z14DWPPHY.png',
                'tipe_promo' => 'harga_khusus',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_promo' => 'Kecepatan Khusus 100 Mbps',
                'deskripsi' => 'Penawaran kecepatan khusus untuk paket standar',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addMonth()->format('Y-m-d'),
                'gambar' => 'promo/01J5WFX57WEA0JN80Z14DWPPHY.png',
                'tipe_promo' => 'kecepatan_khusus',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_promo' => 'Kombinasi Diskon dan Kecepatan',
                'deskripsi' => 'Diskon 10% dan kecepatan 100 Mbps',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addMonth()->format('Y-m-d'),
                'gambar' => 'promo/01J5WFX57WEA0JN80Z14DWPPHY.png',
                'tipe_promo' => 'kombinasi',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_promo' => 'Harga Khusus Paket Premium',
                'deskripsi' => 'Harga khusus untuk paket premium',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addMonth()->format('Y-m-d'),
                'gambar' => 'promo/01J5WFX57WEA0JN80Z14DWPPHY.png',
                'tipe_promo' => 'harga_khusus',
                'status' => 'Aktif',
                'perusahaan_id' => 2
            ],
            [
                'nama_promo' => 'Kecepatan Khusus 100 Mbps',
                'deskripsi' => 'Penawaran kecepatan khusus untuk paket standar',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addMonth()->format('Y-m-d'),
                'gambar' => 'promo/01J5WFX57WEA0JN80Z14DWPPHY.png',
                'tipe_promo' => 'kecepatan_khusus',
                'status' => 'Aktif',
                'perusahaan_id' => 3
            ],
            [
                'nama_promo' => 'Kombinasi Diskon dan Kecepatan',
                'deskripsi' => 'Diskon 10% dan kecepatan 100 Mbps',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addMonth()->format('Y-m-d'),
                'gambar' => 'promo/01J5WFX57WEA0JN80Z14DWPPHY.png',
                'tipe_promo' => 'kombinasi',
                'status' => 'Aktif',
                'perusahaan_id' => 4
            ],
        ]);

        DB::table('carousels')->insert([
            [
                'name' => 'Benefit',
                'title' => 'Benefit',
                'description' => 'Benefit',
                'image_url_mobile' => 'carousel/CAROUSEL-BENEFIT-MOBILE.png',
                'image_url_desktop' => 'carousel/CAROUSEL-BENEFIT.png',
                'status' => 'Aktif',
                'promo_id' => null
            ],[
                'name' => 'Info Pembayaran',
                'title' => 'Info Pembayaran',
                'description' => 'Untuk kenyamanan Anda, kami menyediakan berbagai opsi pembayaran. Anda dapat memilih metode yang paling sesuai dengan kebutuhan Anda untuk melakukan pembayaran dengan mudah dan cepat. Berikut adalah cara-cara yang dapat Anda pilih:
Pembayaran di Kantor: Alamat Kantor: Pembayaran dapat dilakukan di meja kasir kami selama jam kerja.
Pembayaran melalui Platform Resmi:
Minimarket: Anda dapat melakukan pembayaran di minimarket yang bekerja sama dengan kami. Cari nama Fiberconnect di jaringan minimarket terdekat Anda.
E-commerce: Lakukan pembayaran melalui platform e-commerce tokopedia untuk kemudahan transaksi online.
Transfer Antar Bank: Pembayaran dapat dilakukan melalui transfer bank ke rekening berikut:
Bank: BRI
Nomor Rekening: Virtual Akun (VA) BRI yang kami berikan melalui invoice
Atas Nama: Nama yang anda daftarkan
E-wallet: Gunakan aplikasi e-wallet yang bekerja sama dengan kami, seperti Dana, OVO, Flip dan sejenisnya, untuk melakukan pembayaran secara langsung dari ponsel Anda.
Virtual Account: Virtual Akun (VA) BRI
Catatan Penting:
Pastikan untuk menyimpan bukti pembayaran dan mengirimkan konfirmasi kepada kami jika diperlukan. Untuk pertanyaan lebih lanjut atau bantuan mengenai proses pembayaran, silakan hubungi kami.',
                'image_url_mobile' => 'carousel/CAROUSEL-INFO-PEMBAYARAN-MOBILE.png',
                'image_url_desktop' => 'carousel/CAROUSEL-INFO-PEMBAYARAN.png',
                'status' => 'Aktif',
                'promo_id' => null
            ],[
                'name' => 'Layanan Pengaduan',
                'title' => 'Layanan Pengaduan',
                'description' => 'Kami di Fiberconnect berkomitmen untuk menyediakan layanan terbaik kepada pelanggan kami. Kami memahami bahwa terkadang Anda mungkin mengalami masalah atau ketidakpuasan terkait produk atau layanan kami. Oleh karena itu, kami telah menyediakan layanan pengaduan yang mudah diakses untuk memastikan setiap masalah Anda ditangani dengan cepat dan efektif.',
                'image_url_mobile' => 'carousel/CAROUSEL-LAYANAN-PENGADUAN-MOBILE.png',
                'image_url_desktop' => 'carousel/CAROUSEL-LAYANAN-PENGADUAN.png',
                'status' => 'Aktif',
                'promo_id' => null
            ],[
                'name' => 'Promo',
                'title' => 'Promo',
                'description' => 'Promo',
                'image_url_mobile' => 'carousel/CAROUSEL-PROMO-MOBILE.png',
                'image_url_desktop' => 'carousel/CAROUSEL-PROMO.png',
                'status' => 'Aktif',
                'promo_id' => 1
            ],
        ]);

        DB::table('karirs')->insert([
            'title' => 'Senior Software Engineer',
            'description' => 'Join our team as a Senior Software Engineer and work on cutting-edge projects involving AI and machine learning. You will be responsible for designing, developing, and maintaining software applications, as well as leading a team of developers.',
            'requirements' => "* Bachelor's or Master's degree in Computer Science or a related field.
* 5+ years of experience in software development.
* Proficiency in Java, Python, or C++.
* Experience with cloud platforms (AWS, Azure).
* Strong problem-solving skills and ability to work in a team environment.
* Excellent communication skills..",
            'location' => 'Cirebon, Indonesia',
            'salary' => 'IDR 5,000,000 - 10,000,000 per month',
            'posted_date' => now(),
            'closing_date' => now()->addDays(30),
            'perusahaan_id' => 1,
            'kategori_id' => 1,
            'work_location' => 'WFO',
            'work_type' => 'Full-time',
            'candidate_needed' => 3,
        ]);

        DB::table('beritas')->insert([
            [
                'judul' => 'Fiberconnect Lakukan Penandatanganan MoU dengan Perumahan Keandra Living Sampiran Kabupaten Cirebon',
                'gambar' => 'berita/Fiberconnect-opening-internet-di-Soreang.jpg',
                'konten' => 'PT Bina Informatika Solusi (Fiberconnect) kembangkan jaringan komunikasi telekomunikasi Fiber to the home (FTTH) pada kawasan Perumahan Keandra Living Sampiran, Kabupaten Cirebon.

Hal itu tertuang dan diwujudkannya dalam penandatanganan kesepakatan kerjasama dengan Tulus Asih Group, pengembang perumahan terkait, belum lama ini. Hadir dalam kesepakatan kerjasama Direktur Operasional Fiberconnect Willy Hendrata, CEO Tulus Asih Group H Teddy Wijaya beserta jajaran Direksi lainnya.

Direktur Operasiinal  Fiberconnect Willy Hendrata mengatakan, pihaknya menyambut baik kolaborasi bersama Keandra Living Sampiran ini “Kami sangat senang telah mendapatkan kepercayaan dari salah satu developer ternama di Cirebon. Hal ini menciptakan fondasi yang kuat untuk kolaborasi masa depan Fiberconnect dengan Keandra Living Sampiran serta memperkuat komitmen Fiberconnect sebagai penyedia layanan internet yang berkualitas dan tercepat," ujar Willy dalam keterangannya yang diterima kabar-cirebon Jumat, 16 Agustus 2024.

“Kami yakin kehadiran Fiberconnect di area Keandra Living Sampiran akan memberikan nilai tambah untuk kenyamanan saat memiliki hunian,” katanya menambahkan. Berkualitas Menurutnya, Fiberconnect menjadi satu-satunya layanan Internet yang bisa diakses di Keandra Living Sampiran, dan ini adalah bentuk komitmen antara Fiberconnect dan Keandra Living Sampiran.

“Fiberconnect memiliki berbagai produk yang dapat disesuaikan dengan kebutuhan masyarakat. Produk beragam dengan kecepatan hingga 100 Mbps dengan keunggulan seperti kecepatan simetris 1:1 upload dan download, Unlmited (Tanpa Batasan kuota), Stabil dan harga yang kompetitif,"  paparnya. Ditambahkan dia, jika Fiberconnect saat ini j memberikan penawaran special untuk program kerjasama yang akan diinfokan lebih lanjut.',
                'tanggal' => '2024-08-20',
                'kategori_id' => '6',
                'status' => 'Aktif'
            ],
        ]);

        DB::table('pakets')->insert([
            [
                'nama_paket' => 'Ftth Freedom',
                'gambar' => '',
                'kuota' => 'Unlimited',
                'kecepatan' => '10 Mbps',
                'harga' => '150000',
                'fitur' => '* Home Broadband
* (up to) 10 Mbps
* Without FUP
* Unlimited Download',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_paket' => 'Ftth Standar',
                'gambar' => '',
                'kuota' => 'Unlimited',
                'kecepatan' => '30 Mbps',
                'harga' => '215000',
                'fitur' => '* Home Broadband
* (up to) 30 Mbps
* Without FUP
* Unlimited Download',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_paket' => 'Ftth Premium',
                'gambar' => '',
                'kuota' => 'Unlimited',
                'kecepatan' => '50 Mbps',
                'harga' => '230000',
                'fitur' => '* Home Broadband
* (up to) 50 Mbps
* Without FUP
* Unlimited Download',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_paket' => 'Ftth Super',
                'gambar' => '',
                'kuota' => 'Unlimited',
                'kecepatan' => '100 Mbps',
                'harga' => '360000',
                'fitur' => '* Home Broadband
* (up to) 100 Mbps
* Without FUP
* Unlimited Download',
                'status' => 'Aktif',
                'perusahaan_id' => 1
            ],
            [
                'nama_paket' => 'Ftth Freedom',
                'gambar' => '',
                'kuota' => 'Unlimited',
                'kecepatan' => '10 Mbps',
                'harga' => '150000',
                'fitur' => '* Home Broadband
* (up to) 10 Mbps
* Without FUP
* Unlimited Download',
                'status' => 'Aktif',
                'perusahaan_id' => 2
            ],
            [
                'nama_paket' => 'Ftth Freedom',
                'gambar' => '',
                'kuota' => 'Unlimited',
                'kecepatan' => '10 Mbps',
                'harga' => '150000',
                'fitur' => '* Home Broadband
* (up to) 10 Mbps
* Without FUP
* Unlimited Download',
                'status' => 'Aktif',
                'perusahaan_id' => 3
            ],
            [
                'nama_paket' => 'Ftth Freedom',
                'gambar' => '',
                'kuota' => 'Unlimited',
                'kecepatan' => '10 Mbps',
                'harga' => '150000',
                'fitur' => '* Home Broadband
* (up to) 10 Mbps
* Without FUP
* Unlimited Download',
                'status' => 'Aktif',
                'perusahaan_id' => 4
            ],
        ]);

        DB::table('paket_promos')->insert([
            [
                'nama_paket' => 'Paket Standar',
                'kecepatan_dasar' => '50 Mbps',
                'harga_dasar' => 200000,
            ],
            [
                'nama_paket' => 'Paket Premium',
                'kecepatan_dasar' => '100 Mbps',
                'harga_dasar' => 400000,
            ],
            [
                'nama_paket' => 'Paket Ultimate',
                'kecepatan_dasar' => '200 Mbps',
                'harga_dasar' => 600000,
            ],
        ]);

        DB::table('detail_promos')->insert([
            [
                'promo_id' => 1,
                'paket_promo_id' => 1,
                'harga_khusus' => null,
                'kecepatan_khusus' => null,
                'diskon' => 20.00,
                'tipe_diskon' => 'persentase',
            ],
            [
                'promo_id' => 2,
                'paket_id' => 2,
                'harga_khusus' => 350000,
                'kecepatan_khusus' => null,
                'diskon' => null,
                'tipe_diskon' => null,
            ],
            [
                'promo_id' => 3,
                'paket_id' => 1,
                'harga_khusus' => null,
                'kecepatan_khusus' => '100 Mbps',
                'diskon' => null,
                'tipe_diskon' => null,
            ],
            [
                'promo_id' => 4,
                'paket_id' => 2,
                'harga_khusus' => null,
                'kecepatan_khusus' => '100 Mbps',
                'diskon' => 10.00,
                'tipe_diskon' => 'persentase',
            ],
        ]);

        DB::table('social_media')->insert([
            [
                'perusahaan_id' => 1,
                'platform' => 'WhatsApp',
                'url' => 'https://wa.me/6281111111920',
                'icon' => 'fab-whatsapp',
                'status' => 'Aktif',
            ],
            [
                'perusahaan_id' => 1,
                'platform' => 'Instagram',
                'url' => 'https://www.instagram.com/Fiberconnect.id',
                'icon' => 'fab-instagram',
                'status' => 'Aktif',
            ],
            [
                'perusahaan_id' => 1,
                'platform' => 'Tiktok',
                'url' => 'https://www.tiktok.com/@Fiberconnect.id',
                'icon' => 'fab-tiktok',
                'status' => 'Aktif',
            ],
            [
                'perusahaan_id' => 2,
                'platform' => 'WhatsApp',
                'url' => 'https://wa.me/6281111111920',
                'icon' => 'fab-whatsapp',
                'status' => 'Aktif',
            ],
            [
                'perusahaan_id' => 3,
                'platform' => 'WhatsApp',
                'url' => 'https://wa.me/6281111111920',
                'icon' => 'fab-whatsapp',
                'status' => 'Aktif',
            ],
            [
                'perusahaan_id' => 4,
                'platform' => 'WhatsApp',
                'url' => 'https://wa.me/6281111111920',
                'icon' => 'fab-whatsapp',
                'status' => 'Aktif',
            ],
        ]);

        DB::table('kategori_faqs')->insert([
            ['name' => 'Umum', 'description' => 'Pertanyaan umum tentang produk atau layanan.'],
            ['name' => 'Panduan', 'description' => 'Panduan dan instruksi penggunaan.'],
            ['name' => 'Teknis', 'description' => 'Pertanyaan teknis atau dukungan.'],
        ]);

        DB::table('faqs')->insert([
            [
                'question' => 'Bagaimana cara mendaftar layanan internet?',
                'answer' => 'Anda dapat mendaftar layanan internet melalui situs web kami atau menghubungi layanan pelanggan kami.',
                'status' => 'Aktif',
                'kategori_id' => 1
            ],
            [
                'question' => 'Apa yang harus dilakukan jika internet saya tidak berfungsi?',
                'answer' => 'Periksa koneksi kabel Anda dan pastikan modem/router Anda terhubung dengan benar. Jika masalah berlanjut, hubungi dukungan teknis kami.',
                'status' => 'Aktif',
                'kategori_id' => 2
            ],
            [
                'question' => 'Bagaimana cara membayar tagihan saya?',
                'answer' => 'Anda dapat membayar tagihan melalui portal pelanggan kami, aplikasi seluler, atau mengunjungi lokasi pembayaran yang ditunjuk.',
                'status' => 'Aktif',
                'kategori_id' => 3
            ],
            [
                'question' => 'Apakah ada biaya tambahan untuk pemasangan?',
                'answer' => 'Biaya pemasangan mungkin berlaku tergantung pada lokasi dan jenis layanan yang Anda pilih. Silakan cek detail biaya pada halaman pendaftaran kami.',
                'status' => 'Aktif',
                'kategori_id' => 1
            ]
        ]);

        DB::table('tentang_kamis')->insert([
            [
                'tentang_kami' => 'Fiberconnect merupakan penyedia layanan internet terkemuka yang berkomitmen untuk menghadirkan konektivitas berkualitas tinggi kepada Anda. Sejak didirikan pada [tahun berdiri], kami telah berusaha untuk menjadi mitra terpercaya dalam memenuhi kebutuhan internet Anda dengan kecepatan dan keandalan yang tak tertandingi.',
                'visi' => 'Kami percaya bahwa akses internet yang cepat dan stabil adalah hak setiap orang, dan kami bertekad untuk menghubungkan komunitas kami dengan teknologi terkini. Visi kami adalah menciptakan jembatan digital yang menghubungkan rumah, bisnis, dan kehidupan sehari-hari Anda dengan dunia online, tanpa batasan.',
                'misi' => '1. Kualitas Layanan: Menyediakan koneksi internet yang cepat, stabil, dan dapat diandalkan, didukung oleh infrastruktur terbaru dan teknologi mutakhir.
2. Kepuasan Pelanggan: Memprioritaskan kepuasan pelanggan dengan layanan pelanggan yang ramah dan responsif, serta solusi yang sesuai dengan kebutuhan individual Anda.
3. Inovasi Terus-Menerus: Terus berinovasi untuk menghadirkan produk dan layanan yang sesuai dengan perkembangan teknologi dan tren digital terbaru.',
                'tentang_tim' => 'Di Fiberconnect, kami memiliki tim profesional yang berdedikasi dan berpengalaman di bidang teknologi informasi dan layanan pelanggan. Setiap anggota tim kami berkomitmen untuk memberikan solusi terbaik dan mendukung Anda dalam setiap langkah perjalanan digital Anda.',
                'pilih_kami' => '📈 Kecepatan Internet Terbaik: Nikmati kecepatan internet tinggi tanpa gangguan, ideal untuk streaming, gaming, dan pekerjaan online.
🕒 Layanan Pelanggan 24/7: Tim dukungan kami selalu siap membantu Anda kapan saja, hari atau malam.
💻 Teknologi Terkini: Kami menggunakan teknologi terbaru untuk memastikan jaringan kami selalu up-to-date dan efisien.
📦 Pilihan Paket Fleksibel: Pilih dari berbagai paket yang dirancang untuk memenuhi kebutuhan dan anggaran Anda.'
            ]
        ]);

        DB::table('syarat_dan_ketentuans')->insert([
            [
                'syarat_dan_ketentuan' => 'SYARAT DAN KETENTUAN BERLANGGANAN'
            ]
        ]);
    }
}
