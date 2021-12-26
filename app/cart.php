<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    protected $fillable = [
        'products_id', 'users_id'
    ];

    protected $hidden = [

    ];

    // Relasi Menentukan Product
    public function product () {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    // Relasi Menentukan User Siapa
    public function user () {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}