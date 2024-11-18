<?php

namespace App\Http\Controllers;

use App\Models\SyaratDanKetentuan;
use Illuminate\Http\Request;

class SyaratDanKetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $syarat = SyaratDanKetentuan::all();
        return view('template.sarat-dan-ketentuan', compact('syarat'));
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
    public function show(SyaratDanKetentuan $syaratDanKetentuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SyaratDanKetentuan $syaratDanKetentuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SyaratDanKetentuan $syaratDanKetentuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SyaratDanKetentuan $syaratDanKetentuan)
    {
        //
    }
}
