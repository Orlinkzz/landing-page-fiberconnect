<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Faq;
use App\Models\Karir;
use App\Models\KategoriKarir;
use App\Models\Paket;
use App\Models\Perusahaan;
use App\Models\SocialMedia;
use App\Models\SyaratDanKetentuan;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function getPartAfterLastSlash($url) {
        $pattern = '/\/([^\/]*)\/?$/';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    public function index(Request $request)
    {
        $carousel = Carousel::where('status', 'Aktif')->orderBy('id', 'desc')->get();
        $perusahaanCode = $request->query('perusahaan', '1');
        $perusahaan = Perusahaan::all();
        $paket = Paket::where('perusahaan_id', $perusahaanCode)
                    ->with(['perusahaan'])
                    ->get();
        if ($request->ajax()) {
            return response()->json(['paket' => $paket]);
        }

        $faqs = Faq::where('status', 'Aktif')->paginate(4);
        $total_faqs = Faq::count();
        return view('welcome', compact('paket', 'perusahaan', 'perusahaanCode', 'carousel', 'faqs', 'total_faqs'));
    }

    public function dacen()
    {
        return redirect('https://trustix.id');
    }

    public function tentang()
    {
        $tentang = TentangKami::first();
        $social = SocialMedia::with('perusahaan')->get();
        $socialsByPerusahaan = $social->groupBy(function ($item) {
            return $item->perusahaan->id;
        });

        $perusahaan = Perusahaan::all();

        $social->transform(function ($social) {
            $social->parsed_url = $this->getPartAfterLastSlash($social->url);
            return $social;
        });

        return view('template.tentang-kami', compact('tentang', 'perusahaan', 'social', 'socialsByPerusahaan'));
    }

    public function hubungi()
    {
        $social = SocialMedia::with('perusahaan')->get();
        $socialsByPerusahaan = $social->groupBy(function ($item) {
            return $item->perusahaan->id;
        });
        $perusahaan = Perusahaan::all();
        $social->transform(function ($social) {
            $social->parsed_url = $this->getPartAfterLastSlash($social->url);
            return $social;
        });
        return view('template.hubungi-kami', compact('social', 'perusahaan', 'socialsByPerusahaan'));
    }

    public function sdank()
    {
        $syarat = SyaratDanKetentuan::first();
        return view('template.sarat-dan-ketentuan', compact('syarat'));
    }

    public function metode()
    {
        $carousel = Carousel::where('status', 'Aktif')->where('id', 2)->orderBy('id', 'desc')->first();
        $social = SocialMedia::with('perusahaan')->get();
        $socialsByPerusahaan = $social->groupBy(function ($item) {
            return $item->perusahaan->id;
        });
        $perusahaan = Perusahaan::all();
        $social->transform(function ($social) {
            $social->parsed_url = $this->getPartAfterLastSlash($social->url);
            return $social;
        });
        return view('template.metode-pembayaran', compact('carousel', 'social', 'socialsByPerusahaan', 'perusahaan'));
    }
}
