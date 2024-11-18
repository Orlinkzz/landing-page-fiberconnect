<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Perusahaan;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class CarouselController extends Controller
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
    public function index()
    {
        $carousel = Carousel::where('status', 'Aktif')->orderBy('id', 'desc')->get();
        return view('template.carousel', compact('carousel'));
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
    public function show(Carousel $carousel)
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

        return view('carousel.detail-carousel', compact('carousel', 'social', 'socialsByPerusahaan', 'perusahaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        //
    }
}
