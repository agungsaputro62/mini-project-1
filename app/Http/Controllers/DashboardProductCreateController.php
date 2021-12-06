<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductCreateController extends Controller
{
    //
    public function create () {
        return view ('pages.dashboard-products-create');
    }
}