<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Model User
use App\User;
// Memanggil Model Transaction
use App\Transaction;

class DashboardController extends Controller
{
    // Layout Admin Dashboard
    public function index () {

        // Menghitung Jumlah Total Customer/User - user id
        $customer = User::count();

        // Menghitung Jumlah Total Pendapatan Customer/User
        // total_price (Menggunakan Jumlah = sum Dari Field Yaitu total_price)

        // Menggunakan Kondisi Jika Ingin Menampilkan SUCCESS Saja,
        // $revenue = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');
        $revenue = Transaction::sum('total_price');

        // Menghitung Jumlah Total Transaction - Hitung Data Sendiri Ada Berapa Data
        $transaction = Transaction::count();

        // Layout, Kita Panggil Dengan Array ($customer)
        return view ('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
        ]);
    }
}