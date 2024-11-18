<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\SocialMedia;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
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
    public function show(TentangKami $tentangKami)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TentangKami $tentangKami)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TentangKami $tentangKami)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TentangKami $tentangKami)
    {
        //
    }
}
