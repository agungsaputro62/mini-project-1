<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Memanggil Eloquent SoftDeletes
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // Intinya Fungsi Model Adalah Untuk Menyimpan Data Dan Mempermudah Kita Masukkin $fillable Agar Kita
    // Bisa Simpan Menggunakan Cara Miss Assessment Di Laravel

    // Menggunakan SoftDeletes
    use SoftDeletes;

    //
    protected $fillable = [
        'name', 'users_id', 'categories_id', 'price', 'description', 'slug'
    ];

    protected $hidden = [

    ];

    // ProductGallery Relasi Ke products_id, Key id
    // Munculin Data Yang Sudah Dihapus - return $this->hasMany(ProductGallery::class, 'products_id', 'id')->withTrashed();
    public function galleries() {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category() {
        return $this->belongsTo(category::class, 'categories_id', 'id');
    }
}