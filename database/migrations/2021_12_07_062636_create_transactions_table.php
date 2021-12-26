<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            /*
            - id => Transactions ID

            - integer - users_id => Relasi Antara Table Transactions Dengan Table Users
            - integer - inscurance_price =>
            - integer - shipping_price =>
            - integer - total_price =>

            - string - transaction_status => Transaksi UNPAID, PENDING, SUCCESS, FAILED
            - string - resi => Untuk Melihat Barang Sampai Dimana

            - softDeletes => Menghapus Data, Tapi Tidak Menghapus Dari Database
            - timestamps => Riwayat Upload Kategori - created_at and updated_at
            */
            $table->id();

            $table->integer('users_id');
            $table->integer('inscurance_price');
            $table->integer('shipping_price');
            $table->integer('total_price');

            $table->string('transaction_status'); // Transaksi UNPAID, PENDING, SUCCESS, FAILED
            $table->string('resi');

            $table->softDeletes();
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
        Schema::dropIfExists('transactions');

   }
}