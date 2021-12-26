<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            /*
            - id => Users ID

            - string - name => Nama User
            - string->unique - email => Email User Yang Unik, Yang Tidak Boleh Sama Emailnya
            - timestamp->nullable - email_verified_at => Verifikasi Email User, Tidak Boleh Kosong
            - string - password => Password User

            - longText - address_one => Alamat Ke 1
            - LongText - address_two => Alamat Ke 2

            - integer - provinces_id => Provinsi Id
            - integer - regencies_id => Kecamantan Id
            - integer - zip_code => Kode Pos

            - string - country => Kota
            - string - phone_number => Nomor Telepon HP
            - string - store_name => Nama Toko

            - integer - categories_id => Relasi Antara Table Users Dengan Table Categories
            - integer - store_status => Success, Failed, Dll

            - softDeletes => Menghapus Data, Tapi Tidak Menghapus Dari Database
            - timestamps => Riwayat Upload Kategori - created_at and updated_at
            */
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->longText('address_one');
            $table->longText('address_two');

            $table->integer('provinces_id');
            $table->integer('regencies_id');
            $table->integer('zip_code');

            $table->string('country');
            $table->string('phone_number');
            $table->string('store_name');

            $table->integer('categories_id');
            $table->integer('store_status');

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}