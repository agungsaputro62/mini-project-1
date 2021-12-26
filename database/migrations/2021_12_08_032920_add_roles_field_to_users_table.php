<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Default User => Selain User Kita Bisa Ngisi User Atau Admin
            // User (Buyer And Seller)
            // Admin (ALL ACCESS) => Melihat Semua Data Transaksi Yang Ada Di System Kita

            // Secara Default Field Ini Di Isi Oleh User, Kalau Orang Langsung Daftar Website Hanasah Store
            // Ini Akan Otomatis Terdaftar Sebagai Roles User, Tapi Untuk Admin Kita Siapkan Aja User Admin Atau
            // Kalau Bisa Ubah Salah Satu User Disini Untuk Menjadi Admin

            // Middleware => Masuk Ke Mall, Kalian Masuk Dengan Protokol Tertentu, Protokol Tersebut Satpam,
            // Pengcekan Itu Adalah Middleware, Middleware => Bisa Ditaruh Pengecekan, Validasi, Kita Bisa Pakai
            // Untuk Membuat Validasi Apakah Dia Admin Atau Bukan
            $table->string('roles')->default('USER');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('roles');
        });
    }
}
