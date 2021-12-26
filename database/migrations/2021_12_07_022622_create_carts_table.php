<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            /*
            - id => ID Carts

            - integer - products_id => Relasi Antara Table Carts Dengan Table Products
            - integer - users_id => Relasi Antara Table Carts Dengan Table User

            - timestamps => Riwayat Upload Kategori - created_at and updated_at
            */
            $table->id();
            
            $table->integer('products_id');
            $table->integer('users_id');

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
        Schema::dropIfExists('carts');
    }
}