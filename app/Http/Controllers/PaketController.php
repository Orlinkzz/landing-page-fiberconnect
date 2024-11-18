<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Perusahaan;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perusahaanCode = $request->query('perusahaan', '1');
        $perusahaan = Perusahaan::all();

        $social = SocialMedia::with('perusahaan')->get();
        $socialsByPerusahaan = $social->groupBy(function ($item) {
            return $item->perusahaan->id;
        });

        $paket = Paket::where('perusahaan_id', $perusahaanCode)
                    ->with(['perusahaan'])
                    ->get();
        if ($request->ajax()) {
            return response()->json(['paket' => $paket]);
        }

        return view('template.paket', compact('paket', 'perusahaan', 'perusahaanCode', 'social', 'socialsByPerusahaan'));
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
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        //
    }
}
