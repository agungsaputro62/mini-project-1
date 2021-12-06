<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardTransactionDetailController extends Controller
{
    //
    public function index () {
        return view ('pages.dashboard-transactions-details');
    }
}