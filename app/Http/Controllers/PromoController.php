<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Promo;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    private function getPartAfterLastSlash($url) {
        $pattern = '/\/([^\/]*)\/?$/';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perusahaanCode = $request->query('perusahaan', '1');
        $perusahaan = Perusahaan::all();
        $promo = Promo::with(['perusahaan'])->where('perusahaan_id', $perusahaanCode)
                    ->where('tanggal_selesai', '>', now())
                    ->get();
        if ($request->ajax()) {
            return response()->json(['promo' => $promo]);
        }
        return view('template.promo', compact('perusahaanCode', 'perusahaan', 'promo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
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

        return view('promo.detail-promo', compact('promo', 'social', 'socialsByPerusahaan', 'perusahaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        //
    }
}
