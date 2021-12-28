<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

// class TransactionController extends Controller
// {
//     //
//     public function all (Request $request) {
//         $id = $request->input('id');
//         $status = $request->input('status');

//         if($id) {
//             $transaction = Transaction::with(['items.product'])->find($id);

//             if($transaction) {
//                 return ResponseFormatter::success(
//                     $transaction,
//                     'Data Transaksi Berhasil Diambil'
//                 );
//             }
//             else {
//                 return ResponseFormatter::error(
//                     null,
//                     'Data Transaksi Tidak Ada',
//                     404
//                 );
//             }
//         }

//         $transaction = Transaction::with(['items.product'])->where('users_id', Auth::user()->id);

//         if ($status) {
//             $transaction->where('status', $status);
//         }
//             return ResponseFormatter::success(
//                 $transaction->paginate(),
//                 'Data List Transaksi Berhasil Diambil'
//             );
//     }
// }