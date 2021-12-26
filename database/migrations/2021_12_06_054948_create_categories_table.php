<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            /*
            - id => ID Categories

            - string - name => Nama Category
            - string - slug => Url
            - string - photo => Gambar Dari Category

            - softDeletes => Menghapus Data, Tapi Tidak Menghapus Dari Database
            - timestamps => Riwayat Upload Kategori - created_at and updated_at
            */
            $table->id();
            
            $table->string('name');
            $table->string('photo');
            $table->string('slug');

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
        Schema::dropIfExists('categories');
    }
}