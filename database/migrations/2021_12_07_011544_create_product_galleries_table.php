<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_galleries', function (Blueprint $table) {
            /*
            - id => ID Product Galleries
            
            - string - photos => Menampilkan Semua Photo
            - integer - products_id => Relasi Antara Table Product Galleries Dengan Table Products

            - timestamps => Riwayat Upload Kategori - created_at and updated_at
            */
            $table->id();

            $table->string('photos');
            $table->integer('products_id');

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
        Schema::dropIfExists('product_galleries');
    }
}