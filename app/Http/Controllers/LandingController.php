<?php

namespace App\Http\Controllers;

use App\Models\Layanan;

class LandingController extends Controller
{
    public function index()
    {
        $layanan = Layanan::where('status', 1)->orderBy('id_layanan')->get();

        return view('landing.index', compact('layanan'));
    }
}
