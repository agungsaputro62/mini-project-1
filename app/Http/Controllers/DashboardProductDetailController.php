<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductDetailController extends Controller
{
    //
    public function index () {
        return view ('pages.dashboard-products-details');
    }
}