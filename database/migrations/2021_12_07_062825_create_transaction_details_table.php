<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            /*
            - id => Transaction Details ID

            - integer - transactions_id => Relasi Antara Transaction_Details Dengan Transactions
            - integer - products_id => Relasi Antara Transaction_Details Dengan Products
            - integer - price => Harga Barang Secara Keseluruhan

            - timestamps => Riwayat Upload Kategori - created_at and updated_at
            */
            $table->id();

            $table->integer('transactions_id');
            $table->integer('products_id');
            $table->integer('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}