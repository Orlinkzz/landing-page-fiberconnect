<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use App\Models\KategoriKarir;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Parsedown;

class KarirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $kategoriId = $request->query('kategori');
        // $searchTerm = $request->query('search');
        // $selectedCategoryId = $request->input('kategori');

        // $karir = Karir::with(['kategori', 'perusahaan'])
        //     ->whereNotNull('closing_date')
        //     ->where('closing_date', '>', now())
        //     ->when($kategoriId, function ($query, $kategoriId) {
        //         return $query->where('kategori_id', $kategoriId);
        //     })
        //     ->when($searchTerm, function ($query, $searchTerm) {
        //         return $query->where('title', 'like', '%' . $searchTerm . '%');
        //     })
        //     ->when($searchTerm, function ($query, $searchTerm) {
        //         return $query->where(function($q) use ($searchTerm) {
        //             $q->where('title', 'like', '%' . $searchTerm . '%')
        //             ->orWhere('description', 'like', '%' . $searchTerm . '%')
        //             ->orWhere('requirements', 'like', '%' . $searchTerm . '%')
        //             ->orWhere('location', 'like', '%' . $searchTerm . '%');
        //         });
        //     })
        //     ->paginate(6);

        // $kategoriList = KategoriKarir::all();
        // $selectedCategory = $kategoriList->find($selectedCategoryId);

        // return view('template.karir', compact('karir', 'kategoriList', 'selectedCategory'));
        return view('template.karir');
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
    public function show(Karir $karir)
    {
        return view('karir.detail-karir', compact('karir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karir $karir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karir $karir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karir $karir)
    {
        //
    }
}
