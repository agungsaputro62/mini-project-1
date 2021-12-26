<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Ambil Semua Data Provinsi
    public function provinces (Request $request) {

        return Province::all();

    }

    // Ambil Semua Data Kota, Kabupaten
    public function regencies (Request $request, $provinces_id) {

        // Database Pakai province_id
        return Regency::where('province_id', $provinces_id)->get();

    }
}