<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            /*
            - id => ID Products

            - string - name => Nama Product
            
            - integer - users_id => Relasi Antara Table Products Dengan Table Users
            - integer - categories_id => Relasi Antara Table Products Dengan Table Categories
            - integer - price => Harga Barang
            - (longText - Biar Isinya Makin Banyak) - description => Menggambarkan Product

            - softDeletes => Menghapus Data, Tapi Tidak Menghapus Dari Database
            - timestamps => Riwayat Upload Kategori - created_at and updated_at
            */
            $table->id();

            $table->string('name');
            $table->integer('users_id');
            $table->integer('categories_id');

            $table->integer('price');
            $table->longText('description');

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
        Schema::dropIfExists('products');
    }
}